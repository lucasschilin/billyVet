	<?php  session_start();
	if($_SESSION['logado']!=1){
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

	include $_SERVER['DOCUMENT_ROOT']."/prog_g6/desenv/controle/ControleCadastro.class.php";
	include_once $_SERVER['DOCUMENT_ROOT']."/prog_g6/desenv/modelo/Cadastro.class.php";
	
	$cCadastro = new ControleCadastro();
	
	if(isset($_GET['alta'])){
		$cCadastro->darAlta($_GET['alta']);
	}
	
	
	if(isset($_POST['botao']) && $_POST['botao']=="pesquisar"){

		$texto_digitado = $_POST["pesquisado"];
		$cadastros = $cCadastro->pesquisarPorNome($texto_digitado);
	}else{
		$cadastros = $cCadastro->listarTodos();
	}
	
	
	$quartos=Cadastro::listaQuartos();
?>
<html>
	<head>
		<title>Internação</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
				integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
				integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" 
				integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" 
				integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	

	
	
	</head>
	<?php //echo $_SESSION['usuario']; ?>

	
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
	<br>
	<script>
		$(document).ready(function(){
		  $("#id_pesquisar").on("keyup", function() {
			var value = $(this).val().toLowerCase();
			$("#nav-home tr").filter(function() {
			  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
		  });
		});
	</script>	
		<div class="container-fluid">
			
				<div class="row">
					<div class="col-2">
							<h1>Internações</h1>
							
					</div>
					
					<div class="col-1">
						<a href="visao/cadInter.php" ><img width="30" height="30" src="img/filee.png" style="margin-top:15px; margin-left:15px;"><a>
					</div>
					
					<div class="col-9 ">
					
						<form class="form-inline-block align-right" method="POST" action="internacao.php" Style="margin-top:4px; margin-left:495%">
							<input name="pesquisado" class="form-control  mr-sm-2" type="search" style="width:210px;" 
									placeholder="Pesquisar por internacões" id=id_pesquisar aria-label="Pesquisar">
							<!--<button  class="btn btn-primary my-2 my-sm-0" type="submit" name="botao" value="pesquisar">Pesquisar</button>-->
						</form>
								
					</div>
					
				</div>
		
				<nav>
						<!-- abas - no href coloca-se o id da div que ira abrir quano vc clicar na aba -->
						
						<div class="nav nav-tabs" id="nav-tab" role="tablist">
							<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" 
									aria-controls="nav-home" aria-selected="true" href='internacao.php?status=1'>Todas</a>
							<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" 
									aria-controls="nav-profile" aria-selected="false" href='internacao.php?status=2'>Ativas</a>
		
						</div>	
						
							
							
							
				</nav>
				
				<!-- conteudo das abas - lembrar de coloca o id igual como la em cima. Ex: nav-home -->
				<div class="tab-content" id="nav-tabContent">
					<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
						<table class="table table-hover" id=id_inter>
							  <thead>
								<tr class="thead-light">
									<th scope="col">Quarto</th>
									<th scope="col">Paciente</th>
									<th scope="col">Tutor</th>
									<th scope="col">Veterinário Responsável</th>
									<th scope="col">Data de entrada</th>
									<th scope="col">Data de saída</th>
									<th scope="col">Opções</th>
									
								</tr>
							  </thead>
							  <tbody>
									<?php
										if(!empty($cadastros)){
											foreach($cadastros as $cadastro){  
											$data = explode("-", $cadastro->getDt_entrada());
											$dataS = explode("-", $cadastro->getDt_saida());
									?>
									<tr>
									<?php 
											echo "<td>".$cadastro->getDescricao()."</td>";
											echo "<td>".$cadastro->getNomeP()."</td>";
											echo "<td>".$cadastro->getNomeTutor()."</td>";
											echo "<td>".$cadastro->getNomeVet()."</td>";
											echo "<td>".$data[2]."/".$data[1]."/".$data[0]."</td>";
											if($cadastro->getDt_saida() == null){
												echo "<td><a href='internacao.php?alta=".$cadastro->getId_internacao()."'>Dar alta</a></td>";	
											}else{
												echo "<td>".$dataS[2]."/".$dataS[1]."/".$dataS[0]."</td>";	
											}
											
											if($cadastro->getDt_saida() == null){
												
												echo "<td>
														  <a href='visao/lst1Inter.php?id=".$cadastro->getId_internacao()."'><img width='25' 
																height='25' src='img/visible.png' ></a>
														  <a href='/prog_g8/desenv/listaRegistros.php?id=".$cadastro->getId_internacao().
																"'><img width='25' height='25' src='img/preview3.png'></a>
														  <a href='visao/atualizaInter.php?id=".$cadastro->getId_internacao()."'><img width='25' 
																height='25' src='img/editar.png'></a>
														  <a href='/prog_g8/desenv?id=".$cadastro->getId_internacao()."'><img 
																width='25' height='25' src='img/file.png'></a>
														  
												</td>";	
											}else{
											echo "<td>
													  <a href='visao/lst1Inter.php?id=".$cadastro->getId_internacao()."'><img width='25' 
															height='25' src='img/visible.png' title='Ver um'></a>
													  <a href='/prog_g8/desenv/listaRegistros.php?id=".$cadastro->getId_internacao().
															"'><img width='25' height='25' src='img/preview3.png'></a>
											</td>";	
											}
									?>
									</tr>
									<?php 
											}
										}
									?>
							  </tbody>
							  </table>
							  <?php
							  if(isset($_POST['botao']) && $_POST['botao']=="pesquisar"){
								?>
							  
							
								<a href="internacao.php"  class="btn btn-primary my-2 my-sm-0">Voltar</a>
								
								<?php
							  }
							?>
							 
					</div>
					
					
					<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
						<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
						
						<table class="table table-hover" id=id_inter>
							  <thead>
								<tr class="thead-light">
									<th scope="col">Quarto</th>
									<th scope="col">Paciente</th>
									<th scope="col">Tutor</th>
									<th scope="col">Veterinário Responsável</th>
									<th scope="col">Data de entrada</th>
									<th scope="col">Data de saída</th>
									<th scope="col">Opções</th>
									
								</tr>
							  </thead>
							  <tbody>
									<?php
									if(!empty($cadastros)){
										foreach($cadastros as $cadastro){  
											if($cadastro->getDt_saida() == null){
									?>
									<tr>
									<?php 
											echo "<td>".$cadastro->getDescricao()."</td>";
											echo "<td>".$cadastro->getNomeP()."</td>";
											echo "<td>".$cadastro->getNomeTutor()
											."</td>";
											echo "<td>".$cadastro->getNomeVet()
											."</td>";
											echo "<td>".$cadastro->getDt_entrada()
											."</td>";
											if($cadastro->getDt_saida() == null){
												echo "<td><a href='internacao.php?id=".$cadastro->getId_internacao()."'>Dar alta</a></td>";	
											}else{
											echo "<td>".$dataS[2]."/".$dataS[1]."/".$dataS[0]."</td>";	
											}
											echo "<td>
													  <a href='visao/lst1Inter.php?id=".$cadastro->getId_usuario()."'><img width='25' 
															height='25' src='img/visible.png'></a>
											   		  <a href='visao/atualizaInter.php?id=".$cadastro->getId_internacao()."'><img width='25' 
															height='25' src='img/editar.png'></a>
													  <a href='/prog_g8/desenv?id=".$cadastro->getId_internacao()."'><img width='25' 
															height='25' src='img/file.png'></a>
													  <a href='/prog_g8/desenv/listaRegistros.php?id=".$cadastro->getId_internacao()."'>
															<img width='25' height='25' src='img/preview3.png'></a>
											</td>";	
									?>
									</tr>
									<?php 
											}
											}
										}
									?>
							  </tbody>
							  
							  </table>

						</div>

					</div>
					
				</div>
							
		</div>

	</div>
	
</html>