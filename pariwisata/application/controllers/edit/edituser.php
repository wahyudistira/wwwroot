<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of edituser
 *
 * @author phepen
 */
class edituser extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->library('auth');
        $this->auth->check_user_authentification();
        $this->load->model('user_model');
        $this->load->model('kecamatan_model');
    }

    function index() {

        $this->load->view('admin/headeradmin');
        $this->load->view('admin/edit/fedituser');
        $this->load->view('admin/footeradmin');
    }

    function edit($id) {
        $data['user'] = $this->user_model->get_by_id($id);

        $data['kecamatan'] = $this->kecamatan_model->get_all();
        $this->load->view('admin/headeradmin');
        $this->load->view('admin/edit/fedituser', $data);
        $this->load->view('admin/footeradmin');
    }

    function update() {
        $id = $this->input->post('id');
        $data = array(
            'id_kecamatan' => $this->input->post('idkecamatan'),
            'pin' => $this->input->post('pin')
        );
        $this->user_model->update($id, $data);
        redirect('adm/user');
    }

}

?>
