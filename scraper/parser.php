<?php

require_once __DIR__.'/../vendor/autoload.php';

include 'assets/ref.php';

include 'classes/simple_html_dom.php';

include 'classes/DomainScrapper.php';

use \App\Model\Model;

$model = new Model();
//r($model->selectSingle('country', ['name' => 'UAdE']));
//r($model->select('country', ['name' => 'UAdE']));
//r($model->insert('country', ['name' => 'UAE']));

$domain_scrapper = new DomainScrapper();

// r($domain_scrapper->scrape_state_details('British Columbia')); //New Hampshire
// die();
$area_codes = $domain_scrapper->scrape_area_codes_list();
$states = $area_codes['states'];
//r($domain_scrapper->scrape_state_details($states[0]));

foreach ($states as $state) {
	$state_details = $domain_scrapper->scrape_state_details($state); //New Hampshire

	$country = $model->selectSingle('country', ['name' => $state_details['country']]);
	if(empty($country)){
		$country_id = $model->insert('country', ['name' => $state_details['country']]);
	}else{
		$country_id = $country['id'];
	}

	$state_row = $model->selectSingle('state', ['name' => $state]);
	if(empty($state_row)){
		$state_id = $model->insert('state', [
			'name' => $state, 
			'time_zone' => $state_details['time_zone'],
			'country_id' => $country_id
		]);
	}else{
		$state_id = $state_row['id'];
	}

	$prefixes = $domain_scrapper->get_state_prefixes($state);

	$total = count($prefixes['rows']);
	//var_dump([$total, $prefixes]);
	//die();
	$c = 0;
	echo "State: $state, ID: $state_id, Country: {$state_details['country']}, Prefix $c of $total \n";
	foreach ($prefixes['rows'] as $prefix) {
		$c++;
		//r($prefixes['rows'][0]['prefix']);
		if (preg_match('%/([0-9]+)-([0-9]+)%six', $prefix['prefix'], $regs)) {
			$code = $regs[2];
		} else {
			continue;
		}

		$prefix_id = $model->insert('prefix', [
			'code' => $code, 
			'county' => $prefix['county'],
			'city' => $prefix['city'],
			'p_usage' => $prefix['usage'],
			'company' => $prefix['company'],
			'area_code' => $prefix['area_code'],
			'state_id' => $state_id,

		]);

//if($c == 3)		
//die();
		
	}
//die();
}
die();