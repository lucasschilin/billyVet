<html>

<head>
	<title>BillyVet</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>

<body>
<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once $_SERVER['DOCUMENT_ROOT']."/prog_g1/desenv/controle/ControleUsuario.class.php";

include_once $_SERVER['DOCUMENT_ROOT']."/prog_g1/desenv/db/MySQL.class.php";

$con = new MySQL();
$email =  $_POST['email'];
$sql = "SELECT COUNT(id_tipo) as contador FROM usuario WHERE email = '".$email."'";
$res = $con->consulta($sql);
foreach ($res as $r){
	$result = $r['contador'];
}


if ($result==1){
	
	$sql = "SELECT senha FROM usuario WHERE email = '".$email."'";
	$res = $con->consulta($sql);
	
	foreach($res as $s){
		$v = $s[0];
	}
	
	echo "<script> alert('Sua senha é: ".$v."'); </script>";
	echo "<script>window.location.href ='../logIn.php';</script>";
		
	
}else{
	$sql = "SELECT nome, senha 
			FROM usuario 
			WHERE email= '".$email."' AND id_tipo !=3 
			UNION 
			SELECT paciente.nomeP, usuario.senha 
			FROM paciente, usuario 
			WHERE paciente.id_usuario=usuario.id_usuario AND id_tipo=3 AND email= '".$email."'";
			
			$res = $con->consulta($sql);
			$n = "Nome e senhas:\\n";
			foreach ($res as $r){
				$n = $n."Sua senha para o usuario ".$r[0]." é ".$r[1].".\\n ";
			}
			
			echo "<script> alert('".$n."'); </script>";
			echo "<script>window.location.href ='../index.php';</script>";
}

?>
</body>