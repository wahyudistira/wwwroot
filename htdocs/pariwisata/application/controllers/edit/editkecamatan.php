<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of editkecamatan
 *
 * @author phepen
 */
class editkecamatan extends CI_Controller {

    //put your code here

    public function __construct() {
        parent::__construct();
        $this->load->library('auth');
        $this->auth->check_user_authentification();
        $this->load->model('kecamatan_model');
    }

    function index() {

        $this->load->view('admin/headeradmin');
        $this->load->view('admin/edit/feditkecamatan');
        $this->load->view('admin/footeradmin');
    }

    function edit($id) {
        $data['data'] = $this->kecamatan_model->get_by_id($id);
        $this->load->view('admin/headeradmin');
        $this->load->view('admin/edit/feditkecamatan', $data);
        $this->load->view('admin/footeradmin');
    }

    function update() {
        $id = $this->input->post('id');
        $data = array(
            'nama' => $this->input->post('nama')
        );
        $this->kecamatan_model->update($id, $data);
        redirect('adm/kecamatan');
    }

}

?>
