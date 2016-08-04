<?php



class modelUserLogin{
	private $email;
	private $senha;
	//nome da tabela de dados
	private $tabela = 'user';
	//nome da coluna de dados do usuario
	private $user = "email_user";
	//nome da coluna da senha do usuario
	private $pass = "senha_user";
	private $coluna_id = "id_user";
	public $erro = "";
	
	protected static $prefixoSession = 'telequiz_';
	
	public function modelUserLogin(){
		
	}
	
	public function Login(user $user_obj){
		
		$usuario = $user_obj->getEmail();
		$senha   = $user_obj->getSenha();
		
		
		$dados = $this->verificaUsuarioSenha($user_obj);
		
		//print_r($dados);
		//print_r($_SESSION);
		$id_user = $dados[$this->coluna_id];
		if($id_user>0){
				//echo 'realizao login';
				//print_r($_SESSION);
				$this->realizaLogin($dados);
				
			
		}else{	
			$this->erro = 0;
		}
	}
	
	
	/*@bool*/
	private function verificaUsuarioSenha(user $user){
		$email = $user->getEmail();
		$senha = $user->getSenha();
		
		$sql = Conexao::getInstance()->prepare("SELECT * FROM `".$this->tabela."` WHERE `".$this->user."` = :email");
		$sql->bindValue(':email',$email);
		$sql->execute();
		
		$dados = $sql->fetch(PDO::FETCH_ASSOC);
		//verifica se existe 1 e apenas 1 usuario com essa identificação de cpf
		if($sql->rowCount()==1){
			//verifico se a senha é =
			if(Bcrypt::check($senha,$dados['senha_user'])){
				return $dados;			
			}else{
				$this->erro = 0;
			}			
		}else{
			$this->erro = 0;
		}
		
		return -1;//caso não consiga achar os cados do usaurio
		
		
	}
	/*essa funç~~o deve ser duplicada no DAOUsuarioAnunciante*/
	private function cryptSenha($senha){		
		$hash = Bcrypt::hash($senha);
		//aplica alguma criptografia a senha
		return $hash ;		
	}
	
	private function realizaLogin($dados){
		//$email 	= $dados['email'];
		$id		= $dados[$this->coluna_id];
		$id_user = $dados['id_user'];
		//$senha   = $user_obj->getSenha();
		
		//sec_session_start() ;//inicializa uma session 'segura'		
		$_SESSION[self::$prefixoSession.'id']		= $id;
		$_SESSION[self::$prefixoSession.'id_user']		= $id_user;
		//$_SESSION[$this->prefixoSession.'login_anunciante']		= $email;
		$_SESSION[self::$prefixoSession.'user_agent'] 			= sha1($_SERVER['HTTP_USER_AGENT']); 
		$_SESSION[self::$prefixoSession.'logado'] 				= true; 
		
		//print_r($_SESSION);
		//$this->logout();
		
		
	}
	
	/*@bool*/
	public function verificaLogado(){
		//echo 'vecrifica logado';
		if(isset($_SESSION))
		{
			//print_r($_SESSION);
			if(isset($_SESSION[self::$prefixoSession.'logado']) && $_SESSION[self::$prefixoSession.'logado']==true)
			{	
				return true;
				//verifico se é o msm navegador
				if(sha1($_SERVER['HTTP_USER_AGENT']) == $_SESSION[self::$prefixoSession.'user_agent']){
					return true;				
				}else{
					//echo 'Outro userAgent';
					$this->logout();
				}
			}else{
				//echo 'Logado = false';
				//$this->logout();
			}
		}
		
		
		return false;
		
	}
	
	public function logout(){
		echo 'Logout<br>';
		// Tamanho do prefixo
		$tamanho = strlen(self::$prefixoSession);
		// Destroi todos os valores da sessão relativos ao sistema de login
		foreach ($_SESSION AS $chave=>$valor) {
		  // Remove apenas valores cujas chaves comecem com o prefixo correto
		  if (substr($chave, 0, $tamanho) == self::$prefixoSession) {
			unset($_SESSION[$chave]);
		  }
		}
		
		//print_r($_SESSION);
		
	}
	
	
	
}

?>