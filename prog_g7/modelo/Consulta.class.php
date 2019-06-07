<?php 	
	error_reporting(E_ALL);
	ini_set('display_errors', 1)
 ?>
<?php
	include_once $_SERVER['DOCUMENT_ROOT']."/prog_g7/desenv/db/MySQL.class.php";
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
		private $verificacao;

		public function __construct( $id_veterinario=null, $laudo = null, $observacao=null, $status_consulta=null,$horarioConsulta=null,$id_usuario=null,$nome_veterinario=null, $nome_paciente=null, $id_consulta=null){
			$this->id_veterinario = $id_veterinario;
			$this->laudo = $laudo;
			$this->id_consulta = $id_consulta;
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
		public function setVerificacao($verificacao ){
			$this->verificacao = $verificacao ;
		}
		public function getVerificacao(){
			return $this->verificacao ;
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
		
		public function cadastrar(){//nao resolvido cadastro duplicado
			$con = new MySQL();
			$sql ="SELECT id_usuario from consulta WHERE status_consulta=1";
			$resultados= $con->consulta($sql);
			$foi=true;
			$consulta= new Consulta();
			foreach($resultados as $resultado){
								
				if($resultado[0]==$this->id_usuario){
					$foi=false;
				}
			}
			if($foi){
				$sql = "INSERT INTO consulta (id_veterinario, laudo, observacao, status_consulta,horarioConsulta,id_usuario) VALUES ('$this->id_veterinario', '$this->laudo', '$this->observacao', '$this->status_consulta', '$this->horarioConsulta','$this->id_usuario')";
				$con->executa($sql);
				$consulta->setVerificacao("foi");
				return $consulta->getVerificacao();

			}
			else{
				$consulta->setVerificacao("nfoi");
				return $consulta->getVerificacao();

			}
				

		}

		public function listarFila(){
			$con = new MySQL();
			$sql = "SELECT consulta.*,paciente.nomeP FROM consulta,paciente,veterinario,usuario WHERE paciente.id_usuario = consulta.id_usuario and consulta.status_consulta = 1 and veterinario.id_usuario = consulta.id_veterinario and veterinario.id_usuario = usuario.id_usuario and veterinario.id_usuario = '$this->id_veterinario'  ORDER BY horarioConsulta ASC";
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
					$sql = "SELECT nome from usuario WHERE usuario.id_usuario =".$consulta->getId_usuario();
					$resl=$con->consulta($sql);
					$consulta->setNome_paciente($resultado['nomeP']." | ".$resl[0]['nome']);
					$consultas[] = $consulta;
					
				}
				return $consultas;
			}else{
				return false;
			}	
		}
		public function listarRealizada(){		
			$con = new MySQL();
			$sql = "SELECT consulta.*,paciente.nomeP FROM consulta,paciente,veterinario,usuario WHERE paciente.id_usuario = consulta.id_usuario and consulta.status_consulta = 2 and veterinario.id_usuario = consulta.id_veterinario and veterinario.id_usuario = usuario.id_usuario and veterinario.id_usuario = '$this->id_veterinario' ORDER BY horarioConsulta ASC";
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
					$sql = "SELECT nome from usuario WHERE usuario.id_usuario =".$consulta->getId_usuario();
					$resl=$con->consulta($sql);
					$consulta->setNome_paciente($resultado['nomeP']." | ".$resl[0]['nome']);
					$consultas[] = $consulta;				
				}
				return $consultas;
			}else{
				return false;
			}	
		}
		public function RealizarConsulta(){
			$con = new MySQL();
			$sql = "UPDATE consulta SET laudo = '$this->laudo', observacao = '$this->observacao', status_consulta=2 WHERE id_consulta = $this->id_consulta";
			$con->executa($sql);			

		}
		public function VisuConsulta(){
			$con = new MySQL();
			$sql = "SELECT * FROM consulta WHERE consulta.id_consulta = '$this->id_consulta' ";
			$resultado=$con->consulta($sql);			
			$consulta = new Consulta();			
			$consulta->setId_consulta($resultado[0]['id_consulta']);
			$consulta->setId_veterinario($resultado[0]['id_veterinario']);
			$consulta->setLaudo($resultado[0]['laudo']);
			$consulta->setObservacao($resultado[0]['observacao']);
			$consulta->setHorarioConsulta($resultado[0]['horarioConsulta']);
			$consulta->setId_usuario($resultado[0]['id_usuario']);			
			$sql = "SELECT usuario.nome FROM consulta, veterinario, usuario WHERE usuario.id_usuario=veterinario.id_usuario and consulta.id_veterinario=veterinario.id_usuario and consulta.id_veterinario =".$consulta->getId_veterinario();
			$resultado=$con->consulta($sql);			
			$consulta->setNome_veterinario($resultado[0]['nome']);			
			$sql = "SELECT paciente.nomeP FROM paciente WHERE  paciente.id_usuario= ".$consulta->getId_usuario() ;
			$resultado=$con->consulta($sql);
			$consulta->setNome_paciente($resultado[0]['nomeP']);

			return $consulta;
		}
		public function Historico(){
			$con = new MySQL();
			$sql = "SELECT * FROM consulta WHERE id_usuario = '$this->id_usuario' and status_consulta = 2 ";
			$resultados = $con->consulta($sql);
			if(!empty($resultados)){
				$consultas = array();
				foreach($resultados as $resultado){
					$consulta = new Consulta();
					$consulta->setId_consulta($resultado['id_consulta']);
					$consulta->setid_veterinario($resultado['id_veterinario']);
					$consulta->setLaudo($resultado['laudo']);
					$consulta->setObservacao($resultado['observacao']);
					$consulta->setHorarioConsulta($resultado['horarioConsulta']);
					$consulta->setId_usuario($resultado['id_usuario']);
					$sql = "SELECT usuario.nome FROM consulta, veterinario, usuario WHERE usuario.id_usuario=veterinario.id_usuario and consulta.id_veterinario=veterinario.id_usuario and consulta.id_veterinario =".$consulta->getId_veterinario();
					$resultado=$con->consulta($sql);			
					$consulta->setNome_veterinario($resultado[0]['nome']);
					$sql = "SELECT paciente.nomeP FROM paciente WHERE  paciente.id_usuario= ".$consulta->getId_usuario() ;
					$resultado=$con->consulta($sql);
					$consulta->setNome_paciente($resultado[0]['nomeP']);

					$consultas[] = $consulta;				
				}
				return $consultas;
			}else{
				return false;
			}	
		}
		public function todasrealizar(){
			$con = new MySQL();
			$sql = "SELECT id_consulta,id_usuario,id_veterinario,horarioConsulta FROM consulta WHERE  status_consulta = 1 ORDER BY horarioConsulta DESC";
			$resultados = $con->consulta($sql);
			if(!empty($resultados)){
				$consultas = array();
				foreach($resultados as $resultado){
					$consulta = new Consulta();
					$consulta->setId_consulta($resultado['id_consulta']);
					$consulta->setid_veterinario($resultado['id_veterinario']);
					$consulta->setHorarioConsulta($resultado['horarioConsulta']);
					$consulta->setId_usuario($resultado['id_usuario']);
					$sql = "SELECT usuario.nome FROM consulta, veterinario, usuario WHERE usuario.id_usuario=veterinario.id_usuario and consulta.id_veterinario=veterinario.id_usuario and consulta.id_veterinario =".$consulta->getId_veterinario();
					$resultado=$con->consulta($sql);
					$consulta->setNome_veterinario($resultado[0]['nome']);
					$sql = "SELECT paciente.nomeP, usuario.nome FROM paciente,usuario WHERE usuario.id_usuario=paciente.id_usuario and  paciente.id_usuario= ".$consulta->getId_usuario();
					$resultado=$con->consulta($sql);
					$consulta->setNome_paciente($resultado[0]['nomeP']." | ".$resultado[0]['nome']);
					$consultas[] = $consulta;				
				}
				return $consultas;
			}else{
				return false;
			}	
		}
		public function excluir(){
			$con = new MySQL();
			$sql = "DELETE FROM consulta WHERE  status_consulta = 1 and $this->id_consulta= id_consulta ";
			$con->consulta($sql);
		}



}
?>
