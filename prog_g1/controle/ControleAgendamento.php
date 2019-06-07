<?php
include_once $_SERVER['DOCUMENT_ROOT']."/prog_g1/desenv/modelo/Agendamento.class.php";
//include_once $_SERVER['DOCUMENT_ROOT']."/prog_g1/desenv/modelo/Consulta.class.php";
class ControleAgendamento{
	
	public function listarTodosPorUsuario(){
		//$consulta = new Consulta();
		$agendamento = new Agendamento();
		$agendamentos = $agendamento->listarTodosPorUsuario();
		return $agendamentos;
	}

	
}

?>