<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
include_once $_SERVER['DOCUMENT_ROOT']."/prog_g1/desenv/db/MySQL.class.php";


class Usuario {

	private $id_usuario;
	private $id_tipo;
	private $nome;
	private $senha;
	private $email;
	private $telefone;
	private $cpf;
	private $ativoSistema;

	public function __construct($id_usuario = null,$id_tipo = null, $nome = null, $senha = null, $email = null, $telefone = null, $cpf = null, $ativoSistema = null){
		$this->id_usuario = $id_usuario;
		$this->id_tipo = $id_tipo;
		$this->nome = $nome;
		$this->senha = $senha;
		$this->email = $email;
		$this->telefone = $telefone;
		$this->cpf= $cpf;
		$this->ativoSsitema= $ativoSistema;
	}


    public function getId_usuario()
    {
        return $this->id_usuario;
    }

    public function setId_usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;


    }
	   public function getId_tipo()
    {
        return $this->id_tipo;
    }

    public function setId_tipo($id_tipo)
    {
        $this->id_tipo = $id_tipo;


    }


    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;


    }

	public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }
	
	public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
	
	public function getTelefone()
    {
        return $this->telefone;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }
	
	public function getCpf()
    {
        return $this->cpf;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }
	
	public function getAtivoSistema()
    {
        return $this->ativoSistema;
    }

    public function setAtivoSistema($ativoSistema)
    {
        $this->ativoSistema = $ativoSistema;
    }


	public function login($email, $senha) {
		$con = new MySQL();
		$sql = "SELECT * FROM usuario WHERE email = '$email' AND senha='$senha'";
	 	$resultado = $con->consulta($sql);

		if(!empty($resultado)){ 
				$this->id_usuario = $resultado[0]['id_usuario'];
				$this->id_tipo = $resultado[0]['id_tipo'];					
				$this->email = $resultado[0]['email'];							
				$this->senha = $resultado[0]['senha'];	
				$this->nome = $resultado[0]['nome'];												
				return true;			
		}else{
			return false;
		}
	}
	public function alterarSenha(){
		$con = new MySQL();
		$sql = "UPDATE usuario SET senha = '".$this->senha."' WHERE id_usuario = '".$this->id_usuario."'";
		$con->executa($sql);
	}
	public function alterar(){
			$con = new MySQL();
			$sql = "UPDATE usuario SET nome = '$this->nome',  senha = '$this->senha',  email = '$this->email', telefone = '$this->telefone',  cpf = '$this->cpf',  ativoSistema = '$this->ativoSistema'  WHERE id_usuario = $this->id_usuario";
			$con->executa($sql);
	}
	
	public function inativar(){
			$con = new MySQL();
			$sql = "UPDATE usuario SET ativoSistema = false  WHERE id_usuario = $this->id_usuario";
			$con->executa($sql);
	}
	public function listarUm(){
		$con = new MySQL();
		$sql = "SELECT * FROM usuario WHERE idUsuario = ".$this->idUsuario;
		$resultado = $con->consulta($sql);
		if(!empty($resultado)){
				$this->id_tipo = $resultado[0]['id_tipo'];
				$this->nome = $resultado[0]['nome'];
				$this->senha = $resultado[0]['senha'];
				$this->email = $resultado[0]['email'];
				$this->telefone = $resultado[0]['telefone'];
				$this->cpf = $resultado[0]['cpf'];					
				$this->ativoSistema = $resultado[0]['ativoSistema'];
				
		}else{
			return false;
		}
	}
		public function listarTodos(){
			$con = new MySQL();
			$sql = "SELECT * FROM usuario";
			$resultados = $con->consulta($sql);
			if(!empty($resultados)){
				$usuarios = array();
				foreach($resultados as $resultado){
					$usuario = new Usuario();
					$usuario->setId_usuario($resultado['id_usuario']);
					$usuario->setId_tipo($resultado['id_tipo']);
					$usuario->setNome($resultado['nome']);
					$usuario->setSenha($resultado['senha']);
					$usuario->setEmail($resultado['email']);
					$usuario->setTelefone($resultado['telefone']);
					$usuario->setCpf($resultado['cpf']);
					$usuario->setAtivoSistema($resultado['ativoSistema']);
					$usuarios[] = $usuario;
				}
				return $usuarios;
			}else{
				return false;
			}
		}
		
		


}


