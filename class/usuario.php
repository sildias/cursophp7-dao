<?php

class Usuario{

	private $idusuario;
	private $deslogin;
	private $dessenha;
	private $dtcadastro;

	public function getIdusuario(){

		return $this->idusuario;

	}	//Fim function getIDusuario

	public function setIdusuario($value){

		$this->idusuario = $value;

	}	//Fim function setidusario

	public function getDeslogin(){

		return $this->deslogin;

	}	//Fim function getDeslogin

	public function setDeslogin($value){

		$this->deslogin = $value;

	}	//Fim function setDeslogin

	public function getDessenha(){

		return $this->dessenha;

	}	//Fim function getDessenha

	public function setDessenha($value){

		$this->dessenha = $value;

	}	//Fim function setDessenha

	public function getDtcadastro(){

		return $this->dtcadastro;

	}	//Fim function getdtcadastro

	public function setDtcadastro($value){

		$this->dtcadastro = $value;

	}	//Fim function setdtcadastro

	public function loadByid($id){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuarios = :ID", array(

			":ID"=>$id

			));

		if (count($results) > 0){

			$row = $results[0];

			$this->setIdusuario($row['idusuario']);
			$this->setDeslogin($row['deslogin']);
			$this->setDessenha($row['dessenha']);
			$this->setDtcadastro(new DateTime($row['dtcadastro']));

		}	// Fim if

	} 	//Fim function loadByid

	public static function getList(){

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin;");


	} 	//Fim getLista

	public static function search($login){

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :search ORDER BY deslogin", array(
			':search'=>"%".$login."%"

			));

	}// Fim search

	public function login($login, $password){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha= :PASSWORD", array(

			":LOGIN"=>$login,
			":PASSWORD"=>$password

			));

		if (count($results) > 0){

			$row = $results[0];

			$this->setIdusuario($row['idusuario']);
			$this->setDeslogin($row['deslogin']);
			$this->setDessenha($row['dessenha']);
			$this->setDtcadastro(new DateTime($row['dtcadastro']));


	}  else{

		throw new Exception("Login / Senha inválidos.");
	} }
	// Fim login


	public function __toString(){

		return json_encode(array(
			"idusuario"=>$this->getIdusuario(),
			"deslogin"=>$this->getDeslogin(),
			"dessenha"=>$this->getDessenha(),
			"dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")
			));
	}

} 		//Fim class Usuario

?>