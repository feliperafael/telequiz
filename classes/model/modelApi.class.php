<?php
/**
* 
*
**/
set_time_limit(90);
//require_once('../load.php');
class modelApi{
	private $salt = "*$&%*#(@ds)s!ds";
	
	function modelApi(){
		
	}
	
	/*
		verifica se o endereço mac já esta cadastrado
		caso não ele gera um codigo de validação que sera
		salvo no banco de dados associando mac ao codigo
		
		@return bool
	*/
	function checkMacAdress( $macAdress ){
			$dao = macUserDAO::getInstance();
			$results = $dao->get($macAdress);
			
			//print_r($results);
			
			if( $results == null){
				//gerar codigo de cadastro 
				$code = $this->generateCodeValidation($macAdress);
				//echo "Codigo de validação : <b>".($code)."</b><br>";
				$data = array("mac"=> $macAdress,"code_validation" => $code);
				$j = json_encode($data);
				print_r($j);
			}else{
				//ja esta cadastrado
				echo 'mac Ja cadastrado';
				return true;
			}
			return false;
	}


	
	/* 
		recebe uma macAdress e retorna um codigo de validação valido por deltaT de Tempo
		associa esse codigo ao mac em uma tabela temporaria
		@return string
	*/
	function generateCodeValidation($macAdress){
		
		$hash = time().$macAdress.$this->salt;
		$hash = substr(hash('sha256',$hash),0,10);
		$code = (pow(((hexdec($hash) * hexdec($hash) )%9000),2))%9000 + 1000;//verificar aqui depois hahahahaha
		$code = sqrt($code*$code);
		
		
			return $this->saveCodeValidation($macAdress,$code);
		
	}
	
	private function saveCodeValidation($mac,$code){
			$dao = macCodeDAO::getInstance();
			$codigo = $dao->get($mac);
			if( $codigo > 0 ){  // ja esta cadastrado
				return $codigo;
			}else{
				return $dao->insert($mac,$code);
			}
			
			return false;
	
	}
	
	
	
}
?>