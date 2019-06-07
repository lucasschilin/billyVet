<?php
include_once $_SERVER['DOCUMENT_ROOT']."/prog_g6/desenv/modelo/Veterinario.class.php";

class ControleVeterinario{

public function inserir($dados){
$veterinario = new Veterinario(null,null,$dados['nome'],null,$dados['email'],$dados['telefone'],$dados['cpf'],$dados['tipo'],$dados['crmv'],$dados['nivel_form'],$dados['dt_nasc']);
$veterinario->inserir();
}
public function listarTodos(){
$veterinario = new Veterinario();
$veterinarios = $veterinario->listarTodos();
return $veterinarios;
}

public function listarUm($id_usuario){
$veterinario = new Veterinario($id_usuario,null,null);
$veterinario->listarUm();
return $veterinario;
}
/*
public function excluir($id){
$contato = new Contato($id,null,null);
$contato->excluir();
}

public function alterar($dados){
$contato = new Contato($dados['id'],$dados['nome'],$dados['numero']);
$contato->alterar();
header("location: lstContato.php");
}

*/
}

?>