<?php
require_once("classes/load.php");


	if(isset($_POST['email']) && isset($_POST['pass'])){
		
		$email = $_POST['email'];
		$senha = $_POST['pass'];
		$User = new user();
		$User->setEmail($email);
		$User->setSenha($senha);
		
		$login = new modelUserLogin();
		$login->login($User);
		
	}

	if(isset($_SESSION['telequiz_logado'])){
		$reposta = array("logado" => $_SESSION['telequiz_logado'] );	
	}else{
		$reposta = array( 'logado' => 0, 'erro' => 'usuario ou senha incorretos');
	}
	echo json_encode($reposta);
	

?>