<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

include_once $_SERVER['DOCUMENT_ROOT']."/prog_g1/desenv/modelo/Usuario.class.php";



class ControleUsuario {

	public function login($email, $senha){
		session_start();
		
		$usuario = new Usuario();
		
		if($usuario->login($email, $senha)){
			
			$_SESSION['usuario'] = $usuario->getId_usuario();		
			$_SESSION['tipo'] = $usuario->getId_tipo();
			$_SESSION['nome'] = $usuario-> getNome();
			$_SESSION['email'] = $usuario-> getEmail();
			$_SESSION['logado'] = 1;
			header("location:visao/home.php");
	
		} 
		else {
			return false;
		}
		
	}
	
	public function listarUm($idUsuario){
		$usuario = new Usuario($idUsuario,null,null,null,null,null,null,null);
		$usuario->listarUm();
		return $usuario;
	}
	
		public function listarTodos(){
		$usuario = new Usuario();
		$usuarios = $usuario->listarTodos();
		return $usuarios;
	}

	
	/*public function alterar($dados){
		$usuario = new Usuario($dados['id_usuario'],$dados['id_tipo'],$dados['nome'],$dados['senha'],$dados['email'],$dados['cpf'],$dados['ativoSistema']);
		$usuario->alterar();
		header("location: lstUsuario.php");
	}*/

	}
	
