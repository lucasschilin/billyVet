<?php
include_once $_SERVER['DOCUMENT_ROOT']."/prog_g6/desenv/db/MySQL.class.php";

//include_once $_SERVER['DOCUMENT_ROOT']."/agenda/modelo/Usuario.class.php"; // precisa importar pra quando chamar session_start o objeto vir serializado corretamente
//@session_start();
class Veterinario{
private $idUsuario;
private $idTipo;
private $nome;
private $senha;
private $email;
private $telefone;
private $cpf;
private $ativoSistema;
private $crmv;
private $nivelFormacao;
private $dtNasc;

public function __construct($idUsuario = null, $idTipo = null, $nome = null, $senha = null, $email = null, $telefone = null, $cpf = null, $ativoSistema = null, $crmv = null, $nivelFormacao = null, $dtNasc = null){
$this->idUsuario = $idUsuario;
$this->idTipo = $idTipo;
$this->nome = $nome;
$this->senha = $senha;
$this->email = $email;
$this->telefone = $telefone;
$this->cpf = $cpf;
$this->ativoSistema = $ativoSistema;
$this->crmv = $crmv;
$this->nivelFormacao = $nivelFormacao;
$this->dtNasc = $dtNasc;
}

public function getIdUsuario(){
return $this->idUsuario;
}

public function setIdUsuario($idUsuario){
$this->idUsuario = $idUsuario;
}

public function getIdTipo(){
return $this->idTipo;
}

public function setIdTipo($idTipo){
$this->idTipo = $idTipo;
}

public function getNome(){
return $this->nome;
}

public function setNome($nome){
$this->nome = $nome;
}
public function getSenha(){
return $this->senha;
}

public function setSenha($senha){
$this->senha = $senha;
}
public function getEmail(){
return $this->email;
}

public function setEmail($email){
$this->email = $email;
}
public function getTelefone(){
return $this->telefone;
}

public function setTelefone($telefone){
$this->telefone = $telefone;
}
public function getCpf(){
return $this->cpf;
}

public function setCpf($cpf){
$this->cpf = $cpf;
}

public function getAtivoSistema(){
return $this->ativoSistema;
}

public function setAtivoSistema($ativoSistema){
$this->ativoSistema = $ativoSistema;
}
public function getCrmv(){
return $this->crmv;
}

public function setCrmv($crmv){
$this->crmv = $crmv;
}
public function getNivelFormacao(){
return $this->nivelFormacao;
}

public function setNivelFormacao($nivelFormacao){
$this->nivelFormacao = $nivelFormacao;
}
public function getDtNasc(){
return $this->dtNasc;
}

public function setDtNasc($dtNasc){
$this->dtNasc = $dtNasc;
}

/*public function inserir(){
$con = new MySQL();
$idUsuario = $_SESSION['usuario']->getId();
$sql = "INSERT INTO contato (nome,numero,idUsuario) VALUES ('$this->nome','$this->numero', '$idUsuario')";
$con->executa($sql);
}*/

public function listarTodos(){
$con = new MySQL();
$sql = "SELECT * FROM veterinario,usuario WHERE veterinario.id_usuario = usuario.id_usuario";
$resultados = $con->consulta($sql);
if(!empty($resultados)){
$veterinarios = array();
foreach($resultados as $resultado){
$veterinario = new Veterinario();
$veterinario->setIdUsuario($resultado['id_usuario']);
$veterinario->setIdTipo($resultado['id_tipo']);
$veterinario->setNome($resultado['nome']);
$veterinario->setSenha($resultado['senha']);
$veterinario->setEmail($resultado['email']);
$veterinario->setTelefone($resultado['telefone']);
$veterinario->setCpf($resultado['cpf']);
$veterinario->setAtivoSistema($resultado['ativoSistema']);
$veterinario->setCrmv($resultado['crmv']);
$veterinario->setNivelFormacao($resultado['nivel_formacao']);
$veterinario->setDtNasc($resultado['dt_nasc']);
$veterinarios[] = $veterinario;
}
return $veterinarios;
}else{
return false;
}
}

public function listarUm(){
$con = new MySQL();
//$id_usuario = $_SESSION['usuario']->getIdUsuario();
$sql = "SELECT * FROM veterinario, internacao WHERE veterinario.id_usuario = 1";
$resultado = $con->consulta($sql);
if(!empty($resultado)){
$this->nome = $resultado[0]['nome'];
$this->email = $resultado[0]['email'];
$this->telefone = $resultado[0]['telefone'];
$this->cpf = $resultado[0]['CPF'];
$this->ativoSistema = $resultado[0]['ativoSistema'];
$this->crmv = $resultado[0]['crmv'];
$this->nivel_formacao = $resultado[0]['nivel_formacao'];
$this->dt_nasc = $resultado[0]['dt_nasc'];
}else{
return false;
}
}
/*
public function excluir(){
$con = new MySQL();
$idUsuario = $_SESSION['usuario']->getId();
$sql = "DELETE FROM contato WHERE id = $this->id AND idUsuario = $idUsuario";
$con->executa($sql);
}

public function alterar(){
$con = new MySQL();
$idUsuario = $_SESSION['usuario']->getId();
$sql = "UPDATE contato SET nome = '$this->nome', numero = '$this->numero' WHERE id = $this->id AND idUsuario = $idUsuario";
$con->executa($sql);
}
*/

}
?>