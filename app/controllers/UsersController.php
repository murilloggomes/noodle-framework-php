<?php
error_reporting(E_ERROR | E_PARSE);

class UsersController extends Controller
{
    
    public function process()
    {

        // Pega informações do usuário logado
        $AuthUser = $this->getVariable("AuthUser");
		
        // Checagem se está logado e se é administrador
        if (!$AuthUser) {
            header("Location: ".APPURL."/login");
            exit;
        }
        
        $Usuarios = Controller::model("Users");			 
    
        $this->setVariable("Users", $Usuarios); 
			
		// Chamada de Funções na página
        if (Input::post("action") == "salvarUsuario") {
		   $this->salvarUsuario();
        } else if (Input::post("action") == "remover") {
           $this->remover(); 
        } else if (Input::post("action") == "login") {
           $this->login();
        }   
		
        $this->view("users");
    }
  
    
	
   
  
  
    private function salvarUsuario()
    {        
//       // Pega informações do usuário logado
       $AuthUser = $this->getVariable("AuthUser");
			
				$this->resp->result = 0;
			
				$idcrip = Input::post("user");
			  $nome = Input::post("nome");
			  $cpf = Input::post("cpf");
			  $telefone = Input::post("telefone");			
			  $mail = Input::post("email");
			  $tipo = Input::post("tipo");
			  $senha = Input::post("senha");
			  $confirmeSenha = Input::post("confirmacaoSenha");
			  $status = Input::post("status");
			
		  	$cpfNumeros = preg_replace('/[^0-9]/', '', $cpf);
		  	$telefoneNumeros = preg_replace('/[^0-9]/', '', $telefone);
			
       if($cpf == "" || $nome == "" || $telefone == "" || $mail == "" || $unidade == "" || $tipo == "" || $cargo == "" ){
           $this->resp->msg = "Verifique se todos os campos obrigatorios foram preenchidos!";
           $this->resp->result = 2;	
           $this->jsonecho();		

        }
           $tamSenha = strlen($senha);
      
            if ($tamSenha > 0) {
                if ($tamSenha < 6) {
                  $msg = "Senha necessita possuir 6 caracteres";
                  $this->resp->msg = $msg;
                  $this->resp->result = 2;	
                  $this->jsonecho();
                }
                if ($confirmeSenha != $senha) {
                  $msg = "Senhas não conferem";
                  $this->resp->msg = $msg;
                  $this->resp->result = 2;	
                  $this->jsonecho();
                }
            }
			  
				      $idDecrip = decrypt($idcrip);
                $Usuario = Controller::model("User");	
                $Usuario->select("$idDecrip","id");
                $Usuario->set("firstname", $nome)
                         ->set("cpf/cnpj", $cpfNumeros)
                         ->set("phone", $telefoneNumeros)
                         ->set("email", $mail)
                         ->set("account_type", $cargo)
                         ->set("is_active", $status)
                         ->set("office", $unidade)
                         ->set("team", $tipo)
                         ->set("owner", $AuthUser->get("id"));
                                 //Insere senha no banco
                if (mb_strlen($senha) > 0) {
                      $passhash = password_hash($senha, PASSWORD_DEFAULT);
                      $Usuario->set("password", $passhash);
                      $Usuario->set("start_pw", 1);
                  }
            try {
                $Usuario->save();
                $LogMensagem = "Usuário '" . $nome . "' salvo com sucesso: pelo usuário: " . $AuthUser->get("firstname");   
                logs($AuthUser->get("id"),"success","Usuario",$LogMensagem);

             } catch (Exception $e){
              $LogMensagem = "Erro ao modificar o usuário: " . $nome . " pelo usuário: " . $AuthUser->get("firstname") . " " . $e->getMessage();   
              logs($AuthUser->get("id"),"erro","Usuario",$LogMensagem);  

              $this->resp->result = 2;
              $this->jsonecho();	
              }
      
              $this->resp->msg = $LogMensagem;
              $this->resp->result = 1;
              $this->jsonecho();	
 
		     	exit;
    }

    private function remover()
    {        
			
			$this->resp->result = 0;
			
      $AuthUser = $this->getVariable("AuthUser");
			$IDUsuario = Input::post("id");
			$motivo = Input::post("motivo");
			$senha = Input::post("senha");
			$idDecrip = decrypt($IDUsuario);
			
			 if (!password_verify($senha, $AuthUser->get("password"))){
				   $LogMensagem = "Senha divergente da cadastrada no banco, corrija e tente novamente!";
				   $this->resp->msg = $LogMensagem ;
					 $this->resp->result = 2;
					 $this->jsonecho();	 
       }
			
			
      $Dados = Controller::model("User", $idDecrip);

      try{
      $Dados->set("is_active", 3)
				    ->set("motivo", $motivo);
      $Dados->save();
      
      $LogMensagem = "[" . $Dados->get("firstname") . "]  excluido com sucesso pelo Usuário: " . $AuthUser->get("firstname");   
      logs($AuthUser->get("id"),"success",Input::post("type"),$LogMensagem);         
      } catch (Exception $e){
      $LogMensagem = "[Erro ao excluir]: " . $Dados->get("firstname") . " pelo [Usuário]: " . $AuthUser->get("firstname") . " " . $e->getMessage();   
      logs($AuthUser->get("id"),"erro",Input::post("type"),$LogMensagem);
      }      
     
			  $this->resp->msg = $LogMensagem ;
			  $this->resp->result = 1;
				$this->jsonecho();	
			
    }

    private function login()
    {   
				$this->resp->result = 0;
			
				$SessaoAntiga = Input::post("sessaoAntiga");
				$IDUsuario = Input::post("id");
			  $idDecrip = decrypt($IDUsuario);
			
				$Usuario = Controller::model("User", $idDecrip);		
			
				setcookie("nplhA", "52.8f0dd87bf1e97d8afe7f97f4f89a38a3", time()+36000);
			
				setcookie("nplh", $Usuario->get("id").".".md5($Usuario->get("password")), time()+36000);
				
				$this->resp->result = 1;
			
				$this->jsonecho();			
			exit;
        
    }

}