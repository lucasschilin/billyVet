<?php 
	error_reporting(E_ALL);
	ini_set('display_errors', 1)
	
 ?>
<?php
	include_once $_SERVER['DOCUMENT_ROOT']."/prog_g1/desenv/db/MySQL.class.php";
	class Consulta{
		private $id_consulta;
		private $id_veterinario;
		private $laudo;
		private $observacao;
		private $status_consulta;
		private $horarioConsulta;
		private $id_usuario;
		private $nome_veterinario;
		private $nome_paciente;

		public function __construct($id_veterinario=null, $laudo = null, $observacao=null, $status_consulta=null,$horarioConsulta=null,$id_usuario=null,$nome_veterinario=null, $nome_paciente=null){
			$this->id_veterinario = $id_veterinario;
			$this->laudo = $laudo;
			$this->observacao=$observacao;
			$this->status_consulta=$status_consulta;
			$this->horarioConsulta=$horarioConsulta;
			$this->id_usuario=$id_usuario;
			$this->nome_veterinario = $nome_veterinario;
			$this->nome_paciente =  $nome_paciente;
		}

		public function setNome_paciente($nome_paciente ){
			$this->nome_paciente = $nome_paciente ;
		}
		public function getNome_paciente(){
			return $this->nome_paciente ;
		}
		public function setNome_veterinario($nome_veterinario ){
			$this->nome_veterinario = $nome_veterinario ;
		}
		public function getNome_veterinario(){
			return $this->nome_veterinario;
		}

		public function getId_consulta(){
			return $this->id_consulta;
		}

		public function setId_consulta($id_consulta){
			$this->id_consulta = $id_consulta;
		}

		public function getId_veterinario(){
			return $this->id_veterinario;
		}

		public function setId_veterinario($id_veterinario){
			$this->id_veterinario = $id_veterinario;
		}

		public function getLaudo(){
			return $this->laudo;
		}

		public function setLaudo($laudo){
			$this->laudo = $laudo;
		}

		public function getObservacao(){
			return $this->observacao;
		}

		public function setObservacao($observacao){
			$this->observacao = $observacao;
		}
		public function getStatus_consulta(){
			return $this->status_consulta;
		}

		public function setStatus_consulta($status_consulta){
			$this->status_consulta = $status_consulta;
		}
		
		public function getHorarioConsulta(){
			return $this->horarioConsulta;
		}

		public function setHorarioConsulta($horarioConsulta){
			$this->horarioConsulta = $horarioConsulta;
		}
		public function getId_usuario(){
		
			return $this->id_usuario;
		}

		public function setId_usuario($id_usuario){
			$this->id_usuario =$id_usuario;
		}

	

		public function listarTodosPorUsuario(){	
			$con = new MySQL();
			$sql = "SELECT * FROM consulta WHERE status_consulta != 1 and id_usuario =". $_SESSION['usuario'];
			
			$resultados = $con->consulta($sql);
			if(!empty($resultados)){
				$consultas = array();
				foreach($resultados as $resultado){
					$consulta = new Consulta();
					$consulta->setId_consulta($resultado['id_consulta']);
					$consulta->setid_veterinario($resultado['id_consulta']);
					$consulta->setLaudo($resultado['laudo']);
					$consulta->setObservacao($resultado['observacao']);
					$consulta->setHorarioConsulta($resultado['horarioConsulta']);
					$consulta->setId_usuario($resultado['id_usuario']);
					$consultas[] = $consulta;
				}
				return $consultas;
			}else{
				return false;
			}	
		}
	
	}
?>