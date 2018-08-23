<?php

namespace App\Controller;

use \App\Model\Model;
use \App\Helper\Helper;
use MirazMac\Pagination\Pagination;

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

			//var_dump($overall_reports);

			$details = $this->db->selectSingle('phone_details', 
				['conditions' => ['area_code' => $area_code, 
				'code' => $prefix]]
			);

			if(!isset($details) || empty($details)){
				$this->app->flashMessage('error', 'The number you search for is not found');

				header("location: ". APP_URL);
				die();
			}
			$comments = $this->db->select('comments', ['phone_number' => $number], " order by created_at DESC");
			//var_dump($this->app->getFlashMessages());
			$this->twig->display('phone_details.html.twig', array('details' => $details, 'suffix' => $phone, 'comments' => $comments, 'overall_rating' => $overall_rating, 'overall_reports' => $overall_reports));

			die();
		}



	}	

	public function addComment($data){

		$result = $this->db->insert('comment', $data);

		$this->app->flashMessage('success', 'Thank you for your feedback');

		header("location: ". APP_URL."/{$data['phone_number']}");
		//var_dump($result);

	}


	public function recentComments($limit = 5, $page = 1){
		$start = ($page - 1) * $limit;
		$comments = $this->db->query("select * from comments order by id desc limit $start, $limit", []);
		$total = $this->db->query("select count(*) total from comments", [])[0]['total'];
		//var_dump($comments);
		$pagination = new Pagination($total, $page);
		$pagination->setLineFormat('<li class="@class@"><a href="'.APP_URL.'/comments/@id@">@label@</a></li>');
		$pages = $pagination->parse();
		//var_dump($pages);
		//die();
		$pages = $pagination->renderHtml($before = '<ul class="pagination-sm pagination">');
		

		$this->twig->display('recent_comments_page.html.twig', array('comments' => $comments, 'pagination' => $pages));
		die();
	}

}



?>