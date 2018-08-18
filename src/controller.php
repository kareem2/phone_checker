<?php

namespace App\Controller;

use \App\Model\Model;
use \App\Helper\Helper;

class Controller
{	

	public $db;
	public $app;
	public $twig;

	public function __construct(Model $db, Helper $app) 
	{
		$this -> db = $db; 
		$this -> app = $app;
		$this -> twig = $app -> loadTwig();

		$this->twig->addGlobal('app_url', APP_URL);
	}

	public function homePage()
	{		 

		$content = '<h1>ertert</h1>';
		$this->twig->display('main.html.twig', array("content" => $content));
		
		return;
	}

 	public function itemPage($id, $article_name)
	{	

		$content = $this -> db -> itemPage($id);
		
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

			$details = $this->db->selectSingle('phone_details', ['area_code' => $area_code, 'code' => $prefix]);

			//var_dump([$area_code, $prefix, $phone, $details]);
			$this->twig->display('phone_details.html.twig', array('details' => $details, 'suffix' => $phone));
			die();
		}
		$this->twig->display('phone_details.html.twig', array('content' => $number));
		return;
	}	

}



?>