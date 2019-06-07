<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    session_start();
?>
<!DOCTYPE html>
<?php

include $_SERVER['DOCUMENT_ROOT']."/prog_g4/desenv/modelo/Agendamento.class.php";
$veterinarios = Agendamento::listaVeterinario();
include_once $_SERVER['DOCUMENT_ROOT']."/prog_g4/desenv/controle/ControleAgendamento.class.php";
$cControle = new ControleAgendamento();


if(isset($_GET['idAgendamento'])){
    $agendamento = $cControle->listarUm($_GET['idAgendamento']);
}
// -----------------------------------------------------------------------------------------------------------------
if(isset($_POST['botao']) && $_POST['botao']=="Editar"){
    $cControle->alterar($_POST);
}
else if(isset($_GET['id'])){
        $agendamento = $cControle->listarUm($_GET['id']);
}

?>
<html lang="pt-br" dir="ltr">
    <head>
        <title>BillyVet</title>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="Https://commons.wikivet.net/images/4/49/Dog-logo.png" type="image/x-icon" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/material-icons.css">
        <script>
            $(document).ready(function(){
            $('#telefone').mask('(00)00000-0000');
            });
        </script>
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
                    <a class="nav-link dropdown-toggle" href="#"  id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Usu�rios   </a>
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
    	<form  method='post' action='edicaoAgendamento.php'>
    	<div class="row">
            <div class="col-9"> 
                <h1> Edição do Agendamento de Consulta </h1>
            </div>
        </div>
            <?php
            echo "<div class='row'>";
                echo "<div style='margin-left: 10px' class='col-2 espacamento'>";
                    echo "Nome do Pet:";
                echo "</div>";
                echo "<div class='col-9 espacamento'>";         
                    echo "<input type='text' class='form-control' name='nomepet' value='".$agendamento->getNomePet()."' required>";
                echo "</div>";
            echo "</div>";
            
            echo "<div class='row'>";
	            echo "<div style='margin-left: 10px' class='col-2 espacamento'>";
        	        echo "Nome do Tutor:";
                echo "</div>";
                echo "<div class='col-9 espacamento'>";         
        	        echo "<input type='text' class='form-control' name='nometutor' value='".$agendamento->getNomeTutor()."' required>";
                echo "</div>";
            echo "</div>";

            echo "<div class='row'>";
	            echo "<div style='margin-left: 10px' class='col-2 espacamento'>";
        	        echo "E-mail:";
                echo "</div>";
                echo "<div class='col-9 espacamento'>";         
        	        echo "<input type='email' class='form-control' name='email' value='".$agendamento->getEmail()."' required>";
                echo "</div>";
            echo "</div>";
 
            echo "<div class='row'>";
	            echo "<div style='margin-left: 10px' class='col-2 espacamento'>";
        	        echo "Telefone:";
                echo "</div>";
                echo "<div class='col-9 espacamento'>";         
        	        echo "<input type='text' class='form-control' name='telefone' id='telefone' value='".$agendamento->getTelefone()."' required>";
                echo "</div>";
            echo "</div>";

            echo "<div class='row'>";
                echo "<div style='margin-left: 10px' class='col-2 espacamento'>";
        	        echo "Data:";
                echo "</div>";
                echo "<div class='col-9 espacamento'>";         
        	        echo "<input type='date' min = ".date('Y-m-d')." class='form-control' name='date' value='".$agendamento->getDate()."' required>";
                echo "</div>";
            echo "</div>";

            echo "<div class='row'>";
	            echo "<div style='margin-left: 10px' class='col-2 espacamento'>";
        	        echo "Horário:";
                echo "</div>";
                echo "<div class='col-9 espacamento'>";         
        	        echo "<input type='time' class='form-control' name='hora' value='".$agendamento->getHora()."' required>";
                echo "</div>";
            echo "</div>";

            echo "<input type='hidden' name='id' value=".$agendamento->getIdAgendamento().">";



            echo "<div class='row'>";
	            echo "<div style='margin-left: 10px' class='col-2 espacamento'>";
        	        echo "Veterinário:<br>";
                echo "</div>";
                echo "<div class='col-9 espacamento'>";         
        	        echo "<select name='veterinario' class='form-control'>";                
                        foreach($veterinarios as $veterinario){
                            echo "<option value= {$veterinario['id_usuario']}>{$veterinario['nome']}";
                        }                
                    echo "</select>";
                echo "</div>";
            echo "</div>";



            echo "<div class='row'>";
	            echo "<div style='margin-left: 10px' class='col-2 espacamento'>";
        	        echo "Status:<br>";
                echo "</div>";
                echo "<div class='col-9 espacamento'>";         
        	        echo "<select name='status' class='form-control'>";
                        echo "<option value = '0'>Ativa</option>";
                        echo "<option value = '1'>Não Efetivada</option>";
                        echo "<option value = '2'>Efetivada</option>";
                    echo "</select>";
                echo "</div>";
            echo "</div>";
            ?>
        <a class="mdi mdi-delete-forever"></i>
        <i class="mdi mdi-note-add"></i>
		<input class='btn btn-primary' type='submit' value='Editar' name='botao'>
        <a class='btn btn-primary' href='../visao/lstAgendamentos.php'>Voltar</a>
		</form>
    </body>
    </div>
    </html>
