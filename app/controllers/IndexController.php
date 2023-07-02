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
        // Set variables
        $this->setVariable("Settings", Controller::model("GeneralData", "settings"));    

        $this->view("login", "site");
    }
}