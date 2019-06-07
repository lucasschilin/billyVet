<?php
include_once $_SERVER['DOCUMENT_ROOT']."/prog_g5/desenv/db/MySQL.class.php";

	class Atendente{
		private $id_usuario;
		private $nome;
		private $email;
		private $senha;
		private $telefone;
		private $cpf;
		private $ativoSistema;
		private $id_tipo;

		public function __construct( $id_usuario=null, $nome = null, $email = null, $senha = null, $telefone = null, $cpf = null, $ativoSistema = null,  $id_tipo= 2){
			$this->id_usuario = $id_usuario;
			$this->nome = $nome;
			$this->email = $email;
			$this->senha = $senha;
			$this->telefone = $telefone;
			$this->cpf = $cpf;
			$this->ativoSistema = $ativoSistema;
			$this->id_tipo= 2; //atendente

		}
		public function getId(){
			return $this->id_usuario;
		}
		public function setId($id_usuario){
			$this->id_usuario= $id_usuario;
		}
		
		public function getid_tipo(){
			return $this->id_tipo;
		}

		public function setid_tipo($id_tipo){
			$this->id_tipo= $id_tipo;
		}

		public function getNome(){
			return $this->nome;
		}

		public function setNome($nome){
			$this->nome = $nome;
		}

		public function getEmail(){
			return $this->email;
		}

		public function setEmail($email){
			$this->email = $email;
		}
			public function getSenha(){
			return $this->senha;
		}

		public function setSenha($senha){
			$this->senha = $senha;
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

		public function verificar_email(){
			$con = new Mysql();
			$sql = "SELECT email FROM usuario WHERE id_tipo=2 and email= $this->email";
			$resultados = $con->consulta($sql);
			if(empty($resultados)){
			return true;
				//$email = true;
			}else {
				return false;
			}


		}

		public function inserir(){

			$con = new MySQL();
			
			$sql = "INSERT INTO usuario (nome,email,senha,telefone,cpf,ativoSistema,id_tipo) VALUES ('$this->nome', '$this->email', '$this->senha', '$this->telefone', '$this->cpf', '$this->ativoSistema' , '$this->id_tipo')";
			
			$con->executa($sql);
		}
		public function listarTodos(){
			$con = new MySQL();
			$sql = "SELECT * FROM usuario WHERE id_tipo=2 ";
			$resultados = $con->consulta($sql);
			if(!empty($resultados)){
				foreach($resultados as $resultado){
					$atendente = new Atendente();
					$atendente->setId($resultado['id_usuario']);
					$atendente->setNome($resultado['nome']);
					$atendente->setEmail($resultado['email']);
					$atendente->setSenha($resultado['senha']);
					$atendente->setTelefone($resultado['telefone']);
					$atendente->setCpf($resultado['cpf']);
					$atendente->setAtivoSistema($resultado['ativoSistema']);
					$atendente->setid_tipo($resultado['id_tipo']);
					$atendentes[] = $atendente;
				}
				return $atendentes;
			}else{
				return false;
			}
		}

		public function listarUm(){
			$con = new MySQL();
			$sql = "SELECT * FROM usuario WHERE id_usuario = $this->id_usuario AND id_tipo=2";
			$resultado = $con->consulta($sql);
			if(!empty($resultado)){
					$this->nome = $resultado[0]['nome'];
					$this->senha = $resultado[0]['senha'];
					$this->email = $resultado[0]['email'];
					$this->telefone = $resultado[0]['telefone'];
					$this->cpf = $resultado[0]['cpf'];
					$this->ativoSistema = $resultado[0]['ativoSistema'];
			}else{
				return false;
			}
		}


		public function alterar(){
			$con = new MySQL();
			$sql = "UPDATE usuario SET nome = '$this->nome', email = '$this->email', telefone = '$this->telefone',
			cpf = '$this->cpf', ativoSistema = '$this->ativoSistema' WHERE id_usuario = $this->id_usuario AND id_tipo = $this->id_tipo";
			$con->executa($sql);
		}
		}

	//}
?>
