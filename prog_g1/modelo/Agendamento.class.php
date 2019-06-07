<?php
 
	error_reporting(E_ALL);
	ini_set('display_errors', 1)
	
	
 ?>
<?php
	include_once $_SERVER['DOCUMENT_ROOT']."/prog_g1/desenv/db/MySQL.class.php";
	class Agendamento{
		private $id_agendamento;
		private $nomePet;
		private $dt;
		private $hr;
		private $nomeTutor;
		private $telefone;
		private $email;
		private $status_agendamento;
		private $id_veterinario;
		
		public function __construct($id_agendamento=null, $nomePet = null, $dt=null, $hr=null,$nomeTutor=null,$telefone=null,$email=null, $status_agendamento=null, $id_veterinario = null){
			$this->id_agendamento = $id_agendamento;
			$this->nomePet = $nomePet;
			$this->dt = $dt;
			$this->hr = $hr;
			$this->nomeTutor = $nomeTutor;
			$this->telefone = $telefone;
			$this->email = $email;
			$this->status_agendamento = $status_agendamento;
			$this->id_veterinario = $id_veterinario;
		}

		public function setId_agendamento($id_agendamento ){
			$this->id_agendamento = $id_agendamento ;
		}
		public function getId_agendamento(){
			return $this->id_agendamento;
		}
		
		public function setNomePet($nomePet ){
			$this->nomePet = $nomePet ;
		}
		public function getNomePet(){
			return $this->nomePet;
		}
		
		public function setDt($dt){
			$this->dt = $dt;
		}
		
		public function getDt(){
			return $this->dt;
		}

		public function setHr($hr){
			$this->hr = $hr;
		}
		public function getHr(){
			return $this->hr;
		}
		
		public function setNomeTutor($nomeTutor){
			$this->nomeTutor = $nomeTutor;
		}
		public function getNomeTutor(){
			return $this->nomeTutor;
		}
		
		public function setTelefone($telefone){
			$this->telefone = $telefone;
		}
		public function getTelefone(){
			return $this->telefone;
		}
		
		public function setEmail($email){
			$this->email = $email;
		}
		public function getEmail(){
			return $this->email;
		}
		
		public function setStatus_agendamento($status_agendamento){
			$this->status_agendamento = $status_agendamento;
		}
		public function getStatus_agendamento(){
			return $this->status_agendamento;
		}
		
		public function setId_veterinario($id_veterinario){
			$this->id_veterinario = $id_veterinario;
		}
		public function getId_veterinario(){
			return $this->id_veterinario;
		}
		
		
		public function listarTodosPorUsuario(){	
			session_start();
			$con = new MySQL();
			
			$sql = "SELECT * FROM agendamento, agendamentousuario WHERE agendamento.id_agendamento = agendamentousuario.id_agendamento AND agendamentousuario.id_usuario =".$_SESSION['usuario']." ORDER BY dt, hr asc";
			$resultados = $con->consulta($sql);
			
			if(!empty($resultados)){
				$agendamentos = array();
				foreach($resultados as $resultado){
					$agendamento = new Agendamento();
					$agendamento->setId_agendamento($resultado['id_agendamento']);
					$agendamento->setNomePet($resultado['nomePet']);
					$agendamento->setDt($resultado['dt']);
					$agendamento->setHr($resultado['hr']);
					$agendamento->setNomeTutor($resultado['nomeTutor']);
					$agendamento->setTelefone($resultado['telefone']);
					$agendamento->setEmail($resultado['email']);
					$agendamento->setStatus_agendamento($resultado['status_agendamento']);
					$agendamento->setId_veterinario($resultado['id_veterinario']);
					$agendamentos[] = $agendamento;
				}
				return $agendamentos;
			}else{
				return false;
			}	
		}
	
	}
?>