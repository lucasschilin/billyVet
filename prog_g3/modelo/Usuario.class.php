<?php

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL); 

include_once $_SERVER['DOCUMENT_ROOT']."/prog_g3/desenv/db/MySQL.class.php";
include_once $_SERVER['DOCUMENT_ROOT']."/prog_g3/desenv/modelo/Paciente.class.php";

class Usuario{
	private $id_usuario;
    private $id_tipo;
	private $nometutor;
	private $email;
	private $celular;
    private $cpf;
    private $ativo;
    private $busca;

	public function __construct($id_usuario = null, $id_tipo = null, $nometutor = null, $email = null, $celular = null, $cpf = null, $ativo = null, $busca = null){
		$this->id_usuario = $id_usuario;
        $this->id_tipo = $id_tipo;
		$this->nometutor = $nometutor;
		$this->email = $email;
		$this->celular = $celular;
        $this->cpf = $cpf;
        $this->ativo= $ativo;
        $this->busca= $busca;
	}

    public function getId_usuario(){
        return $this->id_usuario;
    }

    public function setId_usuario($id_usuario){
        $this->id_usuario = $id_usuario;
    }

    public function getId_tipo(){
        return $this->id_tipo;
    }

    public function setId_tipo($id_tipo){
        $this->id_tipo = $id_tipo;
    }
    
    public function getNometutor(){
        return $this->nometutor;
    }

    public function setNometutor($nometutor){
        $this->nometutor = $nometutor;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

	public function getCelular(){
        return $this->celular;
    }

    public function setCelular($celular){
        $this->celular = $celular;
    }

    public function getCPF(){
        return $this->cpf;
    }

    public function setCPF($cpf){
        $this->cpf = $cpf;
    }

    public function getAtivo(){
        return $this->ativo;
    }

    public function setAtivo($ativo){
        $this->ativo = $ativo;
    }

    public function getBusca(){
        return $this->busca;
    }
        
    public function setBusca($busca){
        $this->busca= $busca;
    }

    function geraSenha($tamanho = 8, $maiusculas = true, $numeros = true, $simbolos = false)
        {
        // Caracteres de cada tipo
        $lmin = 'abcdefghijklmnopqrstuvwxyz';
        $lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $num = '1234567890';
        $simb = '!@#$%*-';
        // Variáveis internas
        $retorno = '';
        $caracteres = '';
        // Agrupamos todos os caracteres que poderão ser utilizados
        $caracteres .= $lmin;
        if ($maiusculas) $caracteres .= $lmai;
        if ($numeros) $caracteres .= $num;
        if ($simbolos) $caracteres .= $simb;
        // Calculamos o total de caracteres possíveis
        $len = strlen($caracteres);
        for ($n = 1; $n <= $tamanho; $n++) {
        // Criamos um número aleatório de 1 até $len para pegar um dos caracteres
        $rand = mt_rand(1, $len);
        // Concatenamos um dos caracteres na variável $retorno
        $retorno .= $caracteres[$rand-1];
        }
        return $retorno;
        }

    public function inserir(){
            $Usuario = new Usuario();
            $senha = $Usuario->geraSenha(10);
            $usu = new MySQL();
            $sql = "INSERT INTO usuario (id_tipo, nome, email, telefone, cpf, ativoSistema, senha) VALUES (3, '$this->nometutor','$this->email','$this->celular','$this->cpf','$this->ativo', '$senha')";
            $usu->executa($sql);
        }
        
        public function listarTodos(){
            $usu = new MySQL();
            $sql = "SELECT usuario.id_usuario, nome, email, ativoSistema, telefone FROM usuario, paciente WHERE paciente.id_usuario = usuario.id_usuario order by nomeP";
            $resultados = $usu->consulta($sql);
            if(!empty($resultados)){
                $usuarios = array();
                foreach($resultados as $resultado){
                    $usuario = new Usuario();
                    $usuario->setId_usuario($resultado['id_usuario']);
                    $usuario->setNometutor($resultado['nome']);
                    $usuario->setEmail($resultado['email']);
                    $usuario->setCelular($resultado['telefone']);
                    $usuario->setAtivo($resultado['ativoSistema']); 
                    $usuarios[] = $usuario;    

                }
                return $usuarios;
            }else{
                return false;
            }
        }
        
        public function listarUm(){
            $usu = new MySQL();
            $sql = "SELECT * FROM usuario WHERE id_usuario = $this->id_usuario";
            $resultado = $usu->consulta($sql);
            if(!empty($resultado)){
                    $this->nometutor = $resultado[0]['nome'];
                    $this->senha = $resultado[0]['senha'];
                    $this->email = $resultado[0]['email'];
                    $this->celular = $resultado[0]['telefone'];
                    $this->cpf = $resultado[0]['cpf'];
                    $this->ativo = $resultado[0]['ativoSistema'];
            
            }else{
                return false;
            }
            
        }

         public function buscarPorNomeT(){
            $pac = new MySQL();
            $sql = "SELECT u.id_usuario, p.nomeP, u.nome, u.email, u.telefone, u.ativoSistema  FROM paciente as p, usuario as u WHERE  u.nome LIKE ('%$this->busca%') AND p.id_usuario = u.id_usuario";
            $resultados = $pac->consulta($sql);
            if(!empty($resultados)){
                $retornos = array ();
                foreach($resultados as $resultado){
                    $paciente = new Paciente($resultado['id_usuario'],null,$resultado['nomeP'],null,null,null, null, null, null, null, null, null);
                    $usuario = new Usuario();
                    $paciente->setId_usuario($resultado['id_usuario']);
                    $paciente->setNomepaciente($resultado['nomeP']);
                    $usuario->setId_usuario($resultado['id_usuario']);
                    $usuario->setNometutor($resultado['nome']);
                    $usuario->setEmail($resultado['email']);
                    $usuario->setCelular($resultado['telefone']);
                    $usuario->setAtivo($resultado['ativoSistema']);
                    $paciente->setBusca($usuario);
                    $retornos[] = $paciente;
                }
                return $retornos;
            }else{
                return false;
            }
        }

        public function buscarPorEmail(){
            $pac = new MySQL();
            $sql = "SELECT u.id_usuario, p.nomeP, u.nome, u.email, u.telefone, u.ativoSistema  FROM paciente as p, usuario as u WHERE  u.email LIKE ('%$this->busca%') AND p.id_usuario = u.id_usuario";
            $resultados = $pac->consulta($sql);
            if(!empty($resultados)){
                $retornos = array ();
                foreach($resultados as $resultado){
                    $paciente = new Paciente($resultado['id_usuario'],null,$resultado['nomeP'],null,null,null, null, null, null, null, null, null);
                    $usuario = new Usuario();
                    $paciente->setId_usuario($resultado['id_usuario']);
                    $paciente->setNomepaciente($resultado['nomeP']);
                    $usuario->setId_usuario($resultado['id_usuario']);
                    $usuario->setNometutor($resultado['nome']);
                    $usuario->setEmail($resultado['email']);
                    $usuario->setCelular($resultado['telefone']);
                    $usuario->setAtivo($resultado['ativoSistema']);
                    $paciente->setBusca($usuario);
                    $retornos[] = $paciente;
                }
                return $retornos;
            }else{
                return false;
            }
        }
        
        public function alterar(){
            $usu = new MySQL();
            $sql = "UPDATE usuario SET nome = '$this->nometutor', email = '$this->email', telefone = '$this->celular', cpf= '$this->cpf', ativoSistema = '$this->ativo' WHERE id_usuario = $this->id_usuario";
            $usu->executa($sql); 

        }   
        
    }
?>
