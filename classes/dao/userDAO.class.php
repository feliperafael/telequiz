<?php 
//require_once('../connect/conexao.class.php');


class userDAO{
	public static $instance; 
	private $tabela = "user";
	private function __construct() { //
	}
	public static function getInstance() { 
		if (!isset(self::$instance)) 
			self::$instance = new userDAO();
		return self::$instance;		
	} 
	
    public function  getAllUsers(){
        $sql = conexao::getInstance()->prepare("SELECT * FROM `user`");
        if($sql->execute()){
            $output = array();
            while($dados = $sql->fetch(PDO::FETCH_ASSOC)){
                array_push($output,$dados);
            }
            return $output;

        }else{
            echo $sql->errorCode();
        }

    }
	public function get($id){

			
			$sql = conexao::getInstance()->prepare("SELECT * FROM `user` WHERE `id` = :id");
	
			$sql->bindValue(':id',$id);
		
			
			if ($sql->execute()){	
				
				return $sql->fetch(PDO::FETCH_ASSOC);
				//echo 'NUM REGISTROS : '.$sql->rowCount().'<br>';
				//echo 'Consulta ok';
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
	
	private function countResultsByEmail($email){

			
			$sql = conexao::getInstance()->prepare("SELECT * FROM `user` WHERE `email_user` = :email");
	
			$sql->bindValue(':email',$email);
		
			
			if ($sql->execute()){	
				return $sql->rowCount();
			}else{
				// Query failed.
				echo $sql->errorCode();
			}
			return -1;
	
		
	}
	
	
	public function insert(user $user){
		if($this->countResultsByEmail($user->getEmail()) == 0 ){ //Usuario ainda não cadastrado
			
			$sql = conexao::getInstance()->prepare("INSERT INTO `user`(`nome_user`, `senha_user`, `email_user`, `status_user`) 
																VALUES (:nome, :senha, :email, :status)");
		
				$sql->bindValue(':nome',$user->getNome());
				$sql->bindValue(':senha',Bcrypt::hash($user->getSenha()));
				$sql->bindValue(':email',$user->getEmail());
				$sql->bindValue(':status',1);
			
				
				if ($sql->execute()){
						//echo 'DADO INSERIDOs';
						echo 'Cadastro efetuado com sucesso!';
					return true;
				}
		}else{ // email ja cadastrado
			echo 'Email já cadastrado.';
		}
			return false;
	}



}


?>