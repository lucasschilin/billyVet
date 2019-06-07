<?php
error_reporting(E_ALL);
ini_set('display_erros',1);


include_once $_SERVER['DOCUMENT_ROOT']."/prog_g1/desenv/controle/ControleUsuario.class.php";
$resultado = true;
if(!empty($_POST['botao'])){
	$cUsuario = new ControleUsuario();
	$resultado = $cUsuario->login($_POST['email'], $_POST['senha']);
	
	
}


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<title>BillyVet</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="css/estilo.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</head>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="#">
			<img src="https://commons.wikivet.net/images/4/49/Dog-logo.png" width="30" height="30" class="d-inline-block align-top" alt="BillyVet">
			BillyVet
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="nav navbar-nav mr-auto">
			
			
				<li class="nav-item ">
					<a class="nav-link" href="index.php" id="navbarDropdownMenuLink" >
						A clínica
					</a>
				</li>
				<li class="nav-item ">
					<a class="nav-link" href="visao/contato.php" id="navbarDropdownMenuLink" >
						Contato
					</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="logIn.php" id="navbarDropdownMenuLink" >
						Acesso Restrito
					</a>
				</li>
			 
			 </ul>
			
			<ul class="nav navbar-nav">
				<!-- alinhado à direita -->
				<li class="nav-item">
					<a class="nav-link" href="#">
					
					</a>
				</li>
			
				
			</ul>
			
		
		</div>
	</nav>
	<body>
	
		<div class='container-fluid'>
		
			<div class="row" id="linha">
			<div class="col-5" id="logo" >
			<img src="logo.jpg" alt="BillyVet">
			
			<h3> Clínica Veterinária BillyVet</h3>
			</div>
			<div class="col-6" id="coluna2" > 
			<form action="logIn.php" method="post" class="form-controle my-2 my-lg-0 ml-lg-3">
		<div class="form-controle my-2 my-lg-0 ml-lg-3" >
		<h3>Acesso restrito</h3> <br><br>
			E-mail<span style="color:red;">*</span>: <input class="form-controle my-2 my-lg-0 ml-lg-3" type="email" name="email" value="" required> <br><br>
			Senha<span style="color:red;">*</span>: <input class="form-controle my-2 my-lg-0 ml-lg-3" type="password" name="senha" value=""required> <br><br>
			<a href="visao/recuperarsenha.php"> Recuperar senha </a><br> <br>
			<input class="btn btn-primary my-2 my-sm-0" type="submit" name="botao" value="Entrar">
			<a class="btn btn-primary" href="index.php" role="button">Voltar</a>
			
			
			
			</div>
		</form>
			</div>
			</div>
		</div>
		
		
		
	</body>
</html>