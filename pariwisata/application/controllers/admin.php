<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of admin
 *
 * @author phepen
 */
class admin extends CI_Controller {

    //put your code here

    public function __construct() {
        parent::__construct();
        //$this->load->model('model_login');
    }

    function index() {

        $this->load->view('admin/headeradmin');
        $this->load->view('admin/login');
        $this->load->view('admin/footeradmin');
    }

    function getByMenu() {
        $menu = $this->uri->segment(3);
        if ($menu == 'dashboar') {
            $this->load->view('admin/view/fdashbor');
        } elseif ($menu == 'agenda') {
            $this->load->view('admin/view/fagenda');
        } elseif ($menu == 'document') {
            $this->load->view('admin/view/fdocumentr');
        } elseif ($menu == 'struktur') {
            $this->load->view('frontend/struktur');
        }
    }

    function cekLogin() {
        $username = $this->input->post('username');
        $pass = md5($this->input->post('password'));
        foreach ($this->model_login->getAll() as $r):
            if ($username == $r->username && $pass == $r->password) {
                $data = array('ID' => $r->id_admin, 'USERNAME' => $r->username, 'PASS' => $r->password);
                $this->session->set_userdata($data);
                redirect('adm/dashbor');
            } else {
                $this->index();
            }
        endforeach;
    }

    function login_exec() {

        $this->load->model('admin_model');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $query = $this->admin_model->validate_login($username, $password);

        if ($query->num_rows == 1) {
            $row = $query->row();
            $data = array(
                'SESS_ADMIN_CODE' => $row->id,
                'SESS_NAME' => $row->nama,
                
                'ADMIN' => $row->username
            );
           
            $this->session->set_userdata($data);
            redirect('adm/dashbor');
        } else { // incorrect username or password
            $data = array(
                'SESS_LOGIN_STATEMENT' => 'Login Gagal',
                'ERRMSG_ARR' => "Username dan/atau Password salah !"
            );
            $this->session->set_userdata($data);
            redirect('admin');
        }
    }

    function logout()
	{
		$this->session->unset_userdata('SESS_ADMIN_CODE');
		$this->session->unset_userdata('SESS_NAME');
		$this->session->unset_userdata('SESS_EMAIL');
		$this->session->unset_userdata('ERRMSG_ARR');
		$this->session->set_userdata('SESS_LOGIN_STATEMENT', 'Anda Telah Logout ;)');
		redirect('admin');
	}
}

?>
