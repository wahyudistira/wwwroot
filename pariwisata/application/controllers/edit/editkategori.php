<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of editkategori
 *
 * @author phepen
 */
class editkategori extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->library('auth');
        $this->auth->check_user_authentification();
        $this->load->model('kategori_model');
    }

    function index() {
        $data['data'] = $this->kategori_model->get_all();
        $this->load->view('admin/headeradmin');
        $this->load->view('admin/edit/feditkategori', $data);
        $this->load->view('admin/footeradmin');
    }

    function edit($id) {
        $data['data'] = $this->kategori_model->get_by_id($id);
        $this->load->view('admin/headeradmin');
        $this->load->view('admin/edit/feditkategori', $data);
        $this->load->view('admin/footeradmin');
    }

    function update() {
        $id = $this->input->post('id');
        $data = array(
            'kategori' => $this->input->post('kategori')
        );
        $this->kategori_model->update($id, $data);
        redirect('adm/kategori');
    }

}

?>
