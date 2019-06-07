
<!DOCTYPE html>
<html>

<head>
<title>Recuperar Senha</title>
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
			
			
				<li class="nav-item">
					<a class="nav-link" href="../index.php" id="navbarDropdownMenuLink" >
						A clínica
					</a>
				</li>
				<li class="nav-item ">
					<a class="nav-link" href="../visao/contato.php" id="navbarDropdownMenuLink" >
						Contato
					</a>
				</li>
				<li class="nav-item ">
					<a class="nav-link" href="../logIn.php" id="navbarDropdownMenuLink" >
						Acesso Restrito
					</a>
				</li>
			 
			 </ul>
			
			<ul class="nav navbar-nav">
				<!-- alinhado à direita -->
				<li class="nav-item">
					<a class="nav-link" href="#">
					
					</a>
				</li>
			
				
			</ul>
			
		</div>
	</nav>
<body style="text-align:center">
	
	<form method="post" action="processa.php" class="form-controle my-2 my-lg-0 ml-lg-3">
	<div class="form-controle my-2 my-lg-0 ml-lg-3">
	<br><br>
		<h1>Recuperar Senha: </h1><br>
		Email: <span style="color:red;">*</span><input class="form-controle my-2 my-lg-0 ml-lg-3" type="text" name="email" value=""> <br><br>
		<input  class="btn btn-primary my-2 my-sm-0" type="submit" name="envia nova senha" value="Enviar Email">
		<a class="btn btn-primary" href="../logIn.php" role="button">Voltar</a>
	</div>	
	</from>
	
</body>


</html>