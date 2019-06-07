<?php  
session_start();
  if($_SESSION['logado']!=1){
    header("Location: ../../../prog_g1/desenv/index.php");
}
?>


<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

//if(!isset($_SESSION['logado'])){
// header("LOCATION: ../index.php");
//}

include_once $_SERVER['DOCUMENT_ROOT']."/prog_g2/desenv/controle/ControleVeterinario.class.php";
$cVeterinario = new ControleVeterinario();


if(isset($_POST['botao']) && $_POST['botao']=="Editar"){
    $cVeterinario = new ControleVeterinario();
    $cVeterinario->alterar($_POST);
}else if(isset($_GET['id_usuario'])){
        $veterinario = $cVeterinario->listarUm($_GET['id_usuario']);
}
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
    <title>Atualizar informações do Veterinário</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://commons.wikivet.net/images/4/49/Dog-logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
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
  <div class="container-fluid">

    </div>
    <body>
        <h1 style="margin-left: 10px">Atualizar informações do Veterinário</h1>
    <div style="margin: 20px">
        <form action="atualizarVet.php" method="post"> 
          <div class="form-group required">

            <?php
                echo "<input type='hidden' class='form-control' name='id_usuario' required value='".$_GET['id_usuario']."'>";
            ?>
            <div class="row">
            	<div class="col-2">
	            	<label for="nome_">Nome <text style="color:red;">*</text> : </label>
	            </div>
	            <div class="col-9">
		            <?php
		                echo "<input type='text' class='form-control' id='nome_' name='nome' required value='".$veterinario->getNome()."'>";
		            ?>
	            </div>
	        </div>
          </div>
         <div class="form-group required">
         	<div class="row">
         		<div class="col-2">
	             <label for="telefone_">Telefone <text style="color:red;">*</text> : </label>
	        	</div>
	        	<div class="col-9">
		        <?php
		        	echo "<input type='text' class='form-control' id='telefone_' name='telefone' required value='".$veterinario->getTelefone()."'>";
		        ?>
	        	</div>
	        </div>
          </div>
          <div class="form-group required">
          	<div class="row">
          		<div class="col-2">
           	 		<label for="cpf_">CPF <text style="color:red;">*</text> : </label>
        		</div>
        		<div class="col-9">
            		<?php
            			echo "<input type='text' class='form-control' id='cpf_' name='cpf' required value='".$veterinario->getCpf()."'>";
            		?>
            	</div>
        	</div>
          </div>
          <div class="form-select">
          	<div class="row">
          		<div class="col-2">
	            	<label for="ativo_or_n:">Situação <text style="color:red;">*</text> : </label>
	        	</div>
	        	<div class="col-9">
		            <select class="form-control" id="ativo_or_n"  name="tipo" required="true">
		                <option value="1"> Ativo</option>
		                <option value="0"> Inativo</option>
		             </select>
		        </div>
	        </div>
          </div>
          <br>
          <div class="form-group">
          	<div class="row">
          		<div class="col-2">
		            <label for="crmv_">CRMV <text style="color:red;">*</text> : </label>
		        </div>
		        <div class="col-9">
		            <?php
		            echo "<input type='text' class='form-control' name='crmv' required value='".$veterinario->getCrmv()."'>";
		            ?>
		        </div>
		    </div>
          </div>
          <div class="date">
          	<div class="row">
          		<div class="col-2">
		            <label for="dt_nasc">Data de nascimento <text style="color:red;">*</text> : </label>
		        </div>
		        <div class="col-9">
		            <?php
		            echo "<input type='date'  class='form-control' name='dt_nasc' required value='".$veterinario->getDtNasc()."'>";
		            ?>
		        </div>
		    </div>
          </div>
          <br>
          <div class="form-group">
          	<div class="row">
          		<div class="col-2">
		            <label for="nivel_form_">Nível Formação <text style="color:red;">*</text> : </label>
		        </div>
		        <div class="col-9">
		            <?php
		            echo "<input type='text' class='form-control' name='nivel_form' required value='".$veterinario->getNivelFormacao()."'>";
		            ?>
		        </div>
		    </div>
         </div>
         <br>
        <script>
            $(document).ready(function(){
                $("#cpf_").mask("000.000.000-00", {reverse: true});
                $("#telefone_").mask("(00)00000-0000");
            });
        </script>

            <!-- <input type='submit' name='botao' value='Editar'> -->

              <div style="margin-left: -1.1%" class="rol-1"> 
                 <div class="col-10"> 
                    <input type='submit' class='btn btn-primary' name='botao' value='Editar'>
                    <?php // echo "<a class='btn btn-primary' name='botao' value='Editar' role='submit'>Editar</a>"; ?>
                    <?php echo "<a class='btn btn-primary' href='listarUmVet.php?id_usuario=".$veterinario->getIdUsuario()."' role='button'>Voltar</a>"; 
                    ?>
                  </div>
              </div>
         <!-- <button type='submit' class='btn btn-primary' nome='botao' value='Adicionar' >Cadastrar Dados</button>-->
        </form>
    </div>
    </body>
</html>
