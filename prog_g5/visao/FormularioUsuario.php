<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors',1);
include_once $_SERVER['DOCUMENT_ROOT']."/prog_g5/desenv/controle/ControleAtendente.class.php";


if(isset($_POST['botao']) && $_POST['botao']=="Cadastrar"){
	include_once $_SERVER['DOCUMENT_ROOT']."/prog_g5/desenv/controle/ControleAtendente.class.php";
	$cControle = new ControleAtendente();
    $validacao = $cControle->listarTodos();
    $validoEmail=true;
    $validoCpf=true;
    foreach($validacao as $validacaoo){
	    if($validacaoo->getEmail()==($_POST['email'])){
	    	$validoEmail=false;
	    	break;
	    }
	    if($validacaoo->getCpf()==($_POST['cpf'])){
	    	$validoCpf=false;
	    	break;
	    }

}
	if($validoEmail and $validoCpf){
      $cControle->inserir($_POST);
	}else{
    $dados_temp = $cControle->temporario($_POST);
		if($validoEmail==false){
      echo '<script language="javascript">';
      echo 'alert("E-mail inválido")';
      echo '</script>';
    }
   if($validoCpf==false){
      echo '<script language="javascript">';
      echo 'alert("cpf inválido")';
      echo '</script>';
    }
	}
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
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

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
						Interna��es
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
		<!-- CÓDIGO ANTIGO- ALTERANDO PARA FORMULÁRIO PADRÃO
		<div class="container-fluid">

		<h1> 
			<span class="align-middle">
			<span>  Cadastro de atendente  </span>
			
		</h1>
		

	<form action="FormularioUsuario.php" method="post" ID="form-cadastro">
    <div class='container-fluid'>
    <div class="form-group required">
    	<div class="row aling-items-start">
      <label for="inputNome" class='control-label '>Nome</label>:
      <input type="text" class="form-control col-11" id="nome"   style="margin-left: 22px" name='nome'   required>
  </div>
    </div>
     <div class="form-group required ">
     	<div class="row aling-items-start">
       <label for="exampleFormControlInput1" class='control-label'>Email</label>:
       <input type="email" class="form-control col-11" id="campo-email" name='email' style="margin-left: 22px"  placeholder="BillyVet@example.com" required>
      </div>
  </div>
      <div class="form-group required ">
      	<div class="row aling-items-start">
         <label for="inputPassword4" class='control-label'>Senha</label>:
         <input type="password" class="form-control col-11" id="inputPassword4"  style="margin-left: 18px" placeholder="senha" name='senha'  required maxlength="20">
      </div>
  </div>
    <div class="form-group required ">
    	<div class="row aling-items-start">
      <label for="inputTel" class='control-label '>Telefone</label>:
      <input type="text" class="form-control col-11 cel-mask" id="telefone"  style="margin-left: 4px" placeholder="(DDD)00000-0000" name='telefone' required maxlength="15">
    </div>
</div>
    <div class="form-group required ">
      <div class="row aling-items-start">
      <label for="inputZip" class='control-label '>CPF</label> :
      <input type="text" class="form-control col-11 cel-mask" id="cpf"  style="margin-left: 35px" placeholder="000.000.000-00" name='cpf' required maxlength="14">
    </div>
</div>
    
    <div class="form-check form-check-inline">
       <label for="inputZip" class='control-label'>Situação: </label> 
       <div class="row aling-items-start">

      <input class="form-check-input " type="radio" id="inlineCheckbox1" style="margin-left: 35px" value="1" name= "ativoSistema" required>
      <label class="form-check-label col-11" for="inlineCheckbox1">Ativo</label>

 </div>
 <br>
    <div class="form-check form-check-inline">
    	<div class="row aling-items-start">
    		
      <input class="form-check-input" type="radio" id="inlineCheckbox2" value="0" style="margin-left: 35px" name= "ativoSistema" required>
      <label class="form-check-label col-11" for="inlineCheckbox2">Inativo</label>
     </div>
 </div>
</div>
</div>


CÓDIGO NOVO A PARTIR DAQUI
-->
	
	<div class="container-fluid">

			<h1> 
				<span>  Cadastro de atendente  </span>
			</h1>
		

		<form action="FormularioUsuario.php" method="post" ID="form-cadastro">
    	<div class="form-group row ">
    		
				<label class="col-sm-1 col-form-label">Nome <span style="color: red">*</span>:</label>
				<div class="col-sm-11">
					 <?php
                echo "<input type='text' class='form-control' id='nome' name='nome' required value=''>";
           			?>
				</div>
			</div>
		<div class="form-group row">
					<label class="col-sm-1 col-form-label">Email<span style="color: red">*</span>:</label>
					<div class="col-sm-11">
						 <?php
            echo "<input type='text' class='form-control' id='email' name='email' required value=''>";
            ?>
					</div>
		</div>
		<div class="form-group row">
					<div class="col-sm-1 col-form-label">Telefone<span style="color: red">*</span>:</div>
						<div class="col-sm-11">
							<?php
            echo "<input type='text' class='form-control' id='telefone' name='telefone' required value=''>";
            ?>
					</div>
		</div>
		<div class="form-group row">
					<div class="col-sm-1 col-form-label">CPF<span style="color: red">*</span>:</div>
					<div class="col-sm-11">
					<?php
            echo "<input type='text' class='form-control' id='cpf' name='cpf' required value=''>";
            ?>
					</div>
		</div>
		<div class="form-select row">
				<div class="col-sm-1 col-form-label">
            <label for="ativo_or_n:">Situação<span style="color: red">*</span>:</label>
            	</div>
        <div class="col-sm-11">
            <select class="form-control is-invalidd" id="ativo_or_n"  name="ativoSistema" required="true">
            	<option></option>
                <option value="1"> Ativo</option>
                <option value="0"> Inativo</option>
             </select>
             
        </div>

        <div class="col-sm-11"><span style="color: red">*</span>Campo obrigatório</div>
	</div>

	<script>
		$(document).ready(function(){
			$("#cpf").mask("000.000.000-00", {reverse: true});
			$("#telefone").mask("(00)00000-0000");
		});
	</script>

  <br>
  <input type="submit" class="btn btn-primary my-2 my-sm-0" name='botao' value='Cadastrar' id="botao-submit">
  <a class="btn btn-primary" href="../../../prog_g5/desenv/visao/lstAtendente.php" role="button">Voltar</a> 
</form>

</div>
</body>
	</html>