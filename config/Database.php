<?php

class Database {
	private $dsn = "mysql:dbname=infonature;host=localhost";
	private $dbuser = "root";
	private $dbpass = "";
	private $connection;

	public function __construct() {
		$this->connection = $this->getConnection();
	}

	public function getConnection() {
		try {
			return $connection = new PDO($this->dsn, $this->dbuser, $this->dbpass);
		} catch (PDOException $e) {
			print_r("Erro BD. Conexão. ".$e->getMessage());
		}
	}
}


/*
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "infonature";
	
	//Criar a conexao
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

*/
?>