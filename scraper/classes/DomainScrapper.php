<?php
/**
* 
*/
class DomainScrapper 
{

	// Main page parser
	public $main_page;

	// Servers page parser
	public $servers_page;

	// Database object
	public $db;

	public $config;

	// Domain name
	public $domain;

	// Final results
	public $result;

	public $is_valid;

	public $indexs = [
		'area_code' => ['Area Code:'],
		'prefix' => ['Prefix (NXX):'],
		'country' => ['Country:'],
		'state_province' => ['State/Province:'],
		'city' => ['City:' ],
		'company' => ['Company:'],
		'usage' => ['Usage:' ],
		'time_zone' => ['Time Zone:'],
		'international_format' => ['International format:'],
		'unknown' => ['Unknown'],
		'scam' => ['Scam'],
		'telemarketer' => ['Telemarketer'],
		'harassment' => ['Harassment'],
		'survey' => ['Survey'],
		'political' => ['Political'],
		'spam' => ['Spam'],
		'debt' => ['Debt'],
		'prank' => ['Prank'],
		'positive' => ['Positive'],	
		'phone_number' => ['Phone number'],	
		'call_type' => ['Call type'],	
		'rating' => ['Rating'],	
	];
	
	/*
	public function __construct($db, $config, $domain = null, $main_page_content = null, $server_page_content = null)
	{
		$this->domain = $domain;
		$this->db = $db;	
		$this->config = $config;

		$this->is_valid = true;

		// Get the html content for main page and servers page and create HTML DOM parser object
		if(is_null($main_page_content)){
			$this->main_page = file_get_html("http://alexarank.top/site/$domain");
		}else{
			$this->main_page = str_get_html($main_page_content);
		}


	}
	*/


	/**
	* Scrape the domain info
	*
	*/
	public function get_domain_result(){

		return $this;		

	}


	public function scrape_area_codes_list($url = 'https://checkcallernumber.com/areacode'){

		$result = [];

		$content = file_get_html($url);

		$area_codes_content = $content->find('.table.table-responsive', 1);
		$area_codes = [];
		foreach ($area_codes_content->find('tr') as $row) {
			$tmp = $row->find('td', 0);
			if($tmp)
				$area_codes[] = str_replace('/', '', $tmp->find('a', 0)->href);
		}

		$states_content = $content->find('.table.table-responsive', 0);

		$states = [];
		foreach ($states_content->find('tr') as $row) {
			if($row->find('td', 0)){
				$tmp = $row->find('td', 0);
				// var_dump($tmp->find('a', 0)->innertext);
				// die();
				if($tmp)
					if($tmp->find('a', 0))
						$states[] = $tmp->find('a', 0)->innertext;			
			}

		}		

		$result['area_codes'] = $area_codes;
		$result['states'] = $states;
		return $result;
	}


	public function scrape_area_code_prefixes($code, $page = 1){
		
		$result = [];

		$content = file_get_html("https://checkcallernumber.com/$code/$page/");

		$content = $content->find('#areacode-content', 0);

		foreach ($content->find('a') as $row) {
			$result[] = $row->href;
		}

		return $result;

	}




	public function scrape_prefix_level_1($prefix){
		

		$result = [];

		$content = file_get_html("https://checkcallernumber.com/$prefix");

		$content = $content->find('.table.table-responsive', 1);

		foreach ($content->find('a') as $row) {
			$result[] = str_replace('./', '/', $row->href);
		}

		return $result;

	}	

	public function scrape_prefix_phones_list($prefix){
		$result = [];

		$content = file_get_html("https://checkcallernumber.com/$prefix");

		$content = $content->find('table', 0);

		foreach ($content->find('a') as $row) {
			$result[] = str_replace('./', '/', $row->href);
		}

		return $result;
	}


	public function scrape_state_details($state){
		$result = [];

		$content = str_get_html($this->file_get_html2("https://checkcallernumber.com/stateprefix/".rawurlencode($state)));
		//echo "https://checkcallernumber.com/stateprefix/".rawurlencode($state);
		$table = $content->find('#area_code', 0);
		//echo($content->innertext);
		if(is_null($table))
			return [];

		foreach ($table->find('tr') as $row) {
			$result[$this->get_index($row->find('td', 0)->innertext)] = 
			
			trim(str_replace('[Map]', '', str_replace("&nbsp;", '', strip_tags($row->find('td', 1)->innertext))));
		}
		//r($result);
		$result['time_zone'] = explode(' - ', $result['time_zone'])[0];

		return $result;
	}	


	public function get_state_prefixes($state){
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://checkcallernumber.com/stateapi",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_SSL_VERIFYHOST => false,
		  CURLOPT_SSL_VERIFYPEER => false,
		  CURLOPT_POSTFIELDS => "current=1&rowCount=-1&searchPhrase=&state=".urlencode($state),
		  CURLOPT_HTTPHEADER => array(
		    "Cache-Control: no-cache",
		    "Content-Type: application/x-www-form-urlencoded",
		    "Postman-Token: b186e997-8713-4ecc-a2f0-9dcb59dd4a7b"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			//echo "$err";
		  return [];
		} else {
		  return json_decode($response, true);
		}
	}

	public function file_get_html2($url){
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_SSL_VERIFYHOST => false,
		  CURLOPT_SSL_VERIFYPEER => false,
		  CURLOPT_HTTPHEADER => array(
		    "Cache-Control: no-cache",
		    "Content-Type: application/x-www-form-urlencoded",
		    "Postman-Token: b186e997-8713-4ecc-a2f0-9dcb59dd4a7b"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "$err";
		  return [];
		} else {
			//echo $response;
		  return $response;
		}
	}


	public function scrape_phone_details($phone){
		$result = [];

		$content = file_get_html("https://checkcallernumber.com/$phone");

		$table = $content->find('table', 0);

		if(is_null($table))
			return [];

		foreach ($table->find('tr') as $row) {
			$result[$this->get_index($row->find('td', 0)->innertext)] = 
			
			trim(str_replace('[Map]', '', str_replace("&nbsp;", '', strip_tags($row->find('td', 1)->innertext))));
		}

		foreach ($content->find('.report') as $row) {

			$data = strip_tags($row->innertext);
			$data = explode(' ', $data);
			$result['community_reports'][$this->get_index($data[1])] = $data[0];
		}


		foreach ($content->find('.timeline-panel') as $comment) {
			$comment_content = [];

			$heading = $comment->find('.timeline-heading', 0);
			$body = $comment->find('.timeline-body', 0);

			if(is_null($heading))
				break;

			$name = $heading->find('.timeline-title', 0);
			if($name){
				$comment_content['name'] = $name->innertext;
			}

			$time = $heading->find('.fa-clock-o', 0);
			//var_dump($time->innertext);

			if($time){
				$comment_content['time'] = trim(strip_tags($time->parent()->innertext));
				$time->outertext = '';
			}

			$elements = explode('<br>', $heading);

			foreach ($elements as $key => $value) {
				if($key !== 0){
					$parts = explode(':', str_replace("&nbsp;", '', trim(strip_tags($value))), 2);
					//var_dump($parts);
					if(count($parts) == 2)
						$comment_content[$this->get_index($parts[0])] = $parts[1];
				}
			}

			$comment = $body->find('p', 0);
			if($comment){
				$comment_content['comment'] = trim($comment->innertext);
			}

			$result['comments'][] = $comment_content;
		}

		
		return $result;
	}	


	public function get_index($index){
		$found = false;
		foreach ($this->indexs as $key => $index_values) {
			foreach ($index_values as $value) {
				if(strtolower($index) == strtolower($value)){
					return $key;
				}
			}
		}

		return $index;
	}
}