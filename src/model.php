<?php

namespace App\Model;

use \PDO;

class Model 
{	

	protected static $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";port=".DB_PORT.";charset=".DB_CHARSET;
	protected static $opt = [
	    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
	    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	    PDO::ATTR_EMULATE_PREPARES   => true,
	];

	protected static $db;

	public function __construct()
	{
		//self::$db = new PDO($this->dsn, DB_USER, DB_PASS, $this->opt);
		static::$db = self::getPdoConnection();
	}

	public static function getPdoConnection()
	{
		return new PDO(self::$dsn, DB_USER, DB_PASS, self::$opt);
	}

	public function homePage() {

		/*$sql_query = '

			SELECT

				* 
			from table

			limit 100
		';

		$stmt = self::$db->prepare($sql_query); // stmt = statement
		$stmt -> execute();
		
		return $sql_res = $stmt -> fetchAll();*/

		return 'homePage model method used';
	}

	public function itemPage() {

		return 'itemPage model method used';
	}


	public function lastInsertId(){
		return self::$db->lastInsertId();
	}



	public function insert($table, $data){
		try {
			$columns = implode(',', array_keys($data));
			$values = ':' . implode(', :', array_keys($data));

			$sql_query = "INSERT INTO $table($columns) VALUES($values)";
		
			$stmt = self::$db->prepare($sql_query);

			foreach ($data as $key => &$value) 
			{
			    $key = ":" . $key;
			    $stmt->bindParam($key, $value);
			    
			}

			$result = $stmt->execute();

			if($result == true){
				return $this->lastInsertId();
			}

			return false;			
		} catch (Exception $e) {
			return false;
		}

	}

	public function selectSingle($table, $options){
		$options['single'] = true;
		//return $this->select($table, $data, $order_by, true);
		return $this->select2($table, $options);
	}

	public function query($sql_query, $parameters){

		$where_clause = '';
		if(!empty($options['conditions']))
			$where_clause = $this->buildWhere($parameters);


		$sql_query = $sql_query . " $where_clause";
		//var_dump($sql_query);
		$stmt = self::$db->prepare($sql_query);

		foreach ($parameters as $key => &$value) {
			//var_dump($key);
			if($key !== ':raw')
				$stmt->bindParam(':'.$key, $value);
		}

		//return;
		//die();
		$stmt->execute();


		return $stmt->fetchAll();

	}

	protected function buildWhere($where){
		$where_clause = 'where 1 = 1 ';

		foreach ($where as $key => $value) {
			if($key == ':raw'){
				$where_clause = $where_clause . " AND $value ";
			}else{
				$where_clause = $where_clause . " AND $key = :$key ";
			}
			

		}	
		////var_dump($where_clause);

		return $where_clause;	
	}

	public function select($table, $where, $order_by = null, $single = false){
		$where_clause = 'where 1 = 1 ';
		
		foreach ($where as $key => $value) {
			$where_clause = $where_clause . " AND $key = :$key ";
		}

		$sql_query = "
			SELECT * 
			from $table 
			$where_clause $order_by";



		$stmt = self::$db->prepare($sql_query);

		foreach ($where as $key => &$value) {
			$stmt->bindParam(':'.$key, $value);
		}

		
		$stmt->execute();
		
		if($single == true){
			$result = $stmt->fetch();
			if(!empty($result)){
				return $result;
			}
			return [];
		}
		
		return $stmt->fetchAll();

	}

	public function select2($table, $options){
		//$where_clause = 'where 1 = 1 ';

		$where_clause = $this->buildWhere($options['conditions']);


		$order_by = null;
		if(isset($options['order']) && is_null($options['order'])){
			$order_by = 'order by ' . $options['order'];
		}

		// foreach ($options['conditions'] as $key => $value) {
		// 	$where_clause = $where_clause . " AND $key = :$key ";
		// }

		$sql_query = "
			SELECT * 
			from $table 
			$where_clause $order_by";

		$stmt = self::$db->prepare($sql_query);

		foreach ($options['conditions'] as $key => &$value) {
			$stmt->bindParam(':'.$key, $value);
		}

		
		$stmt->execute();
		
		if(isset($options['single']) && $options['single'] == true){
			$result = $stmt->fetch();
			if(!empty($result)){
				return $result;
			}
			return [];
		}
		
		return $stmt->fetchAll();

	}	

}

  
