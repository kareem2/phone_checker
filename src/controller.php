<?php

namespace App\Controller;

use \App\Model\Model;
use \App\Helper\Helper;
use MirazMac\Pagination\Pagination;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Google\Auth\HttpHandler\Guzzle6HttpHandler;

class Controller
{	

	public $db;
	public $app;
	public $twig;

	public function __construct(Model $db, Helper $app) 
	{
		$this->db = $db; 
		$this->app = $app;
		$this->twig = $app->loadTwig();
		//var_dump($this->app->getFlashMessages());

		$recent_comments = $this->db->select('comments', [], " order by id DESC limit 10");
		//var_dump($recent_comments);

		$this->twig->addGlobal('app_url', APP_URL);
		$this->twig->addGlobal('recent_comments', $recent_comments);
		
		$flashMessages = new \Twig_Function('FlashMessages', function($type = []) {
		    return $this->app->getFlashMessages($type);

		});
		$this->twig->addFunction($flashMessages);

	}

	public function homePage()
	{		 

		$content = '<h1>ertert</h1>';
		$this->twig->display('main.html.twig', array("content" => $content));
		
		return;
	}

	public function test(){
		$this->app->updateCaheItem('test', 5);
		$c = $this->app->getCaheItem('test');
		var_dump($c);
		die();
	}

 	public function itemPage($id, $article_name)
	{	

		$content = $this->db->itemPage($id);
		
		/*if ($this->app->checkFor404($content, $article_name))
			return;*/

		$this->twig->display('item.html.twig', array('content' => $content));
		
		return;
	}

	public function getPhoneDetails($number){
		if(strlen($number) == 10){
			$area_code = substr($number, 0, 3);
			$prefix = substr($number, 3, 3);
			$phone = substr($number, 6);
			
			//die();

			$overall_rating = floor($this->db->query("select sum(rate)/count(*) rating from comments", ['phone_number' => $number])[0]['rating']);

			$overall_reports = $this->db->query("select count(*) reports from comments", ['phone_number' => $number, ':raw' => 'rate < 0'])[0]['reports'];

			$details = $this->db->selectSingle('phone_details', 
				['conditions' => ['area_code' => $area_code, 
				'code' => $prefix]]
			);

			$details['suffix'] = $phone;

			if(!isset($details) || empty($details)){
				$this->app->flashMessage('error', 'The number you search for is not found');

				header("location: ". APP_URL);
				die();
			}
			$comments = $this->db->select('comments', ['phone_number' => $number], " order by created_at DESC");

			$this->app->updateCaheItem('recent_search', $details);

			$this->twig->display('phone_details.html.twig', array('details' => $details, 'suffix' => $phone, 'comments' => $comments, 'overall_rating' => $overall_rating, 'overall_reports' => $overall_reports));

			die();
		}



	}	

	public function addComment($data){
		$client = new Client(['verify' => false]);

		
		$response = $client->request('POST', 'https://www.google.com/recaptcha/api/siteverify', [
		    'form_params' => [
		        'secret' => '6LcCH2wUAAAAABOCYFtuiMynISSGC1cE3jIE1oYH',
		        'response' => $data['g-recaptcha-response']
		    ]
		]);

		$response = $response->getBody()->getContents();
		$response = json_decode($response, true);

		if($response['success'] == false || !isset($response['success'])){
			$this->app->flashMessage('error', 'The reCAPTCHA is wrong');

			header("location: ". APP_URL."/{$data['phone_number']}");	
			die(); 		
		}

		unset($data['g-recaptcha-response']);
		
		$result = $this->db->insert('comment', $data);

		$this->app->flashMessage('success', 'Thank you for your feedback');

		header("location: ". APP_URL."/{$data['phone_number']}");
		die();
		//var_dump($result);

	}

	public function recentComments($limit = 5, $page = 1){
		$start = ($page - 1) * $limit;
		$comments = $this->db->query("select * from comments order by id desc limit $start, $limit", []);
		$total = $this->db->query("select count(*) total from comments", [])[0]['total'];
		//var_dump($comments);
		$pagination = new Pagination($total, $page, $limit);
		$pagination->setLineFormat('<li class="@class@"><a href="'.APP_URL.'/comments/@id@">@label@</a></li>');
		$pages = $pagination->parse();
		//var_dump($pages);
		//die();
		$pages = $pagination->renderHtml($before = '<ul class="pagination-sm pagination">');
		

		$this->twig->display('recent_comments_page.html.twig', array('comments' => $comments, 'pagination' => $pages));
		die();
	}


	public function showAreacodes(){
		$codes = $this->db->select('areacodes', []);
		$states = [];
		foreach ($codes as $code) {
			$state[$code['state_name']][] = ['code' => $code['code'], 'time_zone' => $code['time_zone'], 'major_city' => $code['major_city']];
		}
		ksort($state);
		$this->twig->display('areacodes.html.twig', array('states' => $state, 'areacodes' => $codes));
		
		die();
	}


	public function showStateCodes($state_name)
	{
		$state = $this->db->selectSingle('states_vw', ['conditions' => ['state_name' => $state_name]]);
		$areas = $this->db->select2('area', ['conditions' => ['state_id' => $state['state_id']]]);
		$this->twig->display('state_page.html.twig', array('state' => $state, 'areas' => $areas));

		die();
	}


	public function showAreaCodePrefixes($area_code, $page = 1){
		$limit = 50;
		$area = $this->db->selectSingle('areacodes', ['conditions' => ['code' => $area_code]]);

		$start = ($page - 1) * $limit;
		$prefixes = $this->db->query("select * from prefix where area_code = $area_code order by code limit $start, $limit", []);

		$total = $this->db->query("select count(*) total from prefix where area_code = $area_code", [])[0]['total'];

		$pagination = new Pagination($total, $page, $limit);

		$pagination->setLineFormat('<li class="@class@"><a href="'.APP_URL.'/area_code/'.$area_code.'/@id@">@label@</a></li>');

		$pages = $pagination->parse();

		$pages = $pagination->renderHtml($before = '<ul class="pagination-sm pagination">');

		$this->twig->display('prefixes_page.html.twig', array('area' => $area, 'prefixes' => $prefixes, 'pagination' => $pages));
	}

	public function preview_prefix($area_code, $area_prefix, $number_prefix = null){
		$prefix = $this->db->selectSingle('prefixes', ['conditions' => ['area_code' => $area_code, 'code' => $area_prefix]]);
		//var_dump($prefix);
		$this->twig->display('prefix_preview.html.twig', ['prefix' => $prefix]);
		die();
	}

	public function preview_prefix_phones($area_code, $area_prefix, $number_prefix){
		$prefix = $this->db->selectSingle('prefixes', ['conditions' => ['area_code' => $area_code, 'code' => $area_prefix]]);
		//var_dump($prefix);
		$this->twig->display('prefix_phones.html.twig', ['prefix' => $prefix, 'number_prefix' => $number_prefix]);
		die();
	}

	public function majorCities()
	{
		$areas = $this->db->query('select code from area', []);
		var_dump($areas);
		die();
	}

	public function showRecentSearch(){
		$recent_numbers = $this->app->getCaheItem('recent_search');
		$this->twig->display('recent_search.html.twig', ['numbers' => $recent_numbers]);
	}
}



?>