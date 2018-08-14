<?php

namespace App\Model;

use \PDO;

class Model 
{	

	protected $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";port=".DB_PORT.";charset=".DB_CHARSET;
	protected $opt = [
	    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
	    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	    PDO::ATTR_EMULATE_PREPARES   => false,
	];

	protected $db;

	public function __construct()
	{
		$this->db = new PDO($this->dsn, DB_USER, DB_PASS, $this->opt);
	}

	public function homePage() {

		/*$sql_query = '

			SELECT

				* 
			from table

			limit 100
		';

		$stmt = $this->db->prepare($sql_query); // stmt = statement
		$stmt -> execute();
		
		return $sql_res = $stmt -> fetchAll();*/

		return 'homePage model method used';
	}

	public function itemPage() {

		return 'itemPage model method used';
	}


	public function lastInsertId(){
		return $this->db->lastInsertId();
	}



	public function insert($table, $data){
		try {
			$columns = implode(',', array_keys($data));
			$values = ':' . implode(', :', array_keys($data));

			$sql_query = "INSERT INTO $table($columns) VALUES($values)";
		
			$stmt = $this->db->prepare($sql_query);

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

	public function selectSingle($table, $data){
		return $this->select($table, $data, true);

	}

	public function select($table, $where, $single = false){
		$where_clause = 'where 1 = 1 ';
		
		foreach ($where as $key => $value) {
			$where_clause = $where_clause . " AND $key = :$key ";
		}

		$sql_query = "
			SELECT * 
			from $table 
			$where_clause";

		$stmt = $this->db->prepare($sql_query);

		foreach ($where as $key => $value) {
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
	/*
	public function getCountryById($id){
		$sql_query = "
			SELECT * 
			from country 
			where id = $id";

		$stmt = $this->db->prepare($sql_query); // stmt = statement
		$stmt -> execute();
		
		return $sql_res = $stmt -> fetch();		
	}

	public function getCountryByName($name){
		$sql_query = "
			SELECT * 
			from country 
			where name = $name";

		$stmt = $this->db->prepare($sql_query); // stmt = statement
		$stmt -> execute();
		
		return $sql_res = $stmt -> fetch();		
	}

	public function insertCountry($name){
		$sql_query = "INSERT INTO country(name) values('$name')";

		$stmt = $this->db->prepare($sql_query); // stmt = statement
		$result = $stmt -> execute();		

		return $result;
	}





	public function getCompanyById($id){
		$sql_query = "
			SELECT * 
			from company 
			where id = $id";

		$stmt = $this->db->prepare($sql_query); // stmt = statement
		$stmt -> execute();
		
		return $sql_res = $stmt -> fetch();		
	}

	public function getCompanyByName($name){
		$sql_query = "
			SELECT * 
			from company 
			where name = $name";

		$stmt = $this->db->prepare($sql_query); // stmt = statement
		$stmt -> execute();
		
		return $sql_res = $stmt -> fetch();		
	}	

	public function insertCompany($name){
		$sql_query = "INSERT INTO company(name) values('$name')";

		$stmt = $this->db->prepare($sql_query); // stmt = statement
		$result = $stmt -> execute();		

		return $result;
	}
	*/
	

}

  
