<?php  
session_start();
  if($_SESSION['logado']!=1){
    header("Location: ../../../prog_g1/desenv/index.php");
}
?>

<?php


include_once $_SERVER['DOCUMENT_ROOT']."/prog_g2/desenv/controle/ControleVeterinario.class.php";

if(isset($_POST['busca']) && $_POST['busca']=="Pesquisar"){
  include_once $_SERVER['DOCUMENT_ROOT']."/prog_g2/desenv/controle/ControleVeterinario.class.php";
  $cVeterinario = new ControleVeterinario();
  $veterinario = $cVeterinario->listarFiltrar($_POST['busca']);
}else{
  $cVeterinario = new ControleVeterinario();
  $veterinarios = $cVeterinario->listarTodos();
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
    <title>Veterinários</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://commons.wikivet.net/images/4/49/Dog-logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
  <style>
    div{
    width: 100%;
}
    }
  </style>
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
      <div class="row">
        <div class="col-9"> 
          <h1 style="margin-left: 10px"> Veterinários <a style=" margin-right:5px; padding-top: 15px;" href='/../prog_g2/desenv/visao/cadVeterinario.php'><img width="30" hight="30" src="/prog_img/cadastrar.png"></a>  </h1> 
        </div>
        <!-- <div class='col-1'>
          <h1><a style=" margin-right:5px; padding-top: 15px;" href='/../prog_g2/desenv/visao/cadVeterinario.php'><img width="30" hight="30" src="/prog_g2/desenv/img/noteadd.png"></a> 
          </h1> 
        </div> -->
        <div class="col-3">
          <form class="form-inline my-2 my-lg-0 ml-lg-3">
            <input id = "filtroTabela" class="form-control mr-sm-2" style="margin-top:8px; margin-left:30%;" name="busca" type="search" placeholder="Pesquisar por nome" aria-label="Pesquisar">
          </form>
        </div>
        
      </div>
      <script>
$(document).ready(function(){
  $("#filtroTabela").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#vets .pesquisar").filter(function() {
    	$(this).parent().toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
  $("#filtroTabela").trigger("keyup");
});
</script>
    <table id = "vets" class="table table-hover">
      <thead class="thead-light">
        <tr> 
          <th class="n" scope="col">Nome</th>
          <th scope="col">E-mail</th>
          <th scope="col">Telefone</th>
          <th scope="col">Situação</th>
          <th scope="col">Opções</th>
        </tr>
      </thead>
      <tbody>
      	<?php
        foreach($veterinarios as $veterinario){  
        ?>
        <tr >
          <?php 
            echo "<td class='pesquisar'>";
            echo "<a href='listarUmVet.php?id_usuario=".$veterinario->getIdUsuario()."'>".$veterinario->getNome()."</a>";
            echo "</td>"; 
            echo "<td>".$veterinario->getEmail()."</td>";
            echo "<td>".$veterinario->getTelefone()."</td>";
            echo"<td>";
            if($veterinario->getAtivoSistema()==1){
            	echo"Ativo";
            }else{
            	echo"Inativo";
            }
            echo"</td>";
            echo "<td>";
              echo "  <a href='atualizarVet.php?id_usuario=".$veterinario->getIdUsuario()."'> " ?> <img width="25" hight="25" src="/prog_img/editar.png"> <?php "</a>";
            echo "</td>";
          ?>
        </tr>
        <?php 

    	   } 
       ?>
      </tbody>
    </table>
    <div class="rol-1"> 
        <div class="col-10"> 
            
        </div>
    </div>
    </body>
</html>
