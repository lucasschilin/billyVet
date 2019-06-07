<?php 
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);


include $_SERVER['DOCUMENT_ROOT']."/prog_g6/desenv/db/MySQL.class.php";

class Cadastro{
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
			return $this->id_internacao;
	}		
	public function setId_internacao($id_internacao){
			$this->id_internacao = $id_internacao;
	}
	public function getId_usuario(){
			return $this->id_usuario;
	}		
	public function setId_usuario($id_usuario){
			$this->id_usuario = $id_usuario;
	}
	public function getId_veterinario(){
			return $this-> id_veterinario;
	}
	public function setId_veterinario($id_veterinario){
			$this->id_veterinario = $id_veterinario;
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
			return $this-> grau_complicacao;
	}
	public function setGrau_complicacao($grau_complicacao){
			$this->grau_complicacao = $grau_complicacao;
	}
	public function getId_atendente(){
			return $this-> id_atendente;
	}
	public function setId_atendente($id_atendente){
			$this->id_atendente = $id_atendente;
	}
	public function getNomeVI(){
			return $this->nomeVI;
	}
	public function setNomeVI($nomeVI){
			$this->nomeVI = $nomeVI;
	}
	public function getEmailVI(){
			return $this-> emailVI;
	}
	public function setEmailVI($emailVI){
			$this->emailVI = $emailVI;
	}
	public function getNomeP(){
			return $this->nomeP;
	}
	public function setNomeP($nomeP){
			$this->nomeP = $nomeP;
	}
	public function getNomeTutor(){
			return $this->nomeTutor;
	}
	public function setNomeTutor($nomeTutor){
			$this->nomeTutor = $nomeTutor;
	}
	public function getNomeVet(){
			return $this->nomeVet;
	}
	public function setNomeVet($nomeVet){
			$this->nomeVet = $nomeVet;
	}
	public function getDescricao(){
			return $this-> descricao;
	}
	
	public function setDescricao($descricao){
			$this->descricao = $descricao;
	}

	//crud
		public function inserir(){ //acesso ao banco
			$con = new MySQL(); //conexao com o banco
			$sql = "INSERT INTO internacao (id_usuario,id_veterinario,dt_entrada, dt_saida, id_quarto, grau_complicacao, id_atendente, nomeVI, emailVI) 
			VALUES ('$this->id_usuario','$this->id_veterinario', '$this->dt_entrada', null, '$this->id_quarto', '$this->grau_complicacao', '$this->id_atendente',
			'$this->nomeVI', '$this->emailVI')";
			
			$sql2 = "UPDATE quarto SET disponivel=0 WHERE id_quarto = '$this->id_quarto'";
			$con->executa($sql);
			$con->executa($sql2);
		}

		public function listarTodos(){
			$con = new MySQL();
			//$idUsuario = $_SESSION['usuario']->getId();
			$sql = "SELECT internacao.id_internacao, internacao.id_usuario, internacao.id_veterinario, internacao.dt_entrada, internacao.dt_saida, 
							internacao.id_quarto, internacao.grau_complicacao, internacao.id_atendente, internacao.nomeVI, internacao.emailVI,
							quarto.descricao, paciente.nomeP, usuario.nome as nomeTutor, vet.nome as nomeVet
					FROM quarto, internacao, paciente, usuario,(select usuario.id_usuario, usuario.nome from usuario, veterinario
							where usuario.id_usuario = veterinario.id_usuario) as vet
					WHERE quarto.id_quarto = internacao.id_quarto AND 
							paciente.id_usuario = internacao.id_usuario AND 
							paciente.id_usuario = usuario.id_usuario AND
							vet.id_usuario = internacao.id_veterinario
					ORDER BY dt_entrada desc"; 
			$resultados = $con->consulta($sql);
			if(!empty($resultados)){
				$cadastros = array();
				foreach($resultados as $resultado){
					$cadastro = new Cadastro();
					$cadastro->setId_internacao($resultado['id_internacao']);
					$cadastro->setId_usuario($resultado['id_usuario']);
					$cadastro->setId_veterinario($resultado['id_veterinario']);
					$cadastro->setDt_entrada($resultado['dt_entrada']);
					$cadastro->setDt_saida($resultado['dt_saida']);
					$cadastro->setId_quarto($resultado['id_quarto']);
					$cadastro->setGrau_complicacao($resultado['grau_complicacao']);
					$cadastro->setId_atendente($resultado['id_atendente']);
					$cadastro->setNomeVI($resultado['nomeVI']);
					$cadastro->setEmailVI($resultado['emailVI']);
					$cadastro->setDescricao($resultado['descricao']);
					//$sql2 = "SELECT internacao.nomeP, usuario.nome 
							//FROM internacao,usuario 
							//WHERE usuario.id_usuario=internacao.id_usuario and  internacao.id_usuario=".$consulta->getId_usuario();
					//$resultado = $con->consulta($sql2);								
					$cadastro->setNomeP($resultado['nomeP']);	
					$cadastro->setNomeTutor($resultado['nomeTutor']);
					$cadastro->setNomeVet($resultado['nomeVet']);
					$cadastros[] = $cadastro;
				}
				//print_r ($cadastros);
				//die;
				return $cadastros;
			}else{
				return false;
			}
		}

		public function pesquisarPorNome($texto_digitado){
			$con = new MySQL();
			$sql = "SELECT internacao.id_internacao, internacao.id_usuario, internacao.id_veterinario, internacao.dt_entrada, 
							internacao.id_quarto, internacao.grau_complicacao, internacao.id_atendente, internacao.nomeVI, internacao.emailVI,
							quarto.descricao, paciente.nomeP, usuario.nome as nomeTutor, vet.nome as nomeVet
					FROM quarto, internacao, paciente, usuario,(select usuario.id_usuario, usuario.nome from usuario, veterinario
							where usuario.id_usuario = veterinario.id_usuario) as vet
					WHERE quarto.id_quarto = internacao.id_quarto AND 
							paciente.id_usuario = internacao.id_usuario AND 
							paciente.id_usuario = usuario.id_usuario AND
							vet.id_usuario = internacao.id_veterinario AND paciente.nomeP='$texto_digitado'
					ORDER BY dt_entrada desc";
			$resultados = $con->consulta($sql);
			if(!empty($resultados)){
				$cadastros = array();
				foreach($resultados as $resultado){
					$cadastro = new Cadastro();
					$cadastro->setId_internacao($resultado['id_internacao']);
					$cadastro->setId_usuario($resultado['id_usuario']);
					$cadastro->setId_veterinario($resultado['id_veterinario']);
					$cadastro->setDt_entrada($resultado['dt_entrada']);
					$cadastro->setDt_saida($resultado['dt_saida']);
					$cadastro->setId_quarto($resultado['id_quarto']);
					$cadastro->setGrau_complicacao($resultado['grau_complicacao']);
					$cadastro->setId_atendente($resultado['id_atendente']);
					$cadastro->setNomeVI($resultado['nomeVI']);
					$cadastro->setEmailVI($resultado['emailVI']);
					$cadastro->setDescricao($resultado['descricao']);
					//$sql2 = "SELECT internacao.nomeP, usuario.nome 
							//FROM internacao,usuario 
							//WHERE usuario.id_usuario=internacao.id_usuario and  internacao.id_usuario=".$consulta->getId_usuario();
					//$resultado = $con->consulta($sql2);					
					$cadastro->setNomeP($resultado['nomeP']."|".$resultado['nome']);	
					$cadastro->setNomeTutor($resultado['nomeTutor']);
					$cadastro->setNomeVet($resultado['nomeVet']);
					$cadastros[] = $cadastro;
				}
				
				return $cadastros;
			}else{
				return false;
			}
		}
		public static function listaPacientes(){
			$con = new MySQL();
			$sql = "SELECT * from paciente";
			$resultados = $con->consulta($sql);
			return $resultados;
		}
		
		public static function listaVeterinarios(){
			$con = new MySQL();
			$sql = "SELECT * from veterinario, usuario WHERE veterinario.id_usuario = usuario.id_usuario";
			$resultados = $con->consulta($sql);
			return $resultados;
		}
		
		public static function listaQuartos(){
			$con = new MySQL();
			$sql = "SELECT * from quarto";
			$resultados = $con->consulta($sql);
			return $resultados;
		}
		public static function listaUsuarios(){
			$con = new MySQL();
			$sql = "SELECT * from usuario";
			$resultados = $con->consulta($sql);
			return $resultados;
		}
		
		
		public function listarUm($id){
			$con = new MySQL();
			$sql = "SELECT internacao.id_internacao, internacao.id_usuario, internacao.id_veterinario, internacao.dt_entrada, internacao.dt_saida, 
							internacao.id_quarto, internacao.grau_complicacao, internacao.id_atendente, internacao.nomeVI, internacao.emailVI,
							quarto.descricao, paciente.nomeP, usuario.nome as nomeTutor, vet.nome as nomeVet
					FROM quarto, internacao, paciente, usuario,(select usuario.id_usuario, usuario.nome from usuario, veterinario
							where usuario.id_usuario = veterinario.id_usuario) as vet
							WHERE id_internacao = ".$id." AND quarto.id_quarto = internacao.id_quarto AND 
							paciente.id_usuario = internacao.id_usuario AND 
							paciente.id_usuario = usuario.id_usuario AND
							vet.id_usuario = internacao.id_veterinario";
			$resultado = $con->consulta($sql);
			
			if(!empty($resultado)){
			$this->id_internacao = $resultado[0]['id_internacao'];
			$this->id_usuario = $resultado[0]['id_usuario'];
			$this->id_veterinario = $resultado[0]['id_veterinario'];
			$this->dt_entrada = $resultado[0]['dt_entrada'];
			$this->dt_saida = $resultado[0]['dt_saida'];
			$this->id_quarto = $resultado[0]['id_quarto'];
			$this->grau_complicacao = $resultado[0]['grau_complicacao'];
			$this->nomeVI = $resultado[0]['nomeVI'];
			$this->emailVI = $resultado[0]['emailVI'];
			$this->descricao = $resultado[0]['descricao'];
			//$sql2 = "SELECT internacao.nomeP, usuario.nome 
					//FROM internacao,usuario 
					//WHERE usuario.id_usuario=internacao.id_usuario and  internacao.id_usuario=".$consulta->getId_usuario();
			//$resultado = $con->consulta($sql2);
			//$this->nomeP = $resultado[0]['nomeP']."|".$resultado['nome'];
			//$this->nomeTutor = $resultado[0]['nomeTutor'];
			//$this->nomeVet = $resultado[0]['nomeVet'];
			}else{
				return false;
			} 
		}
		public function alterar($dados){
			$con = new MySQL();	
			if($this->dt_saida == null){

				if($this->id_quarto != $_SESSION['quarto2']){
				$sql = "UPDATE internacao SET id_usuario = '$this->id_usuario', id_veterinario = '$this->id_veterinario',
			dt_entrada = '$this->dt_entrada', dt_saida = null, id_quarto = '$this->id_quarto',
			grau_complicacao = '$this->grau_complicacao', id_atendente = '$this->id_atendente', nomeVI = '$this->nomeVI',
			emailVI = '$this->emailVI'
			WHERE id_internacao = '$this->id_internacao'";
				$sql3 = "UPDATE quarto SET disponivel=1 WHERE id_quarto = '".$_SESSION['quarto2']."'";
				$sql4 = "UPDATE quarto SET disponivel=0 WHERE id_quarto = '$this->id_quarto'";
				
				$con->executa($sql3);
				$con->executa($sql4);
				}else{
					$sql = "UPDATE internacao SET id_usuario = '$this->id_usuario', id_veterinario = '$this->id_veterinario',
			dt_entrada = '$this->dt_entrada', dt_saida = null, id_quarto = '$this->id_quarto',
			grau_complicacao = '$this->grau_complicacao', id_atendente = '$this->id_atendente', nomeVI = '$this->nomeVI',
			emailVI = '$this->emailVI'
			WHERE id_internacao = '$this->id_internacao'";
				}
				

			}else {
				if($this->id_quarto != $this->id_quarto2){
				$sql = "UPDATE internacao SET id_usuario = '$this->id_usuario', id_veterinario = '$this->id_veterinario',
			dt_entrada = '$this->dt_entrada', dt_saida = '$this->dt_saida', id_quarto = '$this->id_quarto',
			grau_complicacao = '$this->grau_complicacao', id_atendente = '$this->id_atendente', nomeVI = '$this->nomeVI',
			emailVI = '$this->emailVI'
				WHERE id_internacao = '$this->id_internacao'";
				$sql2 = "UPDATE quarto SET disponivel=1 WHERE id_quarto = '".$_SESSION['quarto2']."'";
				$con->executa($sql2);
				}else{
					$sql = "UPDATE internacao SET id_usuario = '$this->id_usuario', id_veterinario = '$this->id_veterinario',
			dt_entrada = '$this->dt_entrada', dt_saida = '$this->dt_saida', id_quarto = '$this->id_quarto',
			grau_complicacao = '$this->grau_complicacao', id_atendente = '$this->id_atendente', nomeVI = '$this->nomeVI',
			emailVI = '$this->emailVI'
				WHERE id_internacao = '$this->id_internacao'";
				$sql2 = "UPDATE quarto SET disponivel=1 WHERE id_quarto = '$this->id_quarto'";
				}
			}

			$con->executa($sql);

			
		}
		
		public function darAlta($id_internacao){
			$con = new MySQL();	
			$sql = "UPDATE internacao SET dt_saida = '".date("Y-m-d")."' WHERE id_internacao = {$id_internacao}";
			$sql5 =  "UPDATE quarto, internacao SET disponivel=1 WHERE quarto.id_quarto = internacao.id_quarto AND internacao.id_internacao = {$id_internacao}";
			$con->executa($sql);
			$con->executa($sql5);
			//echo $sql;
			//echo $sql3;
			//die;
		}
		
}
?>