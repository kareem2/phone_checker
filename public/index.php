<?php

namespace App;

use \Dice\Dice;
use \Router;

require_once __DIR__.'/../vendor/autoload.php';

// Dice = autowiring 
$dice 		= new Dice;
$controller = $dice->create('\App\Controller\Controller');
$helper 	= $dice->create('\App\Helper\Helper');

/**
* Router
*/

Router::route('/phone_checker/public/', function() use($controller){

	$controller -> homePage();

});

Router::route('/', function() use($controller){

	$controller -> homePage();

});

// eg: /324/some-article-name

Router::route('/([0-9]+)/([^/]+)', function($id, $article_name) use($controller){

	$controller -> itemPage($id, $article_name);

});


if (false === Router::execute($url)) 
	echo '404c';


if (ENV == 'dev')
	$helper->devPanel();
else 
	$helper->showExecutionTime();