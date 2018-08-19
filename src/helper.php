<?php

namespace App\Helper;

use \Twig_Loader_Filesystem;
use \Twig_Environment;
use \Plasticbrain\FlashMessages\FlashMessages;

/**
 * 
 */
class Helper
{
	private $msg;
	function __construct()
	{
		# code...
		$this->msg = new FlashMessages();
	}

	public function showExecutionTime()
	{
		echo '<!--' . (microtime(true) - $_SERVER['REQUEST_TIME_FLOAT']) . '-->';

		return;
	}

	public function devPanel()
	{
		echo "<div style=\"position: fixed; bottom: 0; padding: 10px; background-color: #19283be6; color: white;\">".(round(microtime(true) - $_SERVER['REQUEST_TIME_FLOAT'], 4))." sec | ".(round(memory_get_usage(true)/1024/1024, 4))." mb</div>"; 
		return;
	}

	public function loadTwig() 
	{
	    
	    $loader = new Twig_Loader_Filesystem(
	        array (
	          	TWIG_VIEWS_FOLDER
	        )
	    );
	    
	    // set up environment
	    $params = array(
	        'cache' => TWIG_CACHE_FOLDER, 
	        'auto_reload' => TWIG_AUTO_RELOAD, // disable cache
	        'autoescape' => TWIG_AUTOESCAPE
	    );

	    return new Twig_Environment($loader, $params);
	}

	public function show404($domain = '', $addToDB = false)
	{ 

		//if ($addToDB === true)
	    	//$this -> send_search_request($domain);

	    header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
	    echo '<h1>Not Found</h1> <p>The requested URL was not found on this server.</p>';
	    //file_put_contents('/home/admin/web/engine.files/public_html/404errors.txt', $domain."\n", FILE_APPEND | LOCK_EX);
	      
	    //header("HTTP/1.1 301 Moved Permanently"); 
		//header("Location: /");

		return;       
	}

	public function checkFor404(array $content, $name)
	{	

		/*echo str_replace('-', ' ', $name);
		echo $content['name'];*/

		if (!isset($content['name']) or strpos($content['name'], str_replace('-', ' ', $name)) === false) {
			$this->show404();
			return true;
		}

		return false;
	}

	/**
	 * trims text to a space then adds ellipses if desired
	 * @param string $input text to trim
	 * @param int $length in characters to trim to
	 * @param bool $ellipses if ellipses (...) are to be added
	 * @param bool $strip_html if html tags are to be stripped
	 * @return string 
	 */
	public function trim_text($input, $length, $ellipses = true, $strip_html = false) {
	    //strip tags, if desired
	    if ($strip_html) {
	        $input = strip_tags($input);
	    }
	  
	    //no need to trim, already shorter than trim length
	    if (strlen($input) <= $length) {
	        return $input;
	    }
	  
	    //find last space within length
	    $last_space = strrpos(substr($input, 0, $length), ' ');
	    $trimmed_text = substr($input, 0, $last_space);
	  
	    //add ellipses (...)
	    if ($ellipses) {
	        $trimmed_text .= '...';
	    }
	  
	    return $trimmed_text;
	}


	public function flashMessage($type, $message){
		if($type == 'info'){
			$this->msg->info($message);
		}else if($type == 'success'){
			$this->msg->success($message);
		}else if($type == 'warning'){
			$this->msg->warning($message);
		}else if($type == 'error'){
			$this->msg->error($message);		
		} 
	}

	public function getFlashMessages($types = []){
		ob_start();
		$this->msg->display();
		$messgs = ob_get_contents();
		ob_end_clean();
		return $messgs;

		
		if(!isset($_SESSION['flash_messages']))
			return [];
		if(empty($types)){
			$messages = $_SESSION['flash_messages'];
		}else{
			$messages = $_SESSION['flash_messages'][$types];
		}
		/*
        if ((is_array($types) && empty($types)) || is_null($types) || !$types) {
            unset($_SESSION['flash_messages']);
        } elseif (!is_array($types)) {
            $types = [$types];
        }

        foreach ($types as $type) {
            unset($_SESSION['flash_messages'][$type]);
        }*/

        unset($_SESSION['flash_messages']);
        return $messages;

		//$this->msg->clear();
	}
}