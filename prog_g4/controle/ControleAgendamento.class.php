<?php
include_once $_SERVER['DOCUMENT_ROOT']."/prog_g4/desenv/modelo/Agendamento.class.php";

class ControleAgendamento{
	
	public function cadastrarAgendamento($dados){

		if($dados['gender'] == 'client'){
				$busca = Agendamento::listaUsuarioId($dados['usuarios']);
				$dados['nomepet'] = $busca[0]['nomeP'];
				$dados['nometutor'] = $busca[0]['nome'];
				$dados['email'] = $busca[0]['email'];
				$dados['telefone'] = $busca[0]['telefone'];
			}		
		$agendamento = new Agendamento(null,$dados['nomepet'],$dados['date'],$dados['hora'],$dados['nometutor'],$dados['telefone'], $dados['email'],$dados['veterinario'],0);
		if($agendamento->verificarAgendamento() == true){
			?>
			<script>
				alert("Já existe uma consulta agendada para este horário.");
				window.location("location:../visao/lstAgendamentos.php");					
			</script>
			<?php					
		}
		else{				
			$agendamento->cadastrarAgendamento();
			header("location:../visao/lstAgendamentos.php");				
		}
	}
		
	
	public function listarTodos(){
		$agendamento = new Agendamento();
		$agendamentos = $agendamento->listarTodos();
		return $agendamentos;
	}
	
	public function listarUm($id){
		$agendamento = new Agendamento($id);
		$agendamento->listarUm();
		return $agendamento;
	}
	
	public function excluir($id){
		$agendamento = new Agendamento($id);
		$agendamento->excluir();
		header("location: lstAgendamentos.php");
	}
	
	public function alterar($dados){
		$agendamento = new Agendamento($dados['id'],$dados['nomepet'],$dados['date'],$dados['hora'],$dados['nometutor'],$dados['telefone'],
			$dados['email'],$dados['veterinario'],$dados['status']);
		$agendamento->alterar();
		header("location: lstAgendamentos.php");
	}

	public function listarHoje(){
		$agendamento = new Agendamento();
		$agendamentos = $agendamento->listarHoje();
		return $agendamentos;
	}

	public function listarProximos(){
		$agendamento = new Agendamento();
		$agendamentos = $agendamento->listarProximos();
		return $agendamentos;
	}	

	public function listarUsers(){
		$agendamento = new Agendamento();
		$agendamentos = $agendamento->listarUsers();
		return $agendamentos;
	}
	
	
}

?>