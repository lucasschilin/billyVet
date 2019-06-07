<?php
include_once $_SERVER['DOCUMENT_ROOT']."/agenda/modelo/Usuario.class.php";
session_start();

class ControleUsuario {

	public function login($login, $senha){
		$usuario = new Usuario();
		$resultado = $usuario->login($login, $senha);

		if($resultado){
			$_SESSION['usuario'] = $usuario;
			header("location: ../index.php");
		}
		else {
			return false;
		}
	}

	public static function permissao() {
		if(empty($_SESSION['usuario'])){
			header('Location: http://localhost/agenda/visao/logIn.php');
			die();
		}
	}

}
