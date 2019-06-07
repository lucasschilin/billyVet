<?php
include_once $_SERVER['DOCUMENT_ROOT']."/agenda/controle/ControleUsuario.class.php";
ControleUsuario::permissao();

include_once $_SERVER['DOCUMENT_ROOT']."/agenda/controle/ControleContato.class.php";
$cContato = new ControleContato();


if(isset($_POST['botao']) && $_POST['botao']=="Editar"){
	$cContato->alterar($_POST);
}else if(isset($_GET['id'])){
		$contato = $cContato->listarUm($_GET['id']);
}

?>
<html lang='pt-br'>
<head>
<meta charset='utf-8'>
<title>Agenda de Contatos</title>
</head>
<body>
<form method='post' action='editContato.php'>
<?php
	echo "Nome: <input type='text' name='nome' value=".$contato->getNome().">";
	echo "<br>";
	echo "Numero: <input type='tel' name='numero' value=".$contato->getNumero().">";
	echo "<br>";
	echo "<input type='hidden' name='id' value=".$contato->getId().">";
?>
	<input type='submit' name='botao' value='Editar'>
</form>
<a href='../index.php'>Voltar</a>
</body>
</html>
