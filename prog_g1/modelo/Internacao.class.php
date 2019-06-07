<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
include_once $_SERVER['DOCUMENT_ROOT']."/prog_g1/desenv/db/MySQL.class.php";


class Internacao{
		private $id_internacao;
	private $id_usuario;
	private $id_veterinario;
	private $dt_entrada;
	private $dt_saida;
	private $id_quarto;
	private $grau_complicacao;
	private $id_atendente;
	private $nomeVI;
	private $emailVI;
	private $nomeP;
	private $nomeTutor;
	private $nomeVet;
	private $descricao;

	
	
	public function __construct($id_internacao = null, $id_usuario = null, $id_veterinario = null, $dt_entrada = null, $dt_saida = null, $id_quarto = null, 
								$grau_complicacao = null, $id_atendente = null, $nomeVI = null, $emailVI = null, 
								$nomeP = null, $nomeTutor = null, $nomeVet = null, $descricao = null){
			$this->id_internacao = $id_internacao;
			$this->id_usuario = $id_usuario;
			$this->id_veterinario = $id_veterinario;
			$this->dt_entrada = $dt_entrada;
			$this->dt_saida = $dt_saida;
			$this->id_quarto = $id_quarto;
			$this->grau_complicacao = $grau_complicacao;
			$this->id_atendente = $id_atendente;
			$this->nomeVI = $nomeVI;
			$this->emailVI = $emailVI;
			$this->nomeP = $nomeP;
			$this->nomeTutor = $nomeTutor;
			$this->nomeVet = $nomeVet;
			$this->descricao = $descricao;

	}
	public function getId_internacao(){
			return $this-> id_internacao;
	}		
	public function setId_internacao($id_internacao){
			$this->id_internacao = $id_internacao;
	}
	public function getId_usuario(){
			return $this-> $id_usuario;
	}		
	public function setId_usuario($id_usuario){
			$this->id_usuario = $id_usuario;
	}
	
	public function getDt_entrada(){
			return $this->dt_entrada;
	}
	public function setDt_entrada($dt_entrada){
			$this->dt_entrada = $dt_entrada;
	}
	public function getDt_saida(){
			return $this->dt_saida;
	}
	public function setDt_saida($dt_saida){
			$this->dt_saida = $dt_saida;
	}
	public function getId_quarto(){
			
			return $this->id_quarto;
	}
	public function setId_quarto($id_quarto){
			$this->id_quarto = $id_quarto;
	}
	public function getGrau_complicacao(){
			
			return $this->grau_complicacao;
	}
	public function setGrau_complicacao($grau_complicacao){
			$this->grau_complicacao = $grau_complicacao;
	}
		
	public function getNomeVI(){
			
			return $this->nomeVI;
	}
	public function setNomeVI($nomeVI){
		$this->nomeVI = $nomeVI;
	}
	public function getEmailVI(){
			
			return $this->emailVI;
	}
	public function setEmailVI($emailVI){
			$this->emailVI = $emailVI;
	}
	
	public function getDescricao(){
			
			return $this->descricao;
	}
	public function setDescricao($descricao){
			$this->descricao = $descricao;
	}


		public function listarTodosPorUsuario(){
			$con = new MySQL();
			$sql = "SELECT internacao.*, quarto.descricao FROM internacao INNER JOIN quarto ON quarto.id_quarto = internacao.id_quarto WHERE id_usuario =". $_SESSION['usuario'];
			$resultados = $con->consulta($sql);
			if(!empty($resultados)){
				$internacoes = array();
				foreach($resultados as $resultado){
					$internacao = new Internacao();
					$internacao->setId_internacao($resultado['id_internacao']);
					$internacao->setId_usuario($resultado['id_usuario']);
					$internacao->setDt_entrada($resultado['dt_entrada']);
					$internacao->setId_quarto($resultado['id_quarto']);
					$internacao->setGrau_complicacao($resultado['grau_complicacao']);
					$internacao->setNomeVI($resultado['nomeVI']);
					$internacao->setEmailVI($resultado['emailVI']);
					$internacao->setDescricao($resultado['descricao']);					
					$internacoes[] = $internacao;

				}
				
				return $internacoes;
			
			}else{
				return false;
				
			}
		}
		
}
?>