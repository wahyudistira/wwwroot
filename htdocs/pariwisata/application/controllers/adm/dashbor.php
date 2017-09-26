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
class dashbor extends CI_controller {

    //put your code here

    public function __construct() {
        parent::__construct();
        $this->load->library('auth');
        $this->auth->check_user_authentification();
    }

    function index() {
       
            
            
            $this->load->view('admin/headeradmin');
            $this->load->view('admin/view/fdashbor');
            $this->load->view('admin/footeradmin');
        
    }

}

?>
