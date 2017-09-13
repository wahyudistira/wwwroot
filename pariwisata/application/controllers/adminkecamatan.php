<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of adminkecamatan
 *
 * @author phepen
 */
class adminkecamatan extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    function index() {



        $this->load->view('admin/headeradmin');
        $this->load->view('adminkec/login');
        $this->load->view('admin/footeradmin');
    }

    function login_exec() {

        $this->load->model('user_model');
        $pin = $this->input->post('pin');
        $query = $this->user_model->validate_login($pin);

        if ($query->num_rows == 1) {
            $row = $query->row();
            $data = array(
                'SESS_ADMIN_CODE' => $row->id,
                'SESS_NAME' => $row->pin,
                'ADMIN' => $row->id_kecamatan
            );

            $this->session->set_userdata($data);
            redirect('adminkec/dashbor');
        } else { // incorrect username or password
            $data = array(
                'SESS_LOGIN_STATEMENT' => 'Login Gagal',
                'ERRMSG_ARR' => "Username dan/atau Password salah !"
            );
            $this->session->set_userdata($data);
            redirect('adminkecamatan');
        }
    }
    
    function logout()
	{
		$this->session->unset_userdata('SESS_ADMIN_CODE');
		$this->session->unset_userdata('SESS_NAME');
		$this->session->unset_userdata('SESS_EMAIL');
		$this->session->unset_userdata('ERRMSG_ARR');
		$this->session->set_userdata('SESS_LOGIN_STATEMENT', 'Anda Telah Logout ;)');
		redirect('adminkecamatan');
	}

}

?>
