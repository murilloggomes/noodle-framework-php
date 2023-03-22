<?php
/**
 * Signup Controller
 */
class SignupController extends Controller
{
    /**
     * Process
     */
    public function process()
    {
        $AuthUser = $this->getVariable("AuthUser");

        if ($AuthUser) {
            header("Location: ".APPURL."/clients");
            exit;
        }           

        if (Input::post("action") == "signup") {
            $this->signup();
        } 
      
        $this->view("signup", "site");
    }


    /**
     * Signup
     * @return void
     */
    private function signup()
    {        
        $errors = [];

        $required_fields  = [
            "firstname", "lastname", "cpf/cnpj", "email", 
            "password", "password-confirm"
        ];

        $required_ok = true;
        foreach ($required_fields as $field) {
            if (!Input::post($field)) {
                $required_ok = false;
            }
        }

        if (!$required_ok) {
            $errors[] = __("All fields are required");
        }


        if (empty($errors)) {
            if (!filter_var(Input::post("email"), FILTER_VALIDATE_EMAIL)) {
                $errors[] = __("Email is not valid!");
            } else {
                $User = Controller::model("User", Input::post("email"));
                if ($User->isAvailable()) {
                    $errors[] = __("Email is not available!");
                }
            }

            if (mb_strlen(Input::post("password")) < 6) {
                $errors[] = __("Password must be at least 6 character length!");
            } else if (Input::post("password-confirm") != Input::post("password")) {
                $errors[] = __("Password confirmation didn't match!");
            }
        }
            

            $User->set("email", strtolower(Input::post("email")))
                 ->set("password", 
                       password_hash(Input::post("password"), PASSWORD_DEFAULT))
                 ->set("firstname", Input::post("firstname"))
                 ->set("account_type", "cliente")
                 ->set("lastname", Input::post("lastname"))
                ->set("phone", Input::post("phone"))               
                 ->set("is_active", 1)
                 ->set("owner", "0")
                 ->set("cpf", Input::post("cpf/cnpj"))
                 ->save();          
      
            
           

            // Fire user.signup event
            Event::trigger("user.signup", $User);            

            // Logging in
            setcookie("nplh", $User->get("id").".".md5($User->get("password")), 0, "/");


             header("Location: ".APPURL."/order");
             exit;
      

        $this->setVariable("FormErrors", $errors);
        
        return $this;
    }
}