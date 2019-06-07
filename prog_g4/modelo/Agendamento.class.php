<?php
include $_SERVER['DOCUMENT_ROOT']."/prog_g4/desenv/db/MySQL.class.php";
	class Agendamento{
		private $idAgendamento;
		private $nomePet;
		private $date;
        private $hora;
        private $nomeTutor;
        private $telefone;
		private $email;
		private $veterinario;
        private $status;
        private $nomeVeterinario;
		
        public function __construct($idAgendamento = null, $nomePet = null, $date = null, 
                                    $hora = null, $nomeTutor = null, $telefone = null, 
                                    $email = null, $veterinario = null, $status = 0){ //status = Ativa(0), Não efetivada(1), Efetivada(2)

			$this->idAgendamento = $idAgendamento;
			$this->nomePet = $nomePet;
			$this->date = $date;
            $this->hora  = $hora;
			$this->nomeTutor  = $nomeTutor;
			$this->telefone = $telefone;
			$this->email = $email;
			$this->veterinario = $veterinario;
            $this->status  = $status;
		}
		
		public function getIdAgendamento(){
			return $this->idAgendamento;
		}		
		public function setIdAgendamento($idAgendamento){
			$this->idAgendamento = $idAgendamento;
		}
		
                                                                    public function getNomePet(){
                                                                        return $this->nomePet;
                                                                    }		
                                                                    public function setNomePet($nomePet){
                                                                        $this->nomePet = $nomePet;
                                                                    }
		
		public function getDate(){
			return $this->date;
		}		
		public function setDate($date){
			$this->date = $date;
        }
        
                                                                    public function getHora(){
                                                                        return $this->hora;
                                                                    }		
                                                                    public function setHora($hora){
                                                                        $this->hora = $hora;
                                                                    }

        public function getNomeTutor(){
			return $this->nomeTutor;
		}		
		public function setNomeTutor($nomeTutor){
			$this->nomeTutor = $nomeTutor;
		}
		
																	public function getTelefone(){
																		return $this->telefone;
																	}		
																	public function setTelefone($telefone){
																		$this->telefone = $telefone;
																	}

        public function getEmail(){
        	return $this->email;
        }		
        public function setEmail($email){
        	$this->email = $email;
        }

																	public function getVeterinario(){
																		return $this->veterinario;
																	}		
																	public function setVeterinario($veterinario){
																		$this->veterinario = $veterinario;
																	}

		public function getStatus(){
			return $this->status;
		}		
		public function setStatus($status){
			$this->status = $status;	
		}

		public function getNomeVeterinario(){
			return $this->nomeVeterinario;
		}		
		public function setNomeVeterinario($nomeVeterinario){
			$this->nomeVeterinario = $nomeVeterinario;	
		}
		
		
		

		public function cadastrarAgendamento(){
			$con = new MySQL();
			$sql = "INSERT INTO agendamento (nomePet, dt, hr, nomeTutor,telefone, email, status_agendamento, id_veterinario) 
					VALUES ('$this->nomePet','$this->date','$this->hora', '$this->nomeTutor', 
							'$this->telefone', '$this->email', '$this->status', '$this->veterinario')";
			
			
			$con->executa($sql);
			echo $sql;
			
		}		
		public function listarTodos(){
			$con = new MySQL();
			$sql = "SELECT * FROM agendamento,usuario WHERE agendamento.id_veterinario = usuario.id_usuario ORDER BY dt";
			$resultados = $con->consulta($sql);			
			if(!empty($resultados)){
				$agendamentos = array();
				foreach($resultados as $resultado){
					$agendamento = new Agendamento();
					$agendamento->setIdAgendamento($resultado['id_agendamento']);
					$agendamento->setNomePet($resultado['nomePet']);
					$agendamento->setDate($resultado['dt']);
					$agendamento->setHora($resultado['hr']);
					$agendamento->setNomeTutor($resultado['nomeTutor']);		
					$agendamento->setTelefone($resultado['telefone']);	
					$agendamento->setEmail($resultado['email']);	
					$agendamento->setVeterinario($resultado['id_veterinario']);
					$agendamento->setStatus($resultado['status_agendamento']);
					$agendamento->setNomeVeterinario($resultado['nome']);
					$agendamentos[] = $agendamento;
				}
				return $agendamentos;
			}else{
				return false;
			}
		}

		public function listarHoje(){
			$con = new MySQL();
			$sql = "SELECT * FROM agendamento,usuario WHERE agendamento.id_veterinario = usuario.id_usuario and agendamento.dt = current_date() ORDER BY dt";
			$resultados = $con->consulta($sql);			
			if(!empty($resultados)){
				$agendamentos = array();
				foreach($resultados as $resultado){
					$agendamento = new Agendamento();
					$agendamento->setIdAgendamento($resultado['id_agendamento']);
					$agendamento->setNomePet($resultado['nomePet']);
					$agendamento->setDate($resultado['dt']);
					$agendamento->setHora($resultado['hr']);
					$agendamento->setNomeTutor($resultado['nomeTutor']);		
					$agendamento->setTelefone($resultado['telefone']);	
					$agendamento->setEmail($resultado['email']);	
					$agendamento->setVeterinario($resultado['id_veterinario']);
					$agendamento->setStatus($resultado['status_agendamento']);
					$agendamento->setNomeVeterinario($resultado['nome']);
					$agendamentos[] = $agendamento;
				}
				return $agendamentos;
			}else{
				return false;
			}
		}

		public function listarProximos(){
			$con = new MySQL();
			$sql = "SELECT * FROM agendamento,usuario WHERE agendamento.id_veterinario = usuario.id_usuario and agendamento.dt > current_date() ORDER BY dt";
			$resultados = $con->consulta($sql);			
			if(!empty($resultados)){
				$agendamentos = array();
				foreach($resultados as $resultado){
					$agendamento = new Agendamento();
					$agendamento->setIdAgendamento($resultado['id_agendamento']);
					$agendamento->setNomePet($resultado['nomePet']);
					$agendamento->setDate($resultado['dt']);
					$agendamento->setHora($resultado['hr']);
					$agendamento->setNomeTutor($resultado['nomeTutor']);		
					$agendamento->setTelefone($resultado['telefone']);	
					$agendamento->setEmail($resultado['email']);	
					$agendamento->setVeterinario($resultado['id_veterinario']);
					$agendamento->setStatus($resultado['status_agendamento']);
					$agendamento->setNomeVeterinario($resultado['nome']);
					$agendamentos[] = $agendamento;
				}
				return $agendamentos;
			}else{
				return false;
			}
		}
		
		public function listarUm(){
			$con = new MySQL();
			$sql = "SELECT * FROM agendamento,usuario WHERE id_agendamento = $this->idAgendamento and agendamento.id_veterinario = usuario.id_usuario";
			$resultado = $con->consulta($sql);
			if(!empty($resultado)){
					$this->nomePet = $resultado[0]['nomePet'];
					$this->date = $resultado[0]['dt'];
					$this->hora = $resultado[0]['hr'];
					$this->nomeTutor = $resultado[0]['nomeTutor'];
					$this->telefone = $resultado[0]['telefone'];
					$this->email = $resultado[0]['email'];
					$this->veterinario = $resultado[0]['id_veterinario'];
					$this->status = $resultado[0]['status_agendamento'];	
					$this->nomeVeterinario = $resultado[0]['nome'];	
			}else{
				return false;
			}
		}
		
		public function excluir(){
			$con = new MySQL();
			$sql = "DELETE FROM agendamento WHERE id_agendamento = $this->idAgendamento";
			$con->executa($sql);
		}
		
		public function alterar(){
			$con = new MySQL();
			$sql = "UPDATE agendamento SET nomePet = '$this->nomePet', dt = '$this->date', hr = '$this->hora', 
											nomeTutor = '$this->nomeTutor', telefone = '$this->telefone', 
											email = '$this->email', id_veterinario = '$this->veterinario', 
											status_agendamento = '$this->status'
					WHERE id_agendamento = '$this->idAgendamento'";
			$con->executa($sql);
			
		}

		public static function listaVeterinario(){
			$con = new MySQL();
			$sql = "SELECT nome, usuario.id_usuario FROM veterinario, usuario WHERE usuario.id_usuario = veterinario.id_usuario and ativoSistema = 1";
			$resultados = $con->consulta($sql);
			if(!empty($resultados)){
				return $resultados;
			}else{
				return false;
			}
		}

		public function listarUsers(){
			$con = new MySQL();
			$sql = "SELECT usuario.id_usuario, nomeP, nome, email, telefone FROM paciente, usuario WHERE usuario.id_usuario = paciente.id_usuario";
			$resultados = $con->consulta($sql);
			if(!empty($resultados)){
				return $resultados;
			}else{
				return false;
			}
		}
		
		public static function listaUsuarioId($id){
			$con = new MySQL();
			$sql = "SELECT nomeP, nome, email, telefone FROM paciente, usuario WHERE usuario.id_usuario = paciente.id_usuario and usuario.id_usuario = $id";
			
			$resultado = $con->consulta($sql);
			if(!empty($resultado)){
				return $resultado;
			}
			else{
				return false;
			}
		}

		public function verificarAgendamento(){
			$con = new MySQL();
			$sql = "SELECT * FROM agendamento WHERE dt= '$this->date' and hr = '$this->hora'";	
			// echo $sql;
			// die;					
			$resultados = $con->consulta($sql);
			if(!empty($resultados)){
				return true;
			}
			else{
				return false;
			}
		}		
		
	}
	?>