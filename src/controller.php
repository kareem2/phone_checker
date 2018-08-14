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

	}

	public function homePage()
	{		 

		$content = $this -> db -> homePage();

		$this->twig->display('home.html.twig', array("content" => $content));
		
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

}



?>