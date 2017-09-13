<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dashbor
 *
 * @author phepen
 */
class dashbor extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->library('authkec');
        $this->authkec->check_user_authentification();
    }

    function index() {
       
            
            
            $this->load->view('admin/headeradmin');
            $this->load->view('adminkec/view/fdashbor');
            $this->load->view('admin/footeradmin');
        
    }
}

?>
