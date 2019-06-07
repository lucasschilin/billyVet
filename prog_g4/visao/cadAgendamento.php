<?php
	error_reporting(E_ALL);
    ini_set('display_errors', 1);
    session_start();
?>
<!DOCTYPE html>
<?php
include $_SERVER['DOCUMENT_ROOT']."/prog_g4/desenv/modelo/Agendamento.class.php";
$veterinarios = Agendamento::listaVeterinario();
// var_dump($veterinarios);


include $_SERVER['DOCUMENT_ROOT']."/prog_g4/desenv/controle/ControleAgendamento.class.php";
$cControle = new ControleAgendamento();
$agendamentos = $cControle->listarTodos();
$usuarios = $cControle->listarUsers();

if(isset($_POST['botao']) && $_POST['botao']=="Adicionar"){  
    include_once $_SERVER['DOCUMENT_ROOT']."/prog_g4/desenv/controle/ControleAgendamento.class.php";
    $cControle = new ControleAgendamento();
	$cControle->cadastrarAgendamento($_POST);
}

?>
<html lang="pt-br" dir="ltr">
    <head>
    <link rel="shortcut icon" href="Https://commons.wikivet.net/images/4/49/Dog-logo.png" type="image/x-icon" />
        <title>Agendamento de Consulta</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script> 
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
    	<div class="row">
            <div class="col-9"> 
                <h1> Cadastro de Agendamento de Consulta </h1>
            </div>
        </div>
        <div class="container-fluid">
    	<form  method='post' action='cadAgendamento.php'>

            <div class="row">
                <div style="margin-left: 10px" class="col-2 espacamento">
                    <div class="custom-control custom-radio">
            	    	<input class="custom-control-input" type="radio" name="gender" id = 'client' value="client">
                        <label for='client' class='custom-control-label'>Cliente</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div style="margin-left: 10px" class="col-2 espacamento">
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" name="gender" id = 'notClient' value="notClient">
                        <label for='notClient' class='custom-control-label'>Não Cliente</label>
                    </div>
                </div>
            </div>
<br>
	  	<div id="selectCliente">	 	
            <div class="row">
                    <div style="margin-left: 10px" class="col-2 espacamento">
                        Cliente<span style="color:red">*</span>:
                    </div>
                    <div class="col-9 espacamento">
                        <select name="usuarios" class="form-control">
                                <?php
                                        foreach($usuarios as $usuario){
                                            echo "<option value={$usuario['id_usuario']}>Pet: ".$usuario['nomeP']."   <b>Tutor: ".$usuario['nome'];
                                        }
                                ?>
                        </select>
                    </div>
            </div>
        </div> 

	  	<div id='dadosCliente'>
    		<div class="row">
                <div style="margin-left: 10px" class="col-2 espacamento">
                    Nome do Pet<span style="color:red">*</span>:
                </div>
                <div class="col-9 espacamento">            
                    <input  type="text" id="nomePet" class="form-control" name='nomepet' placeholder="Digite o nome do Pet..." required>
                </div>
            </div>

		    <div class="row">
                <div style="margin-left: 10px" class="col-2 espacamento">
                    Nome do Tutor<span style="color:red">*</span>:
                </div>
                <div class="col-9 espacamento">            
                    <input type="text" id="nomeTutor" class="form-control" name='nometutor' placeholder="Digite o nome do Tutor..." onkeypress="return Onlychars(event)" required>  
                </div>
            </div>

		    <div class="row">
                <div style="margin-left: 10px" class="col-2 espacamento">
                    E-mail<span style="color:red">*</span>:
                </div>
                <div class="col-9 espacamento">            
                    <input type="email" id="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="nome@exemplo.com" required>
                </div>
            </div>

		    <div class="row">
                <div style="margin-left: 10px" class="col-2 espacamento">
                    Telefone<span style="color:red">*</span>:
                </div>
                <div class="col-9 espacamento">            
                    <input type="text" id="telefone" class="form-control" name='telefone' id='telefone' placeholder="(**)*****-****" required>
                </div>
            </div>
		</div>



		    <div class="row">
                <div style="margin-left: 10px" class="col-2 espacamento">
                    Data<span style="color:red">*</span>:
                </div>
                <div class="col-9 espacamento">            
                    <input type="date" min = <?php echo date("Y-m-d"); ?> class="form-control" name='date' required>
                </div>
            </div>

		    <div class="row">
                <div style="margin-left: 10px" class="col-2 espacamento">
                    Horário<span style="color:red">*</span>:
                </div>
                <div class="col-9 espacamento">            
                    <input type="time" class="form-control" name='hora' required>
                </div>
            </div>



		    <div class="row">
                <div style="margin-left: 10px" class="col-2 espacamento">
                    Veterinário:<br>
                </div>
                <div class="col-9 espacamento">            
                    <select name='veterinario' class="form-control">
                        <?php
                            foreach($veterinarios as $veterinario){
                                echo "<option value= {$veterinario['id_usuario']}>{$veterinario['nome']}";
                            }
                        ?>
                    </select>
                </div>
            </div>






            Campo obrigatório <span style="color:red">*</span><br>
		    <input type="submit" class="btn btn-primary" name='botao' value='Adicionar'>
		    <a class='btn btn-primary' href='../visao/lstAgendamentos.php'>Voltar</a>
        </form>
    </div>
    </body>
    <script>
    	let client = document.getElementById("client");
    	let notClient = document.getElementById("notClient");

    	
    	notClient.addEventListener("click",function(){
    		document.getElementById("dadosCliente").style.display = 'block';
    		document.getElementById("nomePet").required = true;
            document.getElementById("email").required = true;
    		document.getElementById("nomeTutor").required = true;
    		document.getElementById("telefone").required = true;
    		document.getElementById("selectCliente").style.display = 'none';
    	})
    	client.addEventListener("click",function(){
    		document.getElementById("dadosCliente").style.display = 'none';
    		document.getElementById("nomePet").required = false;
            document.getElementById("email").required = false;
    		document.getElementById("nomeTutor").required = false;
    		document.getElementById("telefone").required = false;
    		document.getElementById("selectCliente").style.display = 'block';

    		//select
    	})
   	</script>
