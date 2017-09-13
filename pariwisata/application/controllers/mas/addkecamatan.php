<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of addkecamatan
 *
 * @author phepen
 */
class addkecamatan extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->library('auth');
        $this->auth->check_user_authentification();
        $this->load->model('kecamatan_model');
    }

    function index() {
        $this->load->view('admin/headeradmin');
        $this->load->view('admin/master/faddkecamatan');
        $this->load->view('admin/footeradmin');
    }

    function insert(){
        $data = array(
                'nama' => $this->input->post('nama')
            );
            $this->kecamatan_model->insert($data);
            redirect('adm/dashbor');
    }

}

?>
