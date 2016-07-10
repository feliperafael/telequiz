<?php

class modelUser{
	private $id_user_session;
	public $msg = "";
	
	public function modelUser(){
		
	}
	
	/*
		Usa o Codigo de validação gerado anteriormente 
		para associar um endereço mac a um usuario
		@return bool
	*/
	public function associateMacWithUser( $codeValidation ){
		if(!isset($_SESSION['telequiz_id'])){
			echo 'Você necessita estar logado para linkar dispositivo';
			return false;
		}
		$id_user = $_SESSION['telequiz_id'];
		
		$dao = macCodeDAO::getInstance(); //dao para tabela temporaria mac/code
		
		$mac = $dao->getByCode($codeValidation);		
		
		if( $mac != -1 ){//code de validação certo
			$daoMacUser = macUserDAO::getInstance();
			//verifica se ja existe mac/userId
			if(!$daoMacUser->existe($mac,$id_user)){			
				
				 //  associa mac com usuario na tabela mac/User
				if($daoMacUser-> insert($mac, $id_user)){
					$this->msg = 'Dispositivo associado com sucesso!!!';
				}else{
					$this->msg = 'Erro ao associar dispositivo.';
				}
			}else{
				$this->msg = 'Você já associou esse dispositivo anteriormente';
			}
			
		}else{
			//codigo de validação não confere
			$this->msg = 'Codigo de validação não confere, verifique o codigo';
		}
	}
	
	public function getMyDevices(){
		if(!isset($_SESSION['telequiz_id'])){
			echo 'Você necessita estar logado para linkar dispositivo';
			return false;
		}
		$id_user = (int)$_SESSION['telequiz_id'];
		$daoMacUser = macUserDAO::getInstance();
		
		$dados = $daoMacUser->getMyDevices($id_user);
		//print_r($dados);
		return $dados;
	}
	
	public function deleteDevice($id){
		
		$daoMacUser = macUserDAO::getInstance();
		if($daoMacUser->deleteDevice($id)){
			$this->msg = "Dispositivo desvinculado com sucesso.";
			return true;
		}
		$this->msg = "Erro ao desvincular dispositivo";
		
		return false;
		
	}
	/*
		recebe um array de post/get com email - nome e senha do usuario
		e realiza o cadastro no banco de dados
		@return bool
	*/

	public function registerUser($dados){
		
		if(isset($dados['nome']) && isset($dados['email']) && isset($dados['pass']))
		{
			
			$nome = $dados['nome'];
			$email = $dados['email'];
			$senha = $dados['pass'];
			
			if($nome != "" && $email != "" && $senha != "")
			{	
				//print_r($dados);
				$user = new user();
				
				$user->setNome($nome);
				$user->setEmail($email);
				$user->setSenha($senha);
				
				$daoUser = userDAO::getInstance();
				if($daoUser->insert($user)){
					$this->msg = "Cadastrado com sucesso!";
					return true;
				}
			}
			
		}
		return false;
	}
    public static  function mySort($a, $b) {
        if($a['points'] == $b['points']) {
            return 0;
        }
        return ($a['points'] > $b['points']) ? -1 : 1;
    }
    public function getRanking(){
        $dao = userDAO::getInstance();
        $dados = array();
        $dados = $dao->getAllUsers();

        $ranking = array();
        $macDao = macUserDAO::getInstance();
        $scoreDao = scoreMacDAO::getInstance();
        foreach($dados as $user ){
           // echo $user['id_user'];
            $mac = $macDao->get_mac($user["id_user"]);
            $points = $scoreDao->getPoints($mac['mac']);
            //echo $points['POINTS']. "<br/>";
            $array = array(
                'name' => $user['nome_user'], 'points' => $points['POINTS']);
            array_push($ranking, $array);

        }
        usort($ranking, array("modelUser", "mySort"));

        return $ranking;
    }




}


?>