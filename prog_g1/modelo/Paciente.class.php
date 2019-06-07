<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

include_once $_SERVER['DOCUMENT_ROOT']."/prog_g1/desenv/db/MySQL.class.php";

Class Paciente {
	
	private $id_paciente;
	private $id_cidade; //
	private $nomeP; //
	private $dt_nasc; //
	private $raca; //
	private $plano_s; //
	private $cep; //
	private $bairro;//
	private $logadouro; //
	private $numero; //
	private $complemento; //
	private $nomeTutor; //
	private $email; //
	private $telefone; //
	private $cpf; //
	private $ativo;
	
	public function __construct($id_paciente = null, $id_cidade = null, $nomeP = null, $dt_nasc = null, $raca = null, $plano_s = null, $cep = null, $bairro = null, $logadouro = null, $nomero = null, $complemento = null){
		
		$this->id_paciente = $id_paciente;
		$this->id_cidade = $id_cidade;
		$this->nomeP = $nomeP;
		$this->dt_nasc = $dt_nasc;
		$this->raca = $raca;
		$this->plano_s = $plano_s;
		$this->cep = $cep;
		$this->bairro = $bairro;
		$this->logadouro = $logadouro;
		$this->nomero = $nomero;
		$this->complemento = $complemento;
		
	}
	
	public function getId_paciente(){
		return $this->id_paciente;
	}
	
	public function setId_paciente($id_paciente){
		$this->id_paciente = $id_paciente;
	}
	
	public function getId_cidade(){
		return $this->id_cidade;
	}
	
	public function getNome_cidade(){
		$con = new MySQL();
		$sql = "SELECT nome FROM cidade WHERE id_cidade = '".$this->id_cidade."'";
		$resultado = $con->consulta($sql);
		return $resultado[0]['nome'];
	}
	
	public function setId_cidade($id_cidade){
		$this->id_cidade = $id_cidadee;
	}
	
	public function getNomeP(){
		return $this->nomeP;
	}
	
	public function setNomeP($nomeP){
		$this->nomeP = $nomeP;
	}
	
	public function getDt_nasc(){
		return $this->dt_nasc;
	}
	
	public function setDt_nasc($dt_nasc){
		$this->dt_nasc = $dt_nasc;
	}
	
	public function getRaca(){
		return $this->raca;
	}
	
	public function setRaca($raca){
		$this->raca = $raca;
	}
	
	public function getPlano_s(){
		return $this->plano_s;
	}
	
	public function setPlano_s($plano_s){
		$this->plano_s = $plano_s;
	}
	
	public function getCep(){
		return $this->cep;
	}
	
	public function setCep($cep){
		$this->cep = $cep;
	}
	
	public function getBairro(){
		return $this->bairro;
	}
	
	public function setBairro($bairro){
		$this->bairro = $bairro;
	}
	
	public function getLogadouro(){
		return $this->logadouro;
	}
	
	public function setLogadouro($logadouro){
		$this->logadouro = $logadouro;
	}
	
	public function getNumero(){
		return $this->numero;
	}
	
	public function setNumero($numero){
		$this->numero = $numero;
	}
	
	public function getComplemento(){
		return $this->complemento;
	}
	
	public function setComplemento($complemento){
		$this->complemento = $complemento;
	}
	
	public function getNomeTutor(){
		return $this->nomeTutor;
	}
	
	public function setNomeTutor($nome){
		$this->nomeTutor = $nome;
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
	
	public function getAtivo(){
		return $this->ativo;
	}
	
	public function setAtivo($ativo){
		$this->ativo = $ativo;
	}
	
	public function loadInfo($id_paciente){
		
		$con = new MySQL();
		$sql = "SELECT * FROM paciente WHERE id_usuario = '".$id_paciente."'";
		$resultado = $con->consulta($sql);
		
		if(!empty($resultado)){
			$this->id_paciente = $resultado[0]['id_usuario'];
			$this->id_cidade = $resultado[0]['id_cidade'];
			$this->nomeP = $resultado[0]['nomeP'];
			$this->dt_nasc = $resultado[0]['dt_nasc'];
			$this->raca = $resultado[0]['raca'];
			$this->plano_s = $resultado[0]['plano_s'];
			$this->cep = $resultado[0]['cep'];
			$this->bairro = $resultado[0]['bairro'];
			$this->logadouro = $resultado[0]['logradouro'];
			$this->numero = $resultado[0]['numero'];
			$this->complemento = $resultado[0]['complemento'];
		}else{
			return false;
		}
		
		$sql ="SELECT nome, email, telefone, cpf, ativoSistema FROM usuario WHERE id_usuario ='".$this->id_paciente."'";
		$resultado = $con->consulta($sql);
		
		if(!empty($resultado)){
			$this->nomeTutor = $resultado[0]['nome'];
			$this->email = $resultado[0]['email'];
			$this->telefone = $resultado[0]['telefone'];
			$this->cpf = $resultado[0]['cpf'];
			$this->ativo = $resultado[0]['ativoSistema'];
		}else{
			return false;
		}
		
	}
	
}

?>