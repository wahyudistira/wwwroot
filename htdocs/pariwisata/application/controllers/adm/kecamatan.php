<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of kecamatan
 *
 * @author phepen
 */
class kecamatan extends CI_Controller {

    //put your code here

    public function __construct() {
        parent::__construct();
        $this->load->library('auth');
        $this->auth->check_user_authentification();
        $this->load->model('kecamatan_model');
    }

    function index() {
        if ($this->kecamatan_model->get_all() == FALSE) {
            $data['data'] = array();
        } else {
            $data['data'] = $this->kecamatan_model->get_all();
        }
        $this->load->view('admin/headeradmin');
        $this->load->view('admin/view/fkecamatan', $data);
        $this->load->view('admin/footeradmin');
    }

}

?>
