<?php
include $_SERVER['DOCUMENT_ROOT']."/prog_g6/desenv/modelo/Cadastro.class.php";
include_once $_SERVER['DOCUMENT_ROOT']."/prog_g6/desenv/modelo/Paciente.class.php"; 

class ControleCadastro{
	//nao tem atributos, usa o modelo para acessar o banco
	//guia as funçoes do CRUD
	public function inserir($dados){ //recebe os dados implementados
		$cadastro = new Cadastro(null, $dados['paciente'], $dados['veterinario'], $dados['dt_entrada'], $dados['dt_saida'], $dados['id_quarto'], 
								$dados['grau_complicacao'], $_SESSION['usuario'], $dados['nomeVI'], $dados['emailVI']); //cria um objeto //id é null //4 NÃO PODE FICAR FIXO, SÓ CONSIGO PEGAR APÓS A PARTE DA SESSÃO for feita
		$cadastro->inserir(); //chama o metodo inserir do modelo 
		header("location:../internacao.php");
	//print_r ($dados);
	}

	public function listarTodos(){ 
		$cadastro = new Cadastro();
		$cadastro = $cadastro->listarTodos();
		return $cadastro;
	}
	
	public function listarUm($id){
		$cadastro = new Cadastro(); //CRIA O OBJETO
		$cadastro->listarUm($id);
		return $cadastro; 
	}
	
	public function alterar($dados){
		$cadastro = new Cadastro($dados['id_internacao'], $dados['paciente'], $dados['veterinario'], $dados['dt_entrada'], $dados['dt_saida'], $dados['id_quarto'], 
								$dados['grau_complicacao'], $_SESSION['usuario'], $dados['nomeVI'], $dados['emailVI']);
		$cadastro->alterar($dados);
		header("location: ../internacao.php");
	}
	
	public function pesquisarPorNome($nome){
		$cadastro = new Cadastro();
		$cadastro = $cadastro->pesquisarPorNome($nome); 
		return $cadastro;
	}
	
	public function darAlta($id_internacao){
		$cadastro = new Cadastro();
		$cadastro->darAlta($id_internacao);
	}
	
	
	
	
}
?>