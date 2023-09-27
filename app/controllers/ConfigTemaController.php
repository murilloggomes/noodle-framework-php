<?php
    /**
     * Config Tema Controller
     */
    class ConfigTemaController extends Controller
    {
        /**
         * Process
         */
        public function process()
        {
            $AuthUser = $this->getVariable("AuthUser");
            
            if (!$AuthUser){
                header("Location: " . APPURL . "/login");
            }
            
            if (Input::post("action") == "salvarConfigTema") {
                $this->salvarConfigTema();
            }
        }
        
        private function salvarConfigTema()
        {
            
            $this->resp->result = 0;
            
            $AuthUser = $this->getVariable("AuthUser");
            
            $Valor = Input::post("valores");
            
            $ConfigTema = Controller::model("ConfigTema");
            $ConfigTema->select($AuthUser->get("id"), "usuario");
            
            $ConfigTema->set("usuario", $AuthUser->get('id'))
                ->set("data_alteracao", date("Y-m-d H:i:s"));
            
            foreach($Valor as $v){
                $ConfigTema->set($v['coluna'], $v['valor']);
            }
            
            $ConfigTema->save();
            
            $this->resp->result = 1;
            $this->jsonecho();
            
        }
        
    }
