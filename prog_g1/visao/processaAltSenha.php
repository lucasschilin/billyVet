<?php
session_start();if($_SESSION['logado']!=1){
	header("Location: ../../../prog_g1/desenv/index.php");
}
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once $_SERVER['DOCUMENT_ROOT']."/prog_g1/desenv/modelo/Usuario.class.php";

include_once $_SERVER['DOCUMENT_ROOT']."/prog_g1/desenv/db/MySQL.class.php";
$con = new MySQL();
$usr = new Usuario();
if ($usr->login($_SESSION['email'], $_POST['senhaAtual'])){
	if ($_POST["senhaNova"] == $_POST["confirmSenha"]){
		$usr->setSenha($_POST["senhaNova"]);
		$usr->alterarSenha();
		echo  "<script>alert('Senha alterada com Sucesso!');</script>";
		
		echo "<script>javascript:window.location='home.php';</script>";
	}else{
		header("Location: alterarSenha.php");
	}
}else{
		header("Location: alterarSenha.php");
		
	}

?>