<?php
session_start();
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

include_once $_SERVER['DOCUMENT_ROOT']."/prog_g6/desenv/controle/ControleCadastro.class.php";
include_once $_SERVER['DOCUMENT_ROOT']."/prog_g6/desenv/modelo/Cadastro.class.php";
if(isset($_POST['botao']) && $_POST['botao']=="cadastrar"){
	$cCadastro = new ControleCadastro();
	$cCadastro->inserir($_POST);
}

$pacientes = Cadastro::listaPacientes();
$veterinarios = Cadastro::listaVeterinarios();
$quartos = Cadastro::listaQuartos();
$usuarios = Cadastro::listaUsuarios();

//$cCadastro = new ControleCadastro();
//$cadastros = $cCadastro->listarTodos();
?>
<script>
	function alertaSair() {
		confirma = confirm("Tem certeza que deseja sair?");
		if (confirma) {
			return true;
		} else {
			return false;
		}
	} 
</script>
<html>
	<head>
		<title>Cadastro de internação</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</head>
	
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="#">
			<img src="../../../prog_g1/desenv/logo.jpg" width="30" height="30" class="d-inline-block align-top" alt="BillyVet">
			BillyVet
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="nav navbar-nav mr-auto">
			<?php if($_SESSION['tipo'] == 1){  ?>
			 <li class="nav-item active">
					<a class="nav-link dropdown-toggle" href="#"  id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Usu�rios   </a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
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
						<a class="dropdown-item" href="../../../prog_g3/desenv/visao/buscarPaciente.php">Buscar</a>
						
					</div>
				</li>
				<li class="nav-item dropdown active">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Consultas
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="../../../prog_g7/desenv/visao/cadConsulta.php">Novo</a>
						
						
					</div>
				<li class="nav-item dropdown active">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" 
						aria-haspopup="true" aria-expanded="false">
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
	
			 <?php }  ?>
			  <?php if($_SESSION['tipo'] == 4){  ?>
				<li class="nav-item dropdown active">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Consultas
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="../../../prog_g7/desenv/visao/lstConsultas.php">Listar</a>
						
						
					</div>
			 <?php }  ?>
			 
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
	<div class="container-fluid">
	<form method= "POST" class="form my-2 my-lg-0 ml-lg-3" action="cadInter.php">
		<h1>Cadastro de internação</h1>
		<div class="row">
			<div class="col-2">
				Paciente<span style="color:red">*</span> : <!-- Editar name -->
			</div>
			<div class="col-10"> 
				<select class="form-control" id="exampleFormControlSelect1" name="paciente" required>
					<?php
						foreach($pacientes as $paciente){
							foreach($usuarios as $usuario){
								if($paciente['id_usuario'] == $usuario['id_usuario']){
							echo "<option value = ".$paciente['id_usuario'].">".$paciente['nomeP']." | ".$usuario['nome']."</option>";
								}
							}
						}
					?>
				</select> <br>
			</div>
		</div>
		<div class="row">
			<div class="col-2">
				Veterinário responsável<span style="color:red">*</span> :
			</div>
			<div class="col-10">
				<select class="form-control" id="exampleFormControlSelect1" name="veterinario" required>
					<?php
						foreach($veterinarios as $veterinario){
							echo "<option value = ".$veterinario['id_usuario'].">".$veterinario['nome']."</option>";
						}
					?>
				</select> <br>
			</div>
		</div>
		<div class="row">
			<div class="col-2">
				Data de entrada<span style="color:red">*</span> :
			</div>
			<div class="col-10">
			 	<input class="form-control mr-sm-2" type="date" 
				placeholder="Data entrada" name="dt_entrada" required max="<?=date('Y-m-d')?>"> <br>
				<input class="form-control mr-sm-2" type="date" placeholder="Data entrada" name="dt_saida" value=null hidden max="<?=date('Y-m-d')?>"> 
			</div>
		</div>
		<div class="row">
			<div class="col-2">
				<label for="exampleFormControlSelect1">Grau de complicação<span style="color:red">*</span> :</label><br>
			</div>
			<div class="col-10">
				<select class="form-control" id="exampleFormControlSelect1" name="grau_complicacao" required>
				  <option>Alto</option>
				  <option>Médio</option>
				  <option>Baixo</option>
				</select> <br>
			</div>
		</div>
		<div class="row">
			<div class="col-2">
				<label for="exampleFormControlSelect1">Quarto<span style="color:red">*</span> :</label>
			</div>
			<div class="col-10">
				<select class="form-control" id="exampleFormControlSelect1" name="id_quarto" required><!-- Andar A=Grau alto, Andar B= Grau medio, Andar C= grau Baixo -->
					<?php
						foreach($quartos as $quarto){
							if($quarto['disponivel']=='1'){
							echo "<option value = ".$quarto['id_quarto'].">".$quarto['descricao']."</option>";
						}
						}
					?>
				</select><br>
			</div>
		</div>
		<div class="row">
			<div class="col-2">
				Veterinário que indicou :
			</div>
			<div class="col-10"> 
				<input class="form-control mr-sm-2" type="text" placeholder="Ex: fulano" name="nomeVI"><br>
			</div>
		</div>
		<div class="row">
			<div class="col-2">
				E-mail do veterinário que indicou : 
			</div>
			<div class="col-10"> 
				<input class="form-control mr-sm-2" type="email" placeholder="Ex: fulano@email.com" name="emailVI"><br>
			</div>
		</div>
		<span style="color:red">*</span> Campo obrigatório <br><br>
		<button class="btn btn-primary my-2 my-sm-0" type="submit" name="botao" value="cadastrar">Cadastrar</button>
		<a href="../internacao.php" class="btn btn-primary my-2 my-sm-0">Voltar</a>
	</form>
	</div>
</html>