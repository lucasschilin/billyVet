<?php
include_once $_SERVER['DOCUMENT_ROOT']."/prog_g1/desenv/modelo/Consulta.class.php";

class ControleConsulta{
	
	public function listarTodosPorUsuario(){
		$consulta = new Consulta();
		$consultas = $consulta->listarTodosPorUsuario();
		return $consultas;
	}

}

?>