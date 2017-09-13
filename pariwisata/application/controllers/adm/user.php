<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user
 *
 * @author phepen
 */
class user extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->library('auth');
        $this->auth->check_user_authentification();
        $this->load->model('user_model');
    }

    function index() {
        if ($this->user_model->get_all_user() == FALSE) {
            $data['data'] = array();
        } else {
            $data['data'] = $this->user_model->get_all_user();
        }
        $this->load->view('admin/headeradmin');
        $this->load->view('admin/view/fuser',$data);
        $this->load->view('admin/footeradmin');
    }

}

?>
