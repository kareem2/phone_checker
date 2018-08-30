<?php
namespace App;


require_once __DIR__.'/../vendor/autoload.php';

use \Dice\Dice;
use \Router;
use Symfony\Component\Cache\Adapter\PdoAdapter;
use Symfony\Component\Cache\Simple\PdoCache;
use \App\Model\Model;

//$pdo = new PdoAdapter(Model::getPdoConnection());
// $pdo = Model::getPdoConnection();
// $cache = new PdoCache($pdo);
// $cache->set('products_count', [1,2,3,4]);
// $cache->set('products_count2', 9849);

if (!session_id()) @session_start();

// Dice = autowiring 
$dice 		= new Dice;
$controller = $dice->create('\App\Controller\Controller');
$helper 	= $dice->create('\App\Helper\Helper');

//$controller->recentComments(5, 2);
/**
* Router
*/



//$controller->majorCities();
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

Router::route('([0-9]{3})-([0-9]{3})-([0-9]{2})', function($area_code, $area_prefix, $number_prefix) use($controller){
	$controller->preview_prefix_phones($area_code, $area_prefix, $number_prefix);
});


Router::route('([0-9]{3})-([0-9]{3})', function($area_code, $area_prefix) use($controller){
	$controller->preview_prefix($area_code, $area_prefix);
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

Router::route('state/([^/]+)', function($state_name) use($controller){
	$controller->showStateCodes($state_name);
});

Router::route('area_code/([0-9]+)', function($area_code) use($controller){
	$controller->showAreaCodePrefixes($area_code);
});

Router::route('area_code/([0-9]+)/([0-9]+)', function($area_code, $page) use($controller){
	$controller->showAreaCodePrefixes($area_code, $page);
});

Router::route('recent_search', function() use($controller){
	$controller->showRecentSearch();
});



Router::route('test', function() use($controller){
	$controller->test();
});


if (false === Router::execute($url)) {
	var_dump($url);
	echo '404';
}


if (ENV == 'dev')
	$helper->devPanel();
else 
	$helper->showExecutionTime();