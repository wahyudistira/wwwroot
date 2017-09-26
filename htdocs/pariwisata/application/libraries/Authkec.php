<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Authkec {
    
    var $CI = null;

	function Authkec()
	{
		$this->CI =& get_instance();
		$this->CI->load->database();
	}

    function check_user_authentification($admin_only = 0) {
        $CI = & get_instance();
        $CI->load->library('session');
        if (!$CI->session->userdata('SESS_ADMIN_CODE')) {
            $data = array(
                'SESS_LOGIN_STATEMENT' => 'Akses Ditolak',
                'ERRMSG_ARR' => 'Anda harus login terlebih dahulu !'
            );
            $CI->session->set_userdata($data);
            redirect('adminkecamatan');
        } elseif ($admin_only && (!$CI->session->userdata('ADMIN'))) {
            $data = array(
                'SESS_LOGIN_STATEMENT' => 'Akses Ditolak',
                'ERRMSG_ARR' => 'Anda harus login sebagai admin untuk dapat mengakses bagian management'
            );
            $CI->session->set_userdata($data);
            redirect('adminkecamatan');
        }
    }

    function setChaptcha() {
       $this->CI->config->load('config');
		$this->CI->load->helper('string');
		$this->CI->load->plugin('captcha');
        $captcha_url = $this->CI->config->item('captcha_url');
        $captcha_path = $this->CI->config->item('captcha_path');
        $vals = array(
            'img_path' => $captcha_path,
            'img_url' => $captcha_url,
            'expiration' => 3600, // one hour
            'font_path' => './system/fonts/georgia.ttf',
            'img_width' => '140',
            'img_height' => 30,
            'word' => random_string('numeric', 6),
        );
        $cap = create_captcha($vals);
        $capdb = array(
            'captcha_id' => '',
            'captcha_time' => $cap['time'],
            'ip_address' => $this->CI->input->ip_address(),
            'word' => $cap['word']
        );
        $query = $this->CI->db->insert_string('captcha', $capdb);
        $this->CI->db->query($query);
        $data['cap'] = $cap;
        return $data;
    }

}

?>
