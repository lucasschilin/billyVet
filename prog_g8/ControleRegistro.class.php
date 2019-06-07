<?php
error_reporting(E_ALL);
ini_set('diplay_errors',1);
include_once $_SERVER['DOCUMENT_ROOT']."/prog_g8/desenv/Registro.class.php";


class ControleRegistro{

	function inserir($infos){
		if(!isset($infos['visibilidade'])){
			$infos['visibilidade']=0;
		}
		$registro = new Registro(null,$infos['id_internacao'],$infos['medicamento'],$infos['procedimento'],$infos['reacao'],$infos['visibilidade'],$infos['id_atendente'], $infos['dt_registro'],$infos['dt_procedimento']);
		$id=$registro->inserir();
		header("location:/prog_g8/desenv/listaRegistros.php?id=".$registro->getId_internacao());
		
	}

	function editar($infos){

		if(!isset($infos['visibilidade'])){
			$infos['visibilidade']=0;
		}
		$registro = new Registro($infos['id_registro'],$infos['id_internacao'],$infos['medicamento'],$infos['procedimento'],$infos['reacao'],$infos['visibilidade'],$infos['id_atendente'], $infos['dt_registro'], $infos['dt_procedimento']);
		$id=$registro->editar();
		header("location:/prog_g8/desenv/visualizar.php?id_registro=".$infos['id_registro']."&id_internacao=".$infos['id_internacao']);

	}

	function listarTodos(){
		$registro = new Registro();
		$registros = $registro->listarTodos();
		return $registros;
	}

	function listarPorInternacao($id_internacao){
		
		$registro = new Registro();
		$registros = $registro->listarPorInternacao($id_internacao);
		return $registros;
	}
	
	function listarUm($id){
		$registro = new Registro($id);
		$registro->listarUm();
		return $registro;
	}

	function voltarInternacao(){
		header("../prog_g6/desenv/internacao.php");
	}

}

?>
