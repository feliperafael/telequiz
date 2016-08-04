<?php 
//require_once('../connect/conexao.class.php');


class macUserDAO{
	public static $instance; 
	private $tabela = "mac_user";
	private function __construct() { //
	}
	public static function getInstance() { 
		if (!isset(self::$instance)) 
			self::$instance = new macUserDAO();
		return self::$instance;		
	} 
	
    public function get_mac($user_id){
        $sql = conexao::getInstance()->prepare("SELECT `mac` FROM `".$this->tabela."` WHERE `user_id` =:user_id");
        $sql->bindValue(':user_id',$user_id);
        if($sql->execute()){
            return $sql->fetch(PDO::FETCH_ASSOC);
        }else{
            echo $sql->errorCode();
        }
    }
	public function get($mac){

			
			$sql = conexao::getInstance()->prepare("SELECT * FROM `".$this->tabela."` WHERE `mac` = :mac");
	
			$sql->bindValue(':mac',$mac);
		
			
			if ($sql->execute()){	
				
				return $sql->fetch(PDO::FETCH_ASSOC);
				$output = array();
				while($dados = $sql->fetch(PDO::FETCH_ASSOC)){
					array_push($output,$dados);
				}
				return $output;
			}else{
				// Query failed.
				echo $sql->errorCode();
			}
	
		
	}
	
	
	public function insert($mac, $user_id){
		
		$sql = conexao::getInstance()->prepare("INSERT INTO `mac_user`(`mac`, `user_id`) 
												VALUES (:mac,:user_id)");
	
			$sql->bindValue(':mac',$mac);
			$sql->bindValue(':user_id',$user_id);		
			
			if ($sql->execute()){
					//echo 'DADO INSERIDOs';
				return true;
			}
			return false;
	}
	
	public function existe($mac,$user_id){
		
		$sql = conexao::getInstance()->prepare("SELECT * FROM `".$this->tabela."` WHERE `mac` = :mac AND `user_id` = :userId");
	
			$sql->bindValue(':mac',$mac);
			$sql->bindValue(':userId',$user_id);		
			
			if ($sql->execute()){
				if($sql->rowCount() == 0)
					return false;
			}
			return true;
		
		
	}
	
	public function getMyDevices($user_id){
		
		$sql = conexao::getInstance()->prepare("SELECT * FROM `mac_user` WHERE `user_id` = :id");
	
		$sql->bindValue(':id',$user_id);		
			
			if ($sql->execute()){
				if($sql->rowCount() == 0)
					return null;
				else{
					$output = array();
					while($dados = $sql->fetch(PDO::FETCH_ASSOC)){
						array_push($output,$dados);
					}
					return $output;
				}
			}
			return true;
		
		
	}

	
	
	public function deleteDevice($id_device){
		$sql = conexao::getInstance()->prepare("DELETE FROM `mac_user` WHERE `id` = :id AND `user_id` = :id_user ");
		
		$sql->bindValue(':id',$id_device);		
		$sql->bindValue(':id_user',$_SESSION['telequiz_id']);	
	
		if ($sql->execute()){		
			return true;
		}
		
		return false;
		
	}
}


?>