<?php

class user{
	public $id;
	public $nome;
	public $email;
	public $senha;
	
	private $dispositivos; // @array de objetos dispositivo
	
	function user(){
		
	}
	
	function getEmail(){
		return $this->email;
	}
	
	function getNome(){
		return $this->nome;
	}
	function getId(){
		return $this->id;
	}
	
	function getSenha(){
		return $this->senha;
	}
	
	function setEmail($email){
		$this->email = $email;
	}
	
	function setNome($nome){
		$this->nome = $nome;
	}
	function setId($id){
		$this->id = $id;
	}
	
	function setSenha($senha){
		$this->senha = $senha;
	}
	
	
}
?>