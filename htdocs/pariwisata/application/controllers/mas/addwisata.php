<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of addarchive
 *
 * @author phepen
 */
class Addwisata extends Ci_Controller {

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
        $data['kategori']=  $this->kategori_model->get_all();
        $data['kecamatan']=  $this->kecamatan_model->get_all();
        
        $this->load->view('admin/headeradmin');
        $this->load->view('admin/master/faddwisata',$data);
        $this->load->view('admin/footeradmin');
    }

    function add() {


        $config['upload_path'] = './uploads';
        $config['allowed_types'] = 'jpg|jpeg|gif|png|JPG';
        $config['max_size'] = '4000';
        $config['max_width'] = '2000';
        $config['max_height'] = '2000';
        $config['remove_spaces'] = TRUE;

        $this->load->library('upload', $config);
        $data = $this->upload->do_upload('gambar');
        $file = $this->upload->data();
        $uploadedFiles = $file['file_name'];
       
        $data = array(
            'id_kategori' => $this->input->post('kategori'),
            'id_kecamatan' => $this->input->post('kecamatan'),
            'gambar' => $uploadedFiles,
            'nama_obyek' => $this->input->post('nama'),
            'lokasi_obyek' => $this->input->post('lokasi'),
            'jarak' => $this->input->post('jarak'),
            'akomodasi' => $this->input->post('akomodasi'),
            'keterangan' => $this->input->post('keterangan')
        );
        $this->wisata_model->insert($data);

        //$this->index();
        redirect('adm/dashbor');
    }

}

?>
