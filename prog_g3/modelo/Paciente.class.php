<?php

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL); 

include_once $_SERVER['DOCUMENT_ROOT']."/prog_g3/desenv/db/MySQL.class.php";
include_once $_SERVER['DOCUMENT_ROOT']."/prog_g3/desenv/modelo/Usuario.class.php";

	class Paciente{
		private $id_usuario;
		private $id_cidade;
		private $nomepaciente;
		private $dt;
		private $raca;
		private $plano;
		private $cep;
		private $bairro;
		private $logradouro;
		private $ncasa;
		private $complemento;
		private $busca;

		public function __construct($id_usuario = null, $id_cidade = null, $nomepaciente = null, $dt = null, $raca = null, $plano = null, $cep = null, $bairro = null, $logradouro = null, $ncasa = null, $complemento = null, $busca = null){
			$this->id_usuario = $id_usuario;
			$this->id_cidade = $id_cidade;
			$this->nomepaciente = $nomepaciente;
			$this->dt = $dt;
			$this->raca = $raca;
			$this->plano = $plano;
			$this->cep = $cep;
			$this->bairro = $bairro;
			$this->logradouro = $logradouro;
			$this->ncasa = $ncasa;
			$this->complemento = $complemento;
			$this->busca = $busca;
		}
		
		public function getId_usuario(){
			return $this->id_usuario;
		}
		
		public function setId_usuario($id_usuario){
			$this->id_usuario = $id_usuario;
		}

		public function getId_cidade(){
			return $this->id_cidade;
		}
		
		public function setId_cidade($id_cidade){
			$this->id_cidade = $id_cidade;
		}
		
		public function getNomepaciente(){
			return $this->nomepaciente;
		}
		
		public function setNomepaciente($nomepaciente){
			$this->nomepaciente = $nomepaciente;
		}
		
		public function getDt(){
			return $this->dt;
		}
		
		public function setDt($dt){
			$this->dt = $dt;
		}

		public function getRaca(){
			return $this->raca;
		}
		
		public function setRaca($raca){
			$this->raca = $raca;
		}
		
		public function getPlano(){
			return $this->plano;
		}
		
		public function setPlano($plano){
			$this->plano = $plano;
		}
		
		public function getCEP(){
			return $this->cep;
		}
		
		public function setCEP($cep){
			$this->cep = $cep;
		}
		
		public function getBairro(){
			return $this->bairro;
		}
		
		public function setBairro($bairro){
			$this->bairro = $bairro;
		}
		
		public function getLogradouro(){
			return $this->logradouro;
		}
		
		public function setLogradouro($logradouro){
			$this->logradouro = $logradouro;
		}
		
		public function getNcasa(){
			return $this->ncasa;
		}
		
		public function setNcasa($ncasa){
			$this->ncasa = $ncasa;
		}
		
		public function getComplemento(){
			return $this->complemento;
		}
		
		public function setComplemento($complemento){
			$this->complemento = $complemento;
		}

		public function getBusca(){
			return $this->busca;
		}
		
		public function setBusca($busca){
			$this->busca= $busca;
		}

		public function inserir(){
			
			$pac = new MySQL();
			$sqll = "SELECT max(id_usuario) as id FROM usuario";
			$max_id = $pac->consulta($sqll);
			$aux = explode("-", $this->cep);
			$cep_formatado = $aux[0].$aux[1];
			
			$sql = "INSERT INTO paciente (id_usuario, id_cidade, nomeP, dt_nasc, raca, plano_s, cep, bairro, logradouro, numero, complemento) VALUES (".$max_id[0]['id'].", 2, '$this->nomepaciente','$this->dt','$this->raca','$this->plano','$cep_formatado','$this->bairro','$this->logradouro','$this->ncasa','$this->complemento')";
			
			$pac->executa($sql);
		}
		
		public function listarTodos(){
			$pac = new MySQL();
			$sql = "SELECT id_usuario, nomeP FROM paciente";
			$resultados = $pac->consulta($sql);
			if(!empty($resultados)){
				$pacientes = array();
				foreach($resultados as $resultado){
					$paciente = new Paciente();
					$paciente->setId_usuario($resultado['id_usuario']);
					$paciente->setNomepaciente($resultado['nomeP']);
					$pacientes[] = $paciente;
				}
				return $pacientes;
			}else{
				return false;
			}
		}

		public function listarUm(){
			$pac = new MySQL();
			$sql = "SELECT * FROM paciente WHERE id_usuario = $this->id_usuario";
			$resultado = $pac->consulta($sql);
			if(!empty($resultado)){
					//$this->id_usuario = $resultado[0]['id_usuario'];
					$this->nomepaciente = $resultado[0]['nomeP'];
					$this->dt = $resultado[0]['dt_nasc'];
					$this->raca = $resultado[0]['raca'];
					$this->plano = $resultado[0]['plano_s'];
					$this->cep = $resultado[0]['cep'];
					$this->bairro = $resultado[0]['bairro'];
					$this->logradouro = $resultado[0]['logradouro'];
					$this->ncasa = $resultado[0]['numero'];
					$this->complemento = $resultado[0]['complemento'];
					
			}else{
				return false;
			}
		}

		public function buscarPorNomeP(){
			$pac = new MySQL();
			$sql = "SELECT u.id_usuario, p.nomeP, u.nome, u.email, u.telefone, u.ativoSistema  FROM paciente as p, usuario as u WHERE  p.nomeP LIKE ('%$this->busca%') AND p.id_usuario = u.id_usuario";
			$resultados = $pac->consulta($sql);
			if(!empty($resultados)){
				//$pacientes = array();
				//$usuarios = array();
				$retornos = array ();
				foreach($resultados as $resultado){
					$usuario = new Usuario($resultado['id_usuario'],null,$resultado['nome'],$resultado['email'],$resultado['telefone'],null, $resultado['ativoSistema']);
					$paciente = new Paciente();
					$paciente->setId_usuario($resultado['id_usuario']);
					$paciente->setNomepaciente($resultado['nomeP']);
					$usuario->setId_usuario($resultado['id_usuario']);
					$usuario->setNometutor($resultado['nome']);
					$usuario->setEmail($resultado['email']);
					$usuario->setCelular($resultado['telefone']);
					$usuario->setAtivo($resultado['ativoSistema']);
					$paciente->setBusca($usuario);
					$retornos[] = $paciente;
				}
				return $retornos;
			}else{
				return false;
			}
		}

		public function alterar(){
			$pac = new MySQL();
			$sql = "UPDATE paciente SET nomeP = '$this->nomepaciente', dt_nasc = '$this->dt', raca = '$this->raca', plano_s = '$this->plano', cep = '$this->cep', bairro = '$this->bairro', logradouro = '$this->logradouro', numero = '$this->ncasa', complemento = '$this->complemento' WHERE id_usuario = $this->id_usuario";
			$pac->executa($sql);
		}	
	}

?>