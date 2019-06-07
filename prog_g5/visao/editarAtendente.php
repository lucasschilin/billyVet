<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors',1);

include_once $_SERVER['DOCUMENT_ROOT']."/prog_g5/desenv/controle/ControleAtendente.class.php";
$cContato = new ControleAtendente();


if(isset($_POST['botaoE']) && $_POST['botaoE']=="Editar"){
	$cContato->alterar($_POST);
}else if(isset($_GET['id'])){
		$atendente = $cContato->listarUm($_GET['id']);
}


?>
<html>
	<head>
		<title> Veterinária BillyVet</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="shortcut icon" href="https://commons.wikivet.net/images/4/49/Dog-logo.png">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
		<script type="text/javaScript">
function autoRefresh(interval) {
	setTimeout("atualizar();",interval);
}
function atualizar() {
  // faz a lógica desejada...
}
</script>
    <link rel="stylesheet" href="formatacao.css" crossorigin="anonymous">

	</head>
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
						<a class="dropdown-item" href="../../../prog_g2/desenv/visao/listarVet.php">Listar Veterin�rios</a>
						
						
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



         <!--CÓDIGO NOVO ADICIONADO-->

	<form method='post' action='editarAtendente.php'> 
         <div class="form-group required">
				<div class="container-fluid">

			<h1>
					<span>Editar informações do atendente</span>
			</h1>

			<?php

                echo "<input type='hidden' class='form-control' name='id_usuario' required value='".$_GET['id']."'>";
            ?>
			<div class="form-group row">
				<label class="col-sm-1 col-form-label">Nome: </label>
				<div class="col-sm-11">
					 <?php
                echo "<input type='text' class='form-control' id='nome' name='nome' required value='".$atendente->getNome()."'>";
           			?>
				</div>
			</div>
			<div class="form-group row">
					<label class="col-sm-1 col-form-label">Email: </label>
					<div class="col-sm-11">
						 <?php
            echo "<input type='text' class='form-control' id='email' name='email' required value='".$atendente->getEmail()."'>";
            ?>
					</div>
				</div>
			
			<div class="form-group row">
					<div class="col-sm-1 col-form-label">Telefone :</div>
						<div class="col-sm-11">
							<?php
            echo "<input type='text' class='form-control' id='telefone' name='telefone' required value='".$atendente->getTelefone()."'>";
            ?>
					</div>
				</div>
			<div class="form-group row">
					<div class="col-sm-1 col-form-label">CPF :</div>
					<div class="col-sm-11">
					<?php
            		echo "<input type='text' class='form-control' id='cpf' name='cpf' required value='".$atendente->getCpf()."'>";
            		?>
					</div>
			</div>
			<div class="form-select row">
				<div class="col-sm-1 col-form-label">
            	<label for="ativo_or_n:">Situação: </label>
            	</div>
            	<div class="col-sm-11">
            	<?php
            	if($atendente->getAtivoSistema()=="1"){?>
            		<select class="form-control" id="ativo_or_n"  name="ativoSistema" required="true">
                	<option value="1"> Ativo</option>
                	<option value="0"> Inativo</option>
             		</select>
             	<?php }else{ ?>
             		<select class="form-control" id="ativo_or_n"  name="ativoSistema" required="true">
                	<option value="0"> Inativo</option>
                	<option value="1"> Ativo</option>
                	<?php } ?>
                	</select>
                </div>
             </div>
             <script>
				$(document).ready(function(){
    				$("#cpf").mask("000.000.000-00", {reverse: true});
    				$("#telefone").mask("(00)00000-0000");
				});
        	</script>
        		
            	<input class="btn btn-primary " href="../../../prog_g1/lstAtendente.php" type='submit' name='botaoE' value='Editar'>
            	<a class="btn btn-primary " href="../../../prog_g5/desenv/visao/lstAtendente.php" role="button">Voltar</a> 
            	
         	</div>
   		</div>
     </form>
</body>
</html>