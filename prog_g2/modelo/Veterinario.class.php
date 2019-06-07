<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once $_SERVER['DOCUMENT_ROOT']."/prog_g2/desenv/db/MySQL.class.php";

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

		function geraSenha($tamanho = 4, $maiusculas = false, $numeros = true, $simbolos = false){
			$lmin = 'abcdefghijklmnopqrstuvwxyz';
			$lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$num = '1234567890';
			$simb = '!@#$%*-';
			$retorno = '';
			$caracteres = '';
			$caracteres .= $lmin;
			
			if ($maiusculas) $caracteres .= $lmai;
			if ($numeros) $caracteres .= $num;
			if ($simbolos) $caracteres .= $simb;
			$len = strlen($caracteres);
			for ($n = 1; $n <= $tamanho; $n++) {
			$rand = mt_rand(1, $len);
			$retorno .= $caracteres[$rand-1];
			}
			return $retorno;
		}



		public function inserir(){
			$veterinario = new Veterinario();
			$senhaa = $veterinario->geraSenha(4);

			echo '<script language="javascript">';
			echo 'alert("Informar senha ao Usuário: '.$senhaa.'")';
			echo '</script>';
			
			$con = new MySQL();
			$sql = "INSERT INTO usuario (id_tipo, nome, senha, email, telefone, cpf, ativoSistema) values (4,'$this->nome','$senhaa','$this->email','$this->telefone','$this->cpf','$this->ativoSistema')";
			$con->executa($sql);
			$sql2 = "SELECT max(id_usuario) as id from usuario"; 
			$max_id = $con->consulta($sql2);
			$sql = "INSERT INTO veterinario (id_usuario, crmv, dt_nasc, nivel_formacao) values (".$max_id[0
			]['id'].",'$this->crmv','$this->dtNasc','$this->nivelFormacao')";
			$con->executa($sql);
			}

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

		public function listarFiltrar($filtro){
			$con = new MySQL();
			$sql = "SELECT * FROM veterinario, usuario WHERE veterinario.id_usuario = usuario.id_usuario AND nome LIKE 
			(%".$filtro."%) ORDER BY nome, status";
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
			$sql = "SELECT * FROM veterinario,usuario WHERE veterinario.id_usuario = $this->idUsuario AND veterinario.id_usuario = usuario.id_usuario";
			$resultado = $con->consulta($sql);
			if(!empty($resultado)){
					$this->nome = $resultado[0]['nome'];
					$this->email = $resultado[0]['email'];
					$this->telefone = $resultado[0]['telefone'];
					$this->cpf = $resultado[0]['cpf'];
					$this->ativoSistema = $resultado[0]['ativoSistema'];
					$this->crmv = $resultado[0]['crmv'];
					$this->nivelFormacao = $resultado[0]['nivel_formacao'];
					$this->dtNasc = $resultado[0]['dt_nasc'];
			}else{
				return false;
			}
		}
		public function alterar(){
			$vet = new MySQL();
			$sql = "UPDATE usuario,veterinario SET usuario.nome = '$this->nome', usuario.telefone = '$this->telefone', usuario.cpf = '$this->cpf', usuario.ativoSistema = '$this->ativoSistema', veterinario.crmv = '$this->crmv', veterinario.dt_nasc = '$this->dtNasc', veterinario.nivel_formacao = '$this->nivelFormacao'   WHERE usuario.id_usuario = $this->idUsuario and veterinario.id_usuario = $this->idUsuario";
			$vet->executa($sql);
		}

	}

	//UPDATE veterinario,usuario SET usuario.nome = 'Scheila', telefone = '519', cpf = '192.168.103.223', tipo = '1', crmv = '3643', dt_nasc = '2018-10-02', nivel_formacao = 'sdjkhjbyujgjygvgjb', WHERE id_usuario = 3 
?>
