<?php
namespace App;


require_once __DIR__.'/../vendor/autoload.php';

use \Dice\Dice;
use \Router;
use Symfony\Component\Cache\Adapter\PdoAdapter;
use \App\Model\Model;

$cache = new PdoAdapter(Model::getPdoConnection());

if (!session_id()) @session_start();

// Dice = autowiring 
$dice 		= new Dice;
$controller = $dice->create('\App\Controller\Controller');
$helper 	= $dice->create('\App\Helper\Helper');

//$controller->recentComments(5, 2);
/**
* Router
*/

Router::route('/phone_checker/public/', function() use($controller){
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$phone_number = $_POST['number'];
		header("location: " . APP_URL . '/'. $phone_number);
		die();
	}else{
		$controller->homePage();
	}
});

Router::route('/', function() use($controller){
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$phone_number = $_POST['number'];
		header("location: " . APP_URL . '/'. $phone_number);
		die();
	}else{
		$controller->homePage();
	}
});



Router::route('([0-9]{3})-([0-9]{3})-([0-9]{4})', function($area_code, $prefix, $number) use($controller){
	$controller->getPhoneDetails($area_code.$prefix.$number);
});

Router::route('([0-9]{10})', function($full_number) use($controller){
	$controller->getPhoneDetails($full_number);
});

Router::route('([0-9]{3})-([0-9]{3})-([0-9]{2})', function($area_code, $prefix, $number) use($controller){
	var_dump([$area_code, $prefix, $number]);
	die();
	$controller -> itemPage($id, $article_name);
});


Router::route('([0-9]{3})-([0-9]{3})', function($area_code, $prefix) use($controller){
	var_dump([$area_code, $prefix]);
	die();
	$controller -> itemPage($id, $article_name);
});


Router::route('add_comment', function() use($controller){
	$controller->addComment($_POST);
});

Router::route('areacode', function() use($controller){
	$controller->showAreacodes();
});

Router::route('comments/([0-9]*)', function($page) use($controller){
	//die('show comments');
	$controller->recentComments(10, $page);
});

//var_dump($url);

if (false === Router::execute($url)) {
	var_dump($url);
	echo '404';
}


if (ENV == 'dev')
	$helper->devPanel();
else 
	$helper->showExecutionTime();