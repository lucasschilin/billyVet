<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 
session_start();
if($_SESSION['logado'] != 1){
	header("Location: ../../../prog_g1/desenv/index.php");
}
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
<?php

include_once $_SERVER['DOCUMENT_ROOT']."/prog_g3/desenv/controle/ControleUsuario.class.php";
$cControle = new ControleUsuario();
include_once $_SERVER['DOCUMENT_ROOT']."/prog_g3/desenv/controle/ControlePaciente.class.php";
$ccControle = new ControlePaciente();

$usuario = $cControle->listarUm($_GET['id_usuario']);
$paciente = $ccControle->listarUm($_GET['id_usuario']);

if(isset($_POST['botao']) && $_POST['botao']=="Editar"){
	echo $usuario->getId_usuario;
	header("location: editPaciente.php?id_usuario=".$_POST['id_usuario']);
	//editPaciente.php?id_usuario=".$usuario->getId_usuario()."'>"
}

?>
<html>
  <head>
    <title>Visualização</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/prog_g3/desenv/css/estilo.css" crossorigin="anonymous">
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
	<form>
	<div class="container-fluid">
	  <body>
	    <h1> Visualização de paciente 
	    	<?php echo "<a href='editPaciente.php?id_usuario=".$usuario->getId_usuario()."'>"?>
							<html>
								<img src="/prog_img/editar.png" style="width: 30px; right: 30px;">
							</a>
							</html>
		</h1>
	      <div class="form-row">
    		<div class="col-2">
	        	<label class= "control-label" style="margin-left: 10px; margin-top: 12px;"> Nome do Paciente:    </label>
	    	</div>
	    	<div class="col" style="width: 100%">
	      		<input name='nomepaciente' placeholder="<?php echo $paciente->getNomepaciente(); ?>" class='form-control mr-sm-2' style="margin-top: 8px" disabled> </input>
	      	</div>
	      </div>

	      <?php 
		          $date = $paciente->getDt();
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
	       		<input name='raca' placeholder="<?php echo $paciente->getRaca();?>" class='form-control mr-sm-2' style="margin-top: 8px" disabled> </input>
	       	</div>
	      </div>

	      <div class="form-row">
    		<div class="col-2">
	        	<label class= "control-label" style="margin-left: 10px; margin-top: 12px;"> Plano de Saúde: </label>
	    	</div>
	    	<div class="col" style="width: 100%">
	      		<input name='plano' placeholder="<?php echo $paciente->getPlano(); ?>" class='form-control mr-sm-2' style="margin-top: 8px" disabled> </input>
	      	</div>
	      </div>
	    	
	    <h3 style="margin-top: 15px">Informações do Tutor</h3>

	       <div class="form-row">
    		<div class="col-2">
	        	<label class= "control-label" style="margin-left: 10px; margin-top: 12px;"> Nome do Tutor: </label>
	    	</div>
	    	<div class="col" style="width: 100%">
	      		<input name='nometutor' placeholder="<?php echo $usuario->getNometutor();?>" class='form-control mr-sm-2' style="margin-top: 8px" disabled> </input>
	      	</div>
	      </div>

	      <div class="form-row">
    		<div class="col-2">
	        	<label class= "control-label" style="margin-left: 10px; margin-top: 12px;"> E-mail: </label>
	    	</div>
	    	<div class="col" style="width: 100%">
	      		<input name='email' placeholder="<?php echo $usuario->getEmail();?>" class='form-control mr-sm-2' style="margin-top: 8px" disabled> </input>
	      	</div>
	      </div>

	      <div class="form-row">
    		<div class="col-2">
	        	<label class= "control-label" style="margin-left: 10px; margin-top: 12px;"> Telefone: </label>
	    	</div>
	    	<div class="col" style="width: 100%">
	      		<input name='celular' placeholder="<?php echo $usuario->getCelular();?>" class='form-control mr-sm-2' style="margin-top: 8px" disabled> </input>
	      	</div>
	      </div>

	      <div class="form-row">
    		<div class="col-2">
	        	<label class= "control-label" style="margin-left: 10px; margin-top: 12px;"> CPF: </label>
	    	</div>
	    	<div class="col" style="width: 100%">
	      		<input name='plano' placeholder="<?php echo $usuario->getCPF();?>" class='form-control mr-sm-2' style="margin-top: 8px" disabled> </input>
	      	</div>
	      </div>

	      <div class="form-row">
    		<div class="col-2">
	        	<label class= "control-label" style="margin-left: 10px; margin-top: 12px;"> CEP: </label>
	    	</div>
	    	<div class="col" style="width: 100%">
	      		<input name='cep' placeholder="<?php echo $paciente->getCEP();?>" class='form-control mr-sm-2' style="margin-top: 8px" disabled> </input>
	      	</div>
	      </div>

	      <div class="form-row">
    		<div class="col-2">
	        	<label class= "control-label" style="margin-left: 10px; margin-top: 12px;"> Bairro: </label>
	    	</div>
	    	<div class="col" style="width: 100%">
	      		<input name='bairro' placeholder="<?php echo $paciente->getBairro();?>" class='form-control mr-sm-2' style="margin-top: 8px" disabled> </input>
	      	</div>
	      </div>

	      <div class="form-row">
    		<div class="col-2">
	        	<label class= "control-label" style="margin-left: 10px; margin-top: 12px;"> Logradouro: </label>
	    	</div>
	    	<div class="col" style="width: 100%">
	      		<input name='logradouro' placeholder="<?php echo $paciente->getLogradouro();?>" class='form-control mr-sm-2' style="margin-top: 8px" disabled> </input>
	      	</div>
	      </div>

	      <div class="form-row">
    		<div class="col-2">
	        	<label class= "control-label" style="margin-left: 10px; margin-top: 12px;"> N° Casa: </label>
	    	</div>
	    	<div class="col" style="width: 100%">
	      		<input name='ncasa' placeholder="<?php echo $paciente->getNcasa();?>" class='form-control mr-sm-2' style="margin-top: 8px" disabled> </input>
	      	</div>
	      </div>

	      <div class="form-row">
    		<div class="col-2">
	        	<label class= "control-label" style="margin-left: 10px; margin-top: 12px;"> Complemento:</label>
	        </div>
	    	<div class="col" style="width: 100%">
	      		<input name='complemento' placeholder="<?php echo $paciente->getComplemento();?>" class='form-control mr-sm-2' style="margin-top: 8px" disabled> </input>
	      	</div>
	      </div>

	     

	      <div class="form-row">
    		<div class="col-2">
	        	<label class= "control-label" style="margin-left: 10px; margin-top: 12px;"> Situação: </label>
	    	</div>
	    	<div class="col" style="width: 100%">
	      		 <input name='plano' placeholder="<?php 
		            if($usuario->getAtivo()==1){

		              echo "Ativo";
		            }else{
		              echo "Inativo";
		            }
		        ?>" class='form-control mr-sm-2' style="margin-top: 8px" disabled> </input> 
	      	</div>
	      </div>
	  </body>
	  <form action="visPaciente.php" method="post" style="margin-left: 10px;">
	        	<?php
	        	echo "<input type='hidden' class='form-control' name='id_usuario' required value='".$usuario->getId_usuario()."'>";
	        	?>
	  </form>
	   <input id='voltar' type='button' name='botao' value='Voltar' class='btn btn-primary my-2 my-sm-0' style="margin-left: 10px;">
	</div>
	</div>
	</form>  
  <script>
    $("#voltar").click(function() {
    	window.location.href="lstPaciente.php";
    });
  </script>
</html>