<?php
error_reporting(E_ALL);
ini_set('diplay_errors',1);
include_once $_SERVER['DOCUMENT_ROOT']."/prog_g1/desenv/modelo/Registro.class.php";


class ControleRegistro{

	

	function listarTodos(){
		$registro = new Registro();
		$registros = $registro->listarTodos();
		return $registros;
	}

	function listarPorInternacao($id_internacao){
		
		$registro = new Registro();
		$registros= $registro->listarPorInternacao($id_internacao);
		
		return $registros;
	}
	
	function listarUm($id_registro){
		$registro = new Registro($id_registro);
		$registro->listarUm();
		return $registro;
	}

	function voltarInternacao(){
		header("location:http://192.168.103.223/prog_g6/desenv/internacao.php");
	}

}

?>