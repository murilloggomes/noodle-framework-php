<?php
/**
 * Index Controller
 */
class IndexController extends Controller
{
    /**
     * Process
     */
    public function process()    {          
      
      $AuthUser = $this->getVariable("AuthUser");
      
        if (!$AuthUser) {
            header("Location: ".APPURL."/login");
            exit;
        } 

        header("Location: ".APPURL."/dashboard");
        exit;
    }
}