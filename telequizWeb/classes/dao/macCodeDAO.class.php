<?php 
//require_once('../connect/conexao.class.php');


class macCodeDAO{
	public static $instance; 
	private $tabela = "mac_code";
	private $time_validation_code = 600; // 10 minutos 600 segundos
	private function __construct() { //
	}
	public static function getInstance() { 
		if (!isset(self::$instance)) 
			self::$instance = new macCodeDAO();
		return self::$instance;		
	} 
	

	public function get($mac){

			
			$sql = conexao::getInstance()->prepare("SELECT * FROM `".$this->tabela."` WHERE `mac` = :mac AND `time_stamp` > :timeMax");
	
			$sql->bindValue(':mac',$mac);
			
			$duracao_code_validacao = $this->time_validation_code; // duração do codigo de validação	
			$tempo =  date("Y-m-d H:i:s",(time()- $duracao_code_validacao) );			
			$sql->bindValue(':timeMax', $tempo );
		
			
			if ($sql->execute()){	
				if($sql->rowCount() > 0){
					return $sql->fetch(PDO::FETCH_ASSOC)['code_validation'];
				}else{
					return -1;
				}
			}else{
				// Query failed.
				echo $sql->errorCode();
			}
		return -1;
		
	}
	
	public function getByCode($code){

			
			$sql = conexao::getInstance()->prepare("SELECT * FROM `".$this->tabela."` WHERE `code_validation` = :code AND `time_stamp` > :timeMax");
	
			$sql->bindValue(':code',$code);
			
			$duracao_code_validacao = $this->time_validation_code; // duração do codigo de validação	
			$tempo =  date("Y-m-d H:i:s",(time()- $duracao_code_validacao) );			
			$sql->bindValue(':timeMax', $tempo );
		
			
			if ($sql->execute()){	
				if($sql->rowCount() > 0){
					return $sql->fetch(PDO::FETCH_ASSOC)['mac'];
				}else{
					return -1;
				}
			}else{
				// Query failed.
				echo $sql->errorCode();
			}
		return -1;
		
	}
	
	
	public function insert($mac, $code){
		
		$sql = conexao::getInstance()->prepare("INSERT INTO `".$this->tabela."` (`mac`, `code_validation`) 
															VALUES (:mac,:code)");
	
			$sql->bindValue(':mac',$mac);
			$sql->bindValue(':code',$code);		
			
			if ($sql->execute()){
				//echo 'DADO INSERIDOs';
				return $code;
			}
			return false;
	}

}


?>