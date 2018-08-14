<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="assets/ref.js"></script>
	<link rel="stylesheet" type="text/css" href="assets/ref.css">	
</head>
<body>
<form method="get"">
  Phone Number<br>
  <input type="text" name="phone"><br>
  <input type="submit" value="Submit">
</form>

<h2>Examples:</h2>
<a href="index.php?phone=318-616-5060">318-616-5060</a><br>
<a href="index.php?phone=613-702-1120">613-702-1120</a><br>
<a href="index.php?phone=720-675-8504">720-675-8504</a><br>
<a href="index.php?phone=517-455-4002">517-455-4002</a><br>




<?php

include 'assets/ref.php';


include 'classes/simple_html_dom.php';
include 'classes/config.php';
include 'classes/connection.php';
include 'classes/database.php';
include 'classes/DomainScrapper.php';



if(!isset($_GET['phone']))
	die();

$domain_scrapper = new DomainScrapper();

r($domain_scrapper->scrape_phone_details('/'.$_GET['phone']));
?>	   
</body>
</html>

