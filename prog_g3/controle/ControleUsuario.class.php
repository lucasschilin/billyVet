<?php
include_once $_SERVER['DOCUMENT_ROOT']."/prog_g3/desenv/modelo/Usuario.class.php";

class ControleUsuario{

	public function inserir($dados){
		$usuario = new Usuario(null,1,$dados['nometutor'],$dados['email'],$dados['celular'],$dados['cpf'], $dados['ativo']);
		$usuario->inserir();
	}

	public function temporario($dados){
		$dados_cad = array($dados['nomepaciente'],$dados['dt'],$dados['raca'],$dados['plano'],$dados['nometutor'],$dados['email'],$dados['celular'],$dados['cpf'],$dados['cep'],$dados['bairro'],$dados['logradouro'],$dados['ncasa'],$dados['complemento'],$dados['ativo']);
		return $dados_cad;
	}

	public function listarTodos(){
		$usuario = new Usuario();
		$usuarios = $usuario->listarTodos();
		return $usuarios;
	}
	public function listarUm($id_usuario){
		$usuario = new Usuario($id_usuario,null,null,null,null,null,null,null);
		$usuario->listarUm();
		return $usuario;
	}
	
	public function alterar($dados){
		$usuario = new Usuario($dados['id_usuario'],1,$dados['nometutor'], $dados['email'], $dados['celular'], $dados['cpf'], $dados['ativo']);
		$usuario->alterar();
		header("location: visPaciente.php?id_usuario=".$dados['id_usuario']);
	}
}

?>