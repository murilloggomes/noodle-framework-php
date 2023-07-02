<?php
/**
 * Login Controller
 */
class LoginController extends Controller
{
    /**
     * Process
     */
    public function process()
    {
        $AuthUser = $this->getVariable("AuthUser");
        
        if ($AuthUser) {
            header("Location: ".APPURL."/dashboard");
            exit;
        }   

        if (Input::post("action") == "login") {
            $this->login();
        } 

        $this->view("login", "site");
    }


    /**
     * Login
     * @return void
     */
    private function login()
    {
        $username = Input::post("username");
        $password = Input::post("password");
    

        if ($username && $password) {
            $User = Controller::model("User");
            $User->select(Input::post("username"), "email");

        if ($User->isAvailable()){
              
            if($User->get("is_active") == 1 && 
                password_verify($password, $User->get("password"))) 
            {
              	$LogMensagem = "Login efetuado pelo usuario " . $User->get("firstname");   
		
              
                $exp = $remember ? time()+86400*30 : 0;
                setcookie("nplh", $User->get("id").".".md5($User->get("password")), $exp, "/");

                if($remember) {
                    setcookie("nplrmm", "1", $exp, "/");
                } else {
                    setcookie("nplrmm", "1", time() - 30*86400, "/");
                }

               header("Location: ".APPURL."/produtos");
                exit; 

            } else {
              $LogMensagem = "Tentativa de login efetuada pelo usuario " . $User->get("firstname");   
						  
            }
        } 
          
        }

        return $this;
    }
}