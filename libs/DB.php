<?php

class DB extends PDO {
	private $hostname = 'localhost';
	private $database = 'cms';
	private $username = 'root';
	private $password = '';
	private $pdo;
	private $sQuery;
	private $bConnected = false;
	private $parameters;

	public function __construct() {
		$dsn = 'mysql:dbname='.$this->database.';host='.$this->hostname;
		parent::__construct($dsn, $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	}

	/*private function connection() {
		$dsn = 'mysql:dbname='.$this->database.';host='.$this->hostname;
		try {
			$this->pdo = new PDO($dsn, $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
			#$this->bConnected = true;
			return $this->pdo;
		} catch (PDOException $e) {
			echo $e->getMessage();
			die();
		}
	}*/

	public function CloseConnection() {
	 	$this->pdo = null;
	}

	private function Init($query,$parameters = "") {
		if (!$this->bConnected) { $this->Connect(); }
		try {
			$this->sQuery = $this->pdo->prepare($query);

			$this->bindMore($parameters);
			if(!empty($this->parameters)) {
				foreach($this->parameters as $param) {
					$parameters = explode("\x7F",$param);
					$this->sQuery->bindParam($parameters[0],$parameters[1]);
				}
			}
			$this->success = $this->sQuery->execute();
		} catch(PDOException $e) {
				echo $e->getMessage();
		}
		$this->parameters = array();
	}

	public function bind($para, $value) {
		$this->parameters[sizeof($this->parameters)] = ":" . $para . "\x7F" . utf8_encode($value);
	}

	public function bindMore($parray) {
		if(empty($this->parameters) && is_array($parray)) {
			$columns = array_keys($parray);
			foreach($columns as $i => &$column)	{
				$this->bind($column, $parray[$column]);
			}
		}
	}

	/*public function query($query,$params = null, $fetchmode = PDO::FETCH_ASSOC) {
		$query = trim($query);
		$this->Init($query,$params);
		$rawStatement = explode(" ", $query);

		$statement = strtolower($rawStatement[0]);

		if ($statement === 'select' || $statement === 'show') {
			return $this->sQuery->fetchAll($fetchmode);
		} elseif ( $statement === 'insert' ||  $statement === 'update' || $statement === 'delete' ) {
			return $this->sQuery->rowCount();
		} else {
			return NULL;
		}
	}*/

	public function column($query,$params = null) {
		$this->Init($query,$params);
		$Columns = $this->sQuery->fetchAll(PDO::FETCH_NUM);
		$column = null;
		foreach($Columns as $cells) {
			$column[] = $cells[0];
		}
		return $column;

	}

	public function row($query,$params = null,$fetchmode = PDO::FETCH_ASSOC) {
		$this->Init($query,$params);
		return $this->sQuery->fetch($fetchmode);
	}

	public function single($query,$params = null) {
		$this->Init($query,$params);
		return $this->sQuery->fetchColumn();
	}

}
?>