<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of editwisata
 *
 * @author phepen
 */
class editwisata extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->library('auth');
        $this->auth->check_user_authentification();
        $this->load->model('kategori_model');
        $this->load->model('kecamatan_model');
        $this->load->model('wisata_model');
    }

    function index() {

        $this->load->view('admin/headeradmin');
        $this->load->view('admin/edit/feditwisata');
        $this->load->view('admin/footeradmin');
    }

    function edit($id) {
        $data['wisata'] = $this->wisata_model->get_by_id_wisata($id);
        $data['kategori'] = $this->kategori_model->get_all();
        $data['kecamatan'] = $this->kecamatan_model->get_all();
        $this->load->view('admin/headeradmin');
        $this->load->view('admin/edit/feditwisata', $data);
        $this->load->view('admin/footeradmin');
    }

}

?>
