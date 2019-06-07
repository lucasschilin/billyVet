<?php
session_start();
  if($_SESSION['logado']!=1){
    header("Location: ../../../prog_g1/desenv/index.php");
}

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL); 
include_once $_SERVER['DOCUMENT_ROOT']."/prog_g3/desenv/controle/ControleUsuario.class.php";
$cControle = new ControleUsuario();

include_once $_SERVER['DOCUMENT_ROOT']."/prog_g3/desenv/controle/ControlePaciente.class.php";
$ccControle = new ControlePaciente();


$usuarios = $cControle->listarTodos();
$pacientes = $ccControle->listarTodos();

?>
<html>
	<head>
		<title>Lista de Pacientes</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<link rel="shortcut icon" href="https://commons.wikivet.net/images/4/49/Dog-logo.png">
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
				<?php if($_SESSION['tipo'] == 1){  ?>
					 <li class="nav-item active">
							<a class="nav-link dropdown-toggle" href="#"  id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Usuários</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<a class="dropdown-item" href="../../../prog_g5/desenv/visao/FormularioUsuario.php">Novo Atendente</a>
								<a class="dropdown-item" href="../../../prog_g5/desenv/visao/lstAtendente.php">Listar Atendentes</a>
							</div>
					</li>
				 <?php }  ?>
			 
			 	<?php if($_SESSION['tipo'] == 2){  ?>
					 <li class="nav-item dropdown active">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Agendamentos
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<a class="dropdown-item" href="../../../prog_g4/desenv/visao/cadAgendamento.php">Novo</a>
								<a class="dropdown-item" href="../../../prog_g4/desenv/visao/lstAgendamentos.php">Listar</a>
								
							</div>
						</li>
					<li class="nav-item dropdown active">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Pacientes
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="../../../prog_g3/desenv/visao/cadPaciente.php">Novo</a>
							<a class="dropdown-item" href="../../../prog_g3/desenv/visao/lstPaciente.php">Listar</a>
						</div>
					</li>
					<li class="nav-item dropdown active">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Consultas
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="../../../prog_g7/desenv/visao/cadConsulta.php">Novo</a>
							<a class="dropdown-item" href="../../../prog_g7/desenv/visao/lstAtendente.php">Listar</a>
						</div>
					</li>
					<li class="nav-item dropdown active">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Internações
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="../../../prog_g6/desenv/visao/cadInter.php">Novo</a>
							<a class="dropdown-item" href="../../../prog_g6/desenv/internacao.php">Listar</a>
						</div>
					</li>
					<li class="nav-item dropdown active">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Usuários
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="../../../prog_g2/desenv/visao/listarVet.php">Listar Veterinários</a>
						</div>
					</li>
			 	<?php }  ?>
			 
			 	<?php if($_SESSION['tipo'] == 3){  ?>
					<li class="nav-item dropdown active">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Consultas
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="../../../prog_g1/desenv/visao/lstConsulta.php"> Listar </a>
						</div>
					</li>
					<li class="nav-item dropdown active">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Internações
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"> <!--grupo1 -->
							<a class="dropdown-item" href="../../../prog_g1/desenv/visao/lstInternacoes.php"> Listar </a>
						</div>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="../../../prog_g1/desenv/visao/lstPaciente.php" id="navbarDropdownMenuLink" >
							Paciente
						</a>
					</li>
			 	<?php } ?>

			  	<?php if($_SESSION['tipo'] == 4){  ?>
					<li class="nav-item dropdown active">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Consultas
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="../../../prog_g7/desenv/visao/lstConsultas.php">Listar</a>
						</div>
			 	<?php } ?> 
			</ul>
			<ul class="nav navbar-nav">
				<li class="nav-item dropdown active">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<?php echo $_SESSION['nome'];?>
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="../../../prog_g1/desenv/visao/alterarSenha.php">Trocar senha</a>
						<a class="dropdown-item" href="../../../prog_g1/desenv/visao/logOut.php" &acao="sair" onclick="return alertaSair();" >Sair</a>
					</div>
				</li>
			</ul>
		</div>
	</nav>

	<!-- Campos de busca-->
	<div class="container-fluid">
		<div class="row">
			<div class="col">
				<h1> Pacientes 
					<a href="cadPaciente.php" alt="Novo Paciente"> 
						<img src="/prog_img/cadastrar.png" style="width: 30px; right: 30px;">
					</a> 
				</h1>
			</div>
			<div class="col">
				<div class="row">
					<!--<div class="col">
						<div class="form-group required">
							<select name='opcao' class='form-control mr-sm-2' style="margin-left: 15px; margin-top: 15px;" required'>
								<option class="dropdown-item" value = ""			id = 'vazio'	 >Selecione um filtro de busca	</option>
								<option class="dropdown-item" value = 'nomeP'   	id = 'nomeP'	 >Nome do Paciente 				</option>
								<option class="dropdown-item" value = 'nomeT' 		id = 'nomeT' 	 >Nome do Tutor					</option>
								<option class="dropdown-item" value = 'email' 		id = 'email'	 >E-mail						</option>
							</select>
						</div>-->
					</div>
					<div class="col">
						<div class="form-group required">
							<input placeholder='Digite nome do pet para buscar' type='text' id="busca" name='busca' style="margin-top: 15px;" class='form-control mr-sm-2 width-50' required>
						</div>	
					</div>	
				</div>	
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function(){
		 	$("#busca").on("keyup", function() {
		    	var value = $(this).val().toLowerCase();
			    $("#informacoes .busca1").filter(function() {
			    	$(this).parent().toggle($(this).text().toLowerCase().indexOf(value) > -1)
			    });
		  });
		 $("#busca").trigger("keyup");
		});
	</script>
	<div class="tab-content" id="nav-tabContent" >
		<table class="table table-hover" id="informacoes">
			<thead>
				<tr class = "thead-light">
					<th scope="col">Nome do Pet</th>
					<th scope="col">Tutor</th>
					<th scope="col">E-mail</th>
					<th scope="col">Telefone</th>
					<th scope="col">Situação</th>
					<th scope="col">Opção</th>
				</tr>
			</thead>
			<tbody id="informacoes">
				<?php
				if($pacientes!=false){
					foreach($usuarios as $usuario){
				?>
				<tr>
				<?php
					echo"<td class = 'busca1'>";
					foreach($pacientes as $paciente){
						if($paciente->getId_usuario() == $usuario->getId_usuario()){
							echo "<a href='visPaciente.php?id_usuario=".$paciente->getId_usuario()."'>".$paciente->getNomepaciente()."</a>";
						}
					}
					echo"</td >";
					echo"<td class = 'busca2'>";
						echo $usuario->getNometutor();
					echo"</td>";
					echo"<td class = 'busca3'>";
						echo $usuario->getEmail();
					echo"</td>";
					echo"<td>";
						echo $usuario->getCelular();
					echo"</td>";
					echo"<td>";
						if ($usuario->getAtivo() == '0'){
							echo("Inativo");
						}else{
							echo("Ativo");
						}
					echo"</td>";
					echo"<td>";
						echo "<a href='editPaciente.php?id_usuario=".$usuario->getId_usuario()."'>"?>
							<img src="/prog_img/editar.png" style="width: 25px; right: 25px;">
							</a>
					<?php
					echo"</td>";?>	
								
				</tr>
				<?php
					}	
				}?>
				
		</table>
	</div>
</html>
   
          