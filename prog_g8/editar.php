<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

session_start();

if(isset($_POST['botaoE']) && $_POST['botaoE']=="Salvar"){
	include_once $_SERVER['DOCUMENT_ROOT']."/prog_g8/desenv/ControleRegistro.class.php";

	$cControle = new ControleRegistro();
	$cControle->editar($_POST);
}
if(isset($_GET['id_registro'])){
	include_once $_SERVER['DOCUMENT_ROOT']."/prog_g8/desenv/ControleRegistro.class.php";
	$cControle = new ControleRegistro();
	$registro = $cControle->listarUm($_GET['id_registro']);
}

include_once $_SERVER['DOCUMENT_ROOT']."/prog_g8/desenv/Registro.class.php";
$infos = Registro::listaIdentificacao($_GET['id_internacao']);

?>

<html>
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
	
	<head>
		<?php 
			echo "<title>Editar registro de ".$infos['pet']."</title>";
		?>
		<link rel="shortcut icon" href="https://commons.wikivet.net/images/4/49/Dog-logo.png">
		<meta charset="UTF-8">
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
	
<!-- ----------------------------------------------------------------------------------- -->

	<div class="container-fluid">
		<form action="editar.php" method="POST">
			<div class="form-group">
				<h1>Edição de registro</h1>
				
				<?php
				echo "<input type='hidden' name='id_registro' value='".$registro->getId_registro()."'>";
				echo "<input type='hidden' name='id_internacao' value='".$registro->getId_internacao()."'>";
				echo "<input name='id_atendente' type='hidden' value='".$_SESSION['usuario']."''>";
				echo "<input name='id_internacao' type='hidden' value='".$_GET['id']."'>";

  				echo "<h3> Paciente ".$infos['pet']." - Quarto ".$infos['quarto']."</h3>";
  				?>

  				<div>
  					<div class="row">
  						<div style="margin-left: 30px" class="col-2 espacamento">
  							<p>Procedimento:<span style="color: red">*<p>
    					</div>
    					<div class="col-9 espacamento">
							<textarea name="procedimento" style='margin-left:2%' class="form-control noresize" rows="4"><?php echo $registro->getProcedimento(); ?></textarea>
    					</div>
    				</div>

	  				<div class="row">
	  					<div style="margin-left: 30px" class="col-2 espacamento">
    						<p>Medicamento:</p>
    					</div>
    					<div class="col-9 espacamento">
    						<?php
    						echo "<input class='form-control' style='margin-left:2%'' size='145%' type='text' id='idMedicamento' name= 'medicamento' value='".$registro->getMedicamento()."'>";
    						?>
    					</div>
    				</div>

  				 	<div class="row">
  				 		<div style="margin-left: 30px" class="col-2 espacamento">
    						<p>Reações:</p>
    					</div>
    					<div class="col-9 espacamento">
    						<?php
    						echo"<input class='form-control' style='margin-left:2%' size='145%' type='text' id='idReacoes' name= 'reacao' value='".$registro->getReacao()."'>";
    						?>
  						</div>
  					</div>

					<div class="container-fluid">
						<input class="form-control" type="hidden" id="idDTH" name= "dt_registro" value="<?=date('Y-m-d H:i:s')?>">
					</div>

  					<div class="row">
  						<div style="margin-left: 30px" class="col-2 espacamento">
							<p>Data e hora<span style="color: red">*</span>:</p>
						</div>
						<div class="col-9 espacamento">
							<?php
								echo "<input class='form-control' type='datetime-local' style='margin-left:2%'' size='145%' name='dt_procedimento' value='".date('d/m/Y H:i:s', strtotime($registro->getdt_procedimento()))."' >";
								
							?>
							
						</div>
  					</div>

  					<div class="row">
 						<div style="margin-left: 30px" class="col-2 espacamento">
 							<?php							 
							 	echo"<label class='form-check-label' name='visibilidade' for='idVisibilidade'>Visível</label>";
  								if($registro->getVisibilidade()==0){
  									echo"<input type='checkbox' style='margin-left:2%' class='form-check-input' id='idVisibilidade'  name= 'visibilidade'  value=0>";	
								  }
								  else{
  									echo"<input type='checkbox' style='margin-left:2%' class='form-check-input' id='idVisibilidade'  name= 'visibilidade' checked value=1>";	
  								  }
  							?>
    					</div>
  					</div> 	 			
 	 		</div>
			  <?php
			  echo "<input type='hidden' name='id_registro' value=".$registro->getid_registro().">";
			  echo "<input type='hidden' name='id_internacao' value=".$registro->getid_internacao().">";
			  ?>
		
  			<P>Campo obrigatório<span style="color: red">*</span></P>
  			
  			<input type="submit" name= "botaoE" class="btn btn-primary" value="Salvar">
  			<?php 
  				echo "<a href='listaRegistros.php?id=".$_GET['id_internacao']."' class='btn btn-primary' style='color:white'>Voltar</a>";
  			?>
  			
		</form>
	</div>
	
</html>
