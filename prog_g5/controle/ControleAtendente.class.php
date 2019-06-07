<?php
include_once $_SERVER['DOCUMENT_ROOT']."/prog_g5/desenv/modelo/Atendente.class.php";

class ControleAtendente{

	public function inserir($dados){
		$atendente = new Atendente (null,$dados['nome'],$dados['email'],$dados['senha'],$dados['telefone'],$dados['cpf'],$dados['ativoSistema'], $dados['id_tipo']);
		if($atendente->verificar_email()){
			$atendente->inserir();	
			header("location:../visao/lstAtendente.php");
		}else{
			echo  "<script>alert('Email já cadastrado!')</script>";
			header("location:../FormularioUsuario.php");
		}
		//function verificar_email($email){
			//if(true){
		//$atendente->inserir();
		//header("location:../lstAtendente.php");
			//}else{
			//	header("location:../FormularioUsuario.php");
			//	echo  "<script>alert('Email já cadastrado!);</script>";
			//}
		//}
	}
	public function listarTodos(){
		$atendente = new Atendente();
		$atendentes = $atendente->listarTodos();
		return $atendentes;
	}

	public function listarUm($id_usuario){
		$atendente = new Atendente($id_usuario,null,null,null,null,null,null, 2);
		$atendente->listarUm();
		return $atendente;
	}

	public function alterar($dados){
		$atendente = new Atendente ($dados['id_usuario'],$dados['nome'],$dados['email'],null,$dados['telefone'],$dados['cpf'],$dados['ativoSistema'], null);
		$atendente->alterar();
		header("location: lstAtendente.php");
	}
	public function temporario($dados){
		$dados_cad = array($dados['nome'],$dados['email'],$dados['telefone'],$dados['cpf'],$dados['ativoSistema']);
		return $dados_cad;
	}
	


}

?>