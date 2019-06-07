<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once $_SERVER['DOCUMENT_ROOT']."/prog_g2/desenv/modelo/Veterinario.class.php";

class ControleVeterinario{

	public function inserir($dados){
		$veterinario = new Veterinario(null,null,$dados['nome'],null,$dados['email'],$dados['telefone'],$dados['cpf'],$dados['tipo'],$dados['crmv'],$dados['nivel_form'],$dados['dt_nasc']);
		$veterinario->inserir();

	}
	public function temporario($dados){
		$dados_cad = array($dados['nome'],$dados['email'],$dados['telefone'],$dados['cpf'],$dados['tipo'],$dados['crmv'],$dados['nivel_form'],$dados['dt_nasc']);
		return $dados_cad;
	}
	public function listarTodos(){
		$veterinario = new Veterinario();
		$veterinarios = $veterinario->listarTodos();
		return $veterinarios;
	}

	public function listarFiltrar($filtro){
		$veterinario = new Veterinario();
		$veterinarios = $veterinario->listarFiltrar($filtro);
		return $veterinarios;
	}
	public function listarUm($id_usuario){
		$veterinario = new Veterinario($id_usuario,null,null);
		$veterinario->listarUm();
		return $veterinario;
	}

	public function alterar($dados){
		$veterinario = new Veterinario($dados['id_usuario'], null, $dados['nome'], null, null, $dados['telefone'], $dados['cpf'], $dados['tipo'], $dados['crmv'], $dados['nivel_form'],$dados['dt_nasc']);
		$veterinario->alterar();
		header("location: listarVet.php");
	}



}

?>