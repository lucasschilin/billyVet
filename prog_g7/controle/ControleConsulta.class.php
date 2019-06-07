<?php 
	error_reporting(E_ALL);
	ini_set('display_errors', 1)
 ?>
<?php
include_once $_SERVER['DOCUMENT_ROOT']."/prog_g7/desenv/modelo/Consulta.class.php";


class ControleConsulta{

	public function inserir($dados){
		$consulta = new Consulta($dados['selectVet'],null,null,1,date('Y-m-d H:i:s'),$dados['selectPac'],null,null,null);
		$consultax= $consulta->cadastrar();
		return $consultax;		
	}
	public function listarFilas($id){
		$consulta = new Consulta($id);
		$consultas = $consulta->listarFila();
		return $consultas;
	}
	public function listarRealizados($id){
		$consulta = new Consulta($id);
		$consultas = $consulta->listarRealizada();
		return $consultas;
	}
	public function IniciarConsulta($dados){
		$consulta = new Consulta(null,$dados['laudo'],$dados['obs'],null,null,null,null,null,$dados['id_consulta']);
		$consulta->RealizarConsulta();
		header('Location: /prog_g7/desenv/visao/lstConsultas.php');
	}
	public function VisualizarConsulta($dados){
		$consulta = new Consulta(null,null,null,null,null,null,null,null,$dados['consulta']);
		$consultax = $consulta->VisuConsulta();
		return $consultax;
	}
	public function histo($dados){
		$consulta = new Consulta(null,null,null,null,null,$dados['paciente'],null,null,null);
		$consultas = $consulta->Historico();
		return $consultas;
	}
	public function consultasrealizar(){
		$consulta = new Consulta();
		$consultas = $consulta->todasrealizar();
		return $consultas;
	}
	public function excluirconsultas($dados){
		$consulta = new Consulta(null,null,null,null,null,null,null,null,$dados);
		$consultas = $consulta->excluir();
	}
}
?>