<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of postwisata
 *
 * @author phepen
 */
class postwisata extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->library('authkec');
        $this->authkec->check_user_authentification();
        $this->load->model('wisata_model');
    }

    function index() {
        $id = $this->session->userdata('ADMIN');
        $data['data'] = $this->wisata_model->get_by_id($id);

        $this->load->view('admin/headeradmin');
        $this->load->view('adminkec/post/fwisata', $data);
        $this->load->view('admin/footeradmin');
    }

}

?>
