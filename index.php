<?php
require_once __DIR__.'/vendor/autoload.php';

use Symfony\Component\DomCrawler\Crawler;

$html = <<<'HTML'
<!DOCTYPE html>
<html>
    <body>
        <p class="message">abc<h1>Hello World!</h1></p>
        <p id="xx">Hello Crawler!</p>
    </body>
</html>
HTML;

$crawler = new Crawler($html);

$nodeValues = $crawler->each(
	function (Crawler $node, $i) {
		$first = $node->children()->text();
		return array($first);
	}
);
var_dump($nodeValues);

die();
$nodeValues = $crawler->filter('.message')->each(function (Crawler $node, $i) {
    return $node->html();
});

var_dump($nodeValues);

$crawler = $crawler->filter('.message');


foreach ($crawler as $domElement) {
    var_dump($domElement);
}

