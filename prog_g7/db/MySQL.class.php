<?php 
	error_reporting(E_ALL);
	ini_set('display_errors', 1)
 ?>
<?php
include_once "Configuracao.inc.php";

class MySQL{
	
	private $connection;
	
	public function __construct(){
		$this->connection = new mysqli(HOST,USUARIO,SENHA,BANCO);
	}
	public function __destruct(){
		mysqli_close($this->connection);
	}
	public function executa($sql){
		$result = $this->connection->query($sql);
		return $result;
	}
	public function consulta($sql){
		$result = $this->connection->query($sql);
		$item = array();
		$data = array();
		while($item = mysqli_fetch_array($result)){
			$data[] = $item;
		}
		return $data;
		}
	}
?>