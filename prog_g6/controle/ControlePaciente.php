<?php
include_once $_SERVER['DOCUMENT_ROOT']."/prog_g6/desenv/modelo/Paciente.class.php";

class ControlePaciente{

	public function inserir($dados){
		$paciente = new Paciente(null,2,$dados['nomepaciente'],$dados['dt'],$dados['raca'],$dados['plano'],$dados['cep'],$dados['bairro'],$dados['logradouro'],$dados['ncasa'],$dados['complemento']);
		$paciente->inserir();
		header("location:../visao/lstPaciente.php");
	}

	public function listarTodos(){
		$paciente = new Paciente();
		$pacientes = $paciente->listarTodos();
		return $pacientes;
	}
	public function listarUm($id_usuario){
		$paciente = new Paciente($id_usuario,null,null,null,null,null,null,null,null,null);
		$paciente->listarUm();
		return $paciente;
	}

	/*
	// isso aqui alterei
	public function buscar($dados){
		$paciente = new Paciente();
		$busca = new BuscarPaciente($dados['pesquisa'], $dados['coluna']);

	}
	public function alterar($dados){
		$paciente = new Paciente($dados['id_usuario'],$dados['id_cidade'],$dados['nomepaciente'],$dados['dt'],$dados['raca'],$dados['plano'],$dados['cep'],$dados['bairro'],$dados['logradouro'],$dados['ncasa'],$dados['complemento']);
		$paciente->alterar();
		header("location: lstPaciente.php");
	}
	*/
}

?>