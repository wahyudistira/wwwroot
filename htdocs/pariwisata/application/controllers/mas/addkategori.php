<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of addagenda
 *
 * @author phepen
 */
class Addkategori extends Ci_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->library('auth');
        $this->auth->check_user_authentification();
        $this->load->model('kategori_model');
    }

    function index() {

        $this->load->view('admin/headeradmin');
        $this->load->view('admin/master/faddkategori');
        $this->load->view('admin/footeradmin');
    }

    function insert() {
        $data = array(
            'kategori' => $this->input->post('kategori')
        );
        $this->kategori_model->insert($data);
        redirect('adm/dashbor');
    }

    function add() {


        $id = $this->session->userdata('ID');
        $t1 = substr($this->input->post('tgl_mulai'), 8, 2);
        $t2 = substr($this->input->post('tgl_mulai'), 5, 2);




        $ts1 = substr($this->input->post('tgl_selesai'), 8, 2);
        $ts2 = substr($this->input->post('tgl_selesai'), 5, 2);



        if ($t2 > $ts2 or $t1 > $ts1) {
            $ok['ss'] = "gagal";
            $this->load->view('admin/headeradmin');
            $this->load->view('admin/master/faddagenda', $ok);
            $this->load->view('admin/footeradmin');
        } else {
            $dataAgenda = array(
                'id_agenda' => NULL,
                'judul' => $this->input->post('judul'),
                'tanggal_mulai' => $this->input->post('tgl_mulai'),
                'tanggal_selesai' => $this->input->post('tgl_selesai'),
                'tempat' => $this->input->post('tempat'),
                'jam' => $this->input->post('jam'),
                'keterangan' => $this->input->post('keterangan'),
                'id_admin' => $id
            );
            $this->model_agenda->add($dataAgenda);

            $ok['ss'] = "masuk";
            $this->load->view('admin/headeradmin');
            $this->load->view('admin/master/faddagenda', $ok);
            $this->load->view('admin/footeradmin');
        }
    }

}

?>
