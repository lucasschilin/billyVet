<?php
include_once $_SERVER['DOCUMENT_ROOT']."/prog_g1/desenv/modelo/Internacao.class.php";

class ControleInternacao{
	
	
	public function listarTodosPorUsuario(){
		$internacao = new Internacao();
		$internacoes = $internacao->listarTodosPorUsuario();
		return $internacoes;
	}

	public function listarUmPorusuario($id_internacao){
		$internacao = new Internacao(); //CRIA O OBJETO
		$internacao->listarUmPorusuario($id_internacao);
		return $internacao; 
	}
	
}
?>