<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

include_once $_SERVER['DOCUMENT_ROOT']."/prog_g1/desenv/modelo/Paciente.class.php";
include_once $_SERVER['DOCUMENT_ROOT']."/prog_g1/desenv/modelo/Usuario.class.php";
session_start();

if($_SESSION['logado']!=1){
	header("Location: ../../../prog_g1/desenv/index.php");
}
?>

<html>
	
	<head>
		
		<title>BillyVet</title>
		<meta charset="UTF-8">
		
		<link rel="stylesheet" href="../css/estilo.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		
	</head>
	

	<!--Cabeçalho-->
	
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
					<a class="nav-link dropdown-toggle" href="#"  id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Usuários   </a>
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
	<body>
	<!--Pagina-->
	<?php
		$paciente = new Paciente();
		$paciente->loadInfo($_SESSION['usuario']);
	?>
	
		<div class = row >
<div class="col-2"  >
</div >
<div class="col-8">
<div class="col-10 container-fluid">
			<h1> Visualização de paciente </h1>

	      <div class="form-row">
    		<div class="col-2">
	        	<label class= "control-label" style="margin-left: 10px; margin-top: 12px;"> Nome do Paciente:    </label>
	    	</div>
	    	<div class="col" style="width: 100%">
	      		<input name='nomeP' placeholder="<?php echo $paciente->getNomeP(); ?>" class='form-control mr-sm-2' style="margin-top: 8px" disabled> </input>
	      	</div>
	      </div>
		  
		  <?php 
		          $date = $paciente->getDt_nasc();
		          $orderdate = explode('-', $date);
		          $month = $orderdate[1];
		          $day   = $orderdate[2];
		          $year  = $orderdate[0];
		  ?>

	      <div class="form-row">
    		<div class="col-2">
	        	<label class= "control-label" style="margin-left: 10px; margin-top: 12px;"> Data de Nascimento:  </label>
	       </div>
	       <div class="col" style="width: 100%">
	       		<input name='dtnasc' placeholder="<?php echo $day."/".$month."/".$year;?>" class='form-control mr-sm-2' style="margin-top: 8px" disabled> </input>
	       	</div>
	      </div>
		  
		  <div class="form-row">
    		 <div class="col-2">
	        	<label class= "control-label" style="margin-left: 10px; margin-top: 12px;"> Raça: </label>
	      	</div>
	        <div class="col" style="width: 100%">
	       		<input name='raca' placeholder="<?php echo $paciente->getRaca(); ?>" class='form-control mr-sm-2' style="margin-top: 8px" disabled> </input>
	       	</div>
	      </div>
		  
		  <h3>Informações do Tutor</h3>

	      <div class="form-row">
    		<div class="col-2">
	        	<label class= "control-label" style="margin-left: 10px; margin-top: 12px;"> Plano de Saúde: </label>
	    	</div>
	    	<div class="col" style="width: 100%">
	      		<input name='planoS' placeholder="<?php echo $paciente->getPlano_s(); ?>" class='form-control mr-sm-2' style="margin-top: 8px" disabled> </input>
	      	</div>
	      </div>
		  
		  <div class="form-row">
    		<div class="col-2">
	        	<label class= "control-label" style="margin-left: 10px; margin-top: 12px;"> CEP: </label>
	    	</div>
	    	<div class="col" style="width: 100%">
	      		<input name='cep' placeholder="<?php echo $paciente->getCep(); ?>" class='form-control mr-sm-2' style="margin-top: 8px" disabled> </input>
	      	</div>
	      </div>
		  
		  <div class="form-row">
    		<div class="col-2">
	        	<label class= "control-label" style="margin-left: 10px; margin-top: 12px;"> Bairro: </label>
	    	</div>
	    	<div class="col" style="width: 100%">
	      		<input name='bairro' placeholder="<?php echo $paciente->getBairro(); ?>" class='form-control mr-sm-2' style="margin-top: 8px" disabled> </input>
	      	</div>
	      </div>
		  
		  <div class="form-row">
    		<div class="col-2">
	        	<label class= "control-label" style="margin-left: 10px; margin-top: 12px;"> Logradouro: </label>
	    	</div>
	    	<div class="col" style="width: 100%">
	      		<input name='logradouro' placeholder="<?php echo $paciente->getLogadouro(); ?>" class='form-control mr-sm-2' style="margin-top: 8px" disabled> </input>
	      	</div>
	      </div>
		  
		  	      <div class="form-row">
    		<div class="col-2">
	        	<label class= "control-label" style="margin-left: 10px; margin-top: 12px;"> N° Casa: </label>
	    	</div>
	    	<div class="col" style="width: 100%">
	      		<input name='nCasa' placeholder="<?php echo $paciente->getNumero(); ?>" class='form-control mr-sm-2' style="margin-top: 8px" disabled> </input>
	      	</div>
	      </div>
		  
		  <div class="form-row">
    		<div class="col-2">
	        	<label class= "control-label" style="margin-left: 10px; margin-top: 12px;"> Complemento:</label>
	        </div>
	    	<div class="col" style="width: 100%">
	      		<input name='complemento' placeholder="<?php echo $paciente->getComplemento(); ?>" class='form-control mr-sm-2' style="margin-top: 8px" disabled> </input>
	      	</div>
	      </div>
		  
		  <div class="form-row">
    		<div class="col-2">
	        	<label class= "control-label" style="margin-left: 10px; margin-top: 12px;"> Nome do Tutor: </label>
	    	</div>
	    	<div class="col" style="width: 100%">
	      		<input name='nometutor' placeholder="<?php echo $paciente->getNomeTutor();?>" class='form-control mr-sm-2' style="margin-top: 8px" disabled> </input>
	      	</div>
	      </div>
		  
		  <div class="form-row">
    		<div class="col-2">
	        	<label class= "control-label" style="margin-left: 10px; margin-top: 12px;"> E-mail: </label>
	    	</div>
	    	<div class="col" style="width: 100%">
	      		<input name='email' placeholder="<?php echo $paciente->getEmail();?>" class='form-control mr-sm-2' style="margin-top: 8px" disabled> </input>
	      	</div>
	      </div>
		  
		  <div class="form-row">
    		<div class="col-2">
	        	<label class= "control-label" style="margin-left: 10px; margin-top: 12px;"> Telefone: </label>
	    	</div>
	    	<div class="col" style="width: 100%">
	      		<input name='telefone' placeholder="<?php echo $paciente->getTelefone();?>" class='form-control mr-sm-2' style="margin-top: 8px" disabled> </input>
	      	</div>
	      </div>
		  
		   <div class="form-row">
    		<div class="col-2">
	        	<label class= "control-label" style="margin-left: 10px; margin-top: 12px;"> CPF: </label>
	    	</div>
	    	<div class="col" style="width: 100%">
	      		<input name='plano' placeholder="<?php  echo $paciente->getCpf(); ?>" class='form-control mr-sm-2' style="margin-top: 8px" disabled> </input>
	      	</div>
	      </div>
		  
		  <div class="form-row">
    		<div class="col-2">
	        	<label class= "control-label" style="margin-left: 10px; margin-top: 12px;"> Status: </label>
	    	</div>
	    	<div class="col" style="width: 100%">
	      		<input name='ativo' placeholder="<?php
					if($paciente->getAtivo()==1){
						echo "Ativo";
					}else{
						echo "Inativo";
					}?>" class='form-control mr-sm-2' style="margin-top: 8px" disabled> </input>
	      	</div>
	      </div>
		  <a class="btn btn-primary" href="home.php" role="button">Voltar</a>
		  
		  </div>
		  </div>
		  </div>
		</body>
	
</html>

























