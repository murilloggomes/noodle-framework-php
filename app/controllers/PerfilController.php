<?php
/**
 * Profile Controller
 */
class PerfilController extends Controller
{
    /**
     * Process
     */
    public function process()
    {
        $AuthUser = $this->getVariable("AuthUser");
        $Route = $this->getVariable("Route");

        if (!$AuthUser){
            // Auth
            header("Location: ".APPURL."/login");
            exit;
        } 

        if (Input::post("action") == "salvarPerfil") {
            $this->salvarPerfil();
        } 
        
        $Equipe = Controller::model("CentroCustos");
        $Equipe->orderBy("nome", "ASC")
                ->fetchData();
        $this->setVariable("Equipe" , $Equipe);
      
        // Chamada da View
        $fragmentView = "perfil";      
        $this->setVariable("fragmentView", $fragmentView);
        $this->view("perfil");
     
        
    }
  
//     public function consultarBanco($id)
//     {        
//       $AuthUser = $this->getVariable("AuthUser");
//       $idBanco = Controller::model("Cargo", $id);
      
//       $nome = $idBanco->get("nome");
      
//       return $nome;       
      
//     }
    /**
     * Save changes
     * @return void
     */
  
    private function salvarPerfil()
    {
        $this->resp->result = 0;
        $AuthUser = $this->getVariable("AuthUser");
        $EmailSettings = $this->getVariable("EmailSettings");        
        $Usuario = Controller::model("User");
        $Usuario->select($AuthUser->get("id"), "id");
      
       $nome = Input::post("nome");
       $cpf = Input::post("cpf");
       $email = strtolower(Input::post("email"));
       $telefone = Input::post("telefone");
       $celular = Input::post("celular");
       $biografia = Input::post("biografia");
       $empresa = Input::post("empresa");
       $cargo = Input::post("cargo");
       $equipe = Input::post("equipe");
       $instagram = Input::post("instagram");
       $facebook = Input::post("facebook");
       $linkedin = Input::post("linkedin");

        // Check if email changed
        // Verification email must be send if email changed
//         $email_changed = $email == $AuthUser->get("email") ? false : true;

       $clearFormatTel = preg_replace("/[^0-9]/","", $celular); 
       $clearFormatTel2 = preg_replace("/[^0-9]/","", $telefone); 
       $clearFormatCnpj = preg_replace("/[^0-9]/","", $cpf); 
      
     
//         Start setting data
        $Usuario->set("firstname", $nome)
                 ->set("email", $email)
                 ->set("cpf/cnpj", $clearFormatCnpj)
                 ->set("phone", $clearFormatTel)
                 ->set("telefone" , $clearFormatTel2)
                 ->set("biografia", $biografia)
                 ->set("empresa", $empresa)
                 ->set("cargo" , $cargo)
                 ->set("team", $equipe)
                 ->set("instagram", $instagram)
                 ->set("facebook", $facebook)
                 ->set("linkedin", $linkedin);
                 
        if (mb_strlen(Input::post("password")) > 0) {
            $passhash = password_hash(Input::post("password"), PASSWORD_DEFAULT);
            $Usuario->set("password", $passhash);
        }

      $Usuario->save();
      $this->resp->result = 1;	
	    $this->jsonecho();		

      

      exit;
    }

}