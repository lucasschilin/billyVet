<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL); 
session_start();
include_once $_SERVER['DOCUMENT_ROOT']."/prog_g3/desenv/db/MySQL.class.php";
//Busca cidades já cadastradas no BD
$pac = new MySQL();
$sql = "SELECT id_cidade, nome FROM cidade";
$cidades = $pac->consulta($sql);

if($_SESSION['logado'] != 1){
	header("Location: ../../../prog_g1/desenv/index.php");
}

$dados_temp=null;
if(isset($_POST['botao']) && $_POST['botao']=="Cadastrar"){
	include_once $_SERVER['DOCUMENT_ROOT']."/prog_g3/desenv/controle/ControleUsuario.class.php";
	$cControle = new ControleUsuario();
    $validacao = $cControle->listarTodos();
    $validoEmail=true;

    foreach($validacao as $validacaoo){
	    if($validacaoo->getEmail()==($_POST['email'])){
	    	$validoEmail=false;
	    	break;
	    }
	}

	if($validoEmail){
    	include_once $_SERVER['DOCUMENT_ROOT']."/prog_g3/desenv/controle/ControleUsuario.class.php";
		$cControle = new ControleUsuario();
		$cControle->inserir($_POST);
		include_once $_SERVER['DOCUMENT_ROOT']."/prog_g3/desenv/controle/ControlePaciente.class.php";
		$ccControle = new ControlePaciente();
		$ccControle->inserir($_POST);
	}else{
		include_once $_SERVER['DOCUMENT_ROOT']."/prog_g3/desenv/controle/ControleUsuario.class.php";
		$cControle = new ControleUsuario();
   		$dados_temp = $cControle->temporario($_POST);
		if($validoEmail== false){
	      echo '<script language="javascript">';
	      echo 'alert("E-mail inválido")';
	      echo '</script>';
	    }
	}
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

<html>
	<head>
		<title>Cadastro de Paciente</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
		<link rel="stylesheet" href="/prog_g3/desenv/css/estilo.css" crossorigin="anonymous">
		<link rel="shortcut icon" href="https://commons.wikivet.net/images/4/49/Dog-logo.png">
	</head>
	<body>
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
					<?php } 
					 
					if($_SESSION['tipo'] == 2){  ?>
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
					<?php } 

					 if($_SESSION['tipo'] == 3){  ?>
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
			
					<?php }

					if($_SESSION['tipo'] == 4){  ?>
						<li class="nav-item dropdown active">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Consultas
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<a class="dropdown-item" href="../../../prog_g7/desenv/visao/lstConsultas.php">Listar</a>
							</div>
						</li>
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
			<form method='post' action='cadPaciente.php' >
			    <h1> Cadastro de paciente </h1>
			    <div class="form-row form-group required">
		    		<div class="col-2">
			        	<label class= "control-label" style="margin-left: 10px; margin-top: 12px;"> Nome do Paciente:</label>
			    	</div>
			    	<div class="col" style="width: 100%">
			      		<?php 
			      			echo "<input type='text' class='form-control' id='nomepaciente' placeholder='Nome do Paciente' name='nomepaciente' required value='".$dados_temp[0]."'>";
			      		?>
			      	</div>
			    </div>

			    <div class="form-row form-group required">
		    		<div class="col-2">
			        	<label class= "control-label" style="margin-left: 10px; margin-top: 12px;"> Data de Nascimento:  </label>
			        </div>
			       <div class="col" style="width: 100%">
				       	<?php
				       		echo "<input type='date'  max='".date("Y-m-d")."' class='form-control' id='dt' name='dt' required value='".$dados_temp[1]."'>";
				       	?>
			       	</div>
			    </div>
			    <div class="form-row form-group required">
		    		<div class="col-2">
			        	<label class= "control-label" style="margin-left: 10px; margin-top: 12px;"> Raça: </label>
			      	</div>
			        <div class="col" style="width: 100%">
			       		<?php
			       			echo "<input type='text' class='form-control' id='raca' name='raca' placeholder='Raça' required value='".$dados_temp[2]."'>";
			       		?>
			       	</div>
			    </div>
				<div class="form-row form-group required">
		    		<div class="col-2">
			        	<label class= "control-label" style="margin-left: 10px; margin-top: 12px;"> Plano de Saúde: </label>
			    	</div>
			    	<div class="col" style="width: 100%">
			      		<?php
			       			if ($dados_temp[3] == 'Não'){
			       				echo "<input type='radio' id='planoSim' name='plano' value='Sim'> Sim </input>";
								echo "<input type='radio' id='planoNao' name='plano' value='Não' checked> Não </input>";
			       			}else{
			       				echo "<input type='radio' id='planoSim' name='plano' value='Sim' checked> Sim </input>";
								echo "<input type='radio' id='planoNao' name='plano' value='Não' > Não </input>";
			       		}?>
			       	</div>
			    </div>
			    <div class="form-row form-group required" id='possuiPlano'>
			    		<div class="col-2">
			    			<label class= 'control-label' style="margin-left: 10px; margin-top: 12px;"> Nome do plano de saúde: </label>
			    		</div>
			    		<div class="col" style="width: 100%">
			    			<?php 
			    				echo "<input placeholder='Plano de saúde' type='text' id='nomePlano' name='nomePlano' placeholder='Nome do plano de saúde' class='form-control mr-sm-2' required=true>";
			    			?>
			    		</div>
		    	</div>
			    <h3 style="margin-top: 15px">Informações do Tutor </h3>
			    <div class="form-row form-group required">
		    		<div class="col-2">
			        	<label class= "control-label" style="margin-left: 10px; margin-top: 12px;"> Nome do Tutor: </label>
			    	</div>
			    	<div class="col" style="width: 100%">
			      		<?php
			       			echo "<input type='text' class='form-control' id='nometutor' name='nometutor' placeholder='Nome do Tutor' required value='".$dados_temp[4]."'>";
			       		?>
			      	</div>
			    </div>
			    <div class="form-row form-group required">
		    		<div class="col-2">
			        	<label class= "control-label" style="margin-left: 10px; margin-top: 12px;"> E-mail: </label>
			    	</div>
			    	<div class="col" style="width: 100%">
			      		<?php
			       			echo "<input type='email' class='form-control' id='email' name='email' placeholder='E-mail' required value='".$dados_temp[5]."'>";
			       		?>
			      	</div>
			    </div>
			    <div class="form-row form-group required">
		    		<div class="col-2">
			        	<label class= "control-label" style="margin-left: 10px; margin-top: 12px;"> Telefone: </label>
			    	</div>
			    	<div class="col" style="width: 100%">
			      		<?php
			       			echo "<input type='text' class='form-control' id='celular' name='celular' placeholder='Telefone' required value='".$dados_temp[6]."'>";
			       		?>
			      	</div>
			    </div>
			    <div class="form-row form-group required">
		    		<div class="col-2">
			        	<label class= "control-label" style="margin-left: 10px; margin-top: 12px;"> CPF: </label>
			    	</div>
			    	<div class="col" style="width: 100%">
			      		<?php
			       			echo "<input type='text' class='form-control' id='cpf' name='cpf' placeholder='CPF' required value='".$dados_temp[7]."'>";
			       		?>
			      	</div>
			    </div>
			    <div class="form-row form-group required">
		    		<div class="col-2">
			        	<label class= "control-label" style="margin-left: 10px; margin-top: 12px;"> CEP: </label>
			    	</div>
			    	<div class="col" style="width: 100%">
			      		<?php
			       			echo "<input type='text' class='form-control' id='cep' name='cep' placeholder='CEP' required value='".$dados_temp[8]."'>";
			       		?>
			      	</div>
			    </div>
			    <div class="form-row form-group required">
		    		<div class="col-2">
			        	<label class= "control-label" style="margin-left: 10px; margin-top: 12px;"> Bairro: </label>
			    	</div>
			    	<div class="col" style="width: 100%">
			      		<?php
			       			echo "<input type='text' class='form-control' id='bairro' name='bairro' placeholder='Bairro' required value='".$dados_temp[9]."'>";
			       		?>
			      	</div>
			    </div>
			    <div class="form-row form-group required">
		    		<div class="col-2">
			        	<label class= "control-label" style="margin-left: 10px; margin-top: 12px;"> Logradouro: </label>
			    	</div>
			    	<div class="col" style="width: 100%">
			      		<?php
			       			echo "<input type='text' class='form-control' id='logradouro' name='logradouro' placeholder='Logradouro' required value='".$dados_temp[10]."'>";
			       		?>
			      	</div>
			    </div>
			    <div class="form-row form-group required">
		    		<div class="col-2">
			        	<label class= "control-label" style="margin-left: 10px; margin-top: 12px;"> Nº Casa: </label>
			    	</div>
			    	<div class="col" style="width: 100%">
			      		<?php
			       			echo "<input type='text' class='form-control' id='ncasa' name='ncasa' placeholder='Nº da Casa' required value='".$dados_temp[11]."'>";
			       		?>
			      	</div>
			    </div>
			    <div class="form-row form-group required">
		    		<div class="col-2">
			        	<label class= "control-label" style="margin-left: 10px; margin-top: 12px;"> Complemento:</label>
			        </div>
			    	<div class="col" style="width: 100%">
			      		<?php
			       			echo "<input type='text' class='form-control' id='complemento' name='complemento' placeholder='Complemento' required value='".$dados_temp[12]."'>";
			       		?>
			      	</div>
			    </div>
			    <div class="form-row form-group required">
		    		<div class="col-2">
			        	<label class= "control-label" style="margin-left: 10px; margin-top: 12px;"> Situação: </label>
			    	</div>
			    	<div class="col" style="width: 100%; margin-top: 12px;">
			      		<?php
			       			if($dados_temp[13] == "0"){
			       				echo "<select name='ativo'class='form-control mr-sm-2'>
			       					  <option class='dropdown-item' value = 0 name = 'inativo'> Não </option>
			       					  <option class='dropdown-item' value = 1 name = 'ativo'  > Sim </option>
			       					  </select>";			       			
			       			}else{
			       				echo "<select name='ativo'class='form-control mr-sm-2'>
			       					  <option class='dropdown-item' value = 1 name = 'ativo'  > Sim </option>
			       					  <option class='dropdown-item' value = 0 name = 'inativo'> Não </option>
			       					  </select>";
							}
			       		?>
			      	</div>
			    </div>
			    <input type='submit' name='botao' value='Cadastrar' class='btn btn-primary my-2 my-sm-0' style="margin-left: 10px;">
		  	</form>
	  	</div>
  	</body> 
  	<script>
  	$(document).ready(function(){
  		//Máscaras
        $('#cpf').mask("000.000.000-00", {reverse: true});
  		$("#cep").mask("00000-000");
  		$("#celular").mask("(00)00000-0000");

  		//Required no plano de saúde
  		$( "#planoNao" ).click(function() {
  			$( "#possuiPlano" ).hide( "slow", function() {
  			});
  			document.getElementById("nomePlano").required = false;
  		});
		$( "#planoSim" ).click(function() {
			$( "#possuiPlano" ).show( "slow", function() {
  			});		
  			//document.getElementById("nomePlano").required = true;			
		});
  	});

  	</script>	 	
</html>