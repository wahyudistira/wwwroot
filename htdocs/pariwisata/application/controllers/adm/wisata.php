<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of archive
 *
 * @author phepen
 */
class wisata extends CI_Controller {

    //put your code here

    public function __construct() {
        parent::__construct();
        $this->load->library('auth');
        $this->auth->check_user_authentification();
        $this->load->model('wisata_model');
    }

    function index() {
        $data['data']=  $this->wisata_model->get_all_wisata();
        $this->load->view('admin/headeradmin');
        $this->load->view('admin/view/fwisata',$data);
        $this->load->view('admin/footeradmin');
    }

    function filter() {
        if ($this->session->userdata('USERNAME') == TRUE && $this->session->userdata('PASS') == TRUE) {
            $id = $this->input->post('action');

            $data['ss'] = "";
            $data['all'] = $this->model_archive->getByJudul($id);
            $data['jdl'] = $this->model_archive->judulAll();

            $this->load->view('admin/headeradmin');
            $this->load->view('admin/view/farchive', $data);
            $this->load->view('admin/footeradmin');
        } else {
            redirect('admin/index');
        }
    }

    function delete() {
        $id = $this->uri->segment(4);
        $this->model_archive->delete($id);

        $data['all'] = $this->model_archive->joinAll();
        $data['jdl'] = $this->model_archive->judulAll();
        $data['ss'] = "hapus";
        $this->load->view('admin/headeradmin');
        $this->load->view('admin/view/farchive', $data);
        $this->load->view('admin/footeradmin');
    }

    function update(){
        $id=  $this->input->post('id');
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
        if ($uploadedFiles == "") {
                $uploadedFiles = $this->input->post('gambar2');
            }
       
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
        $this->wisata_model->update($id,$data);

        //$this->index();
        redirect('adm/dashbor');
    }
}

?>
