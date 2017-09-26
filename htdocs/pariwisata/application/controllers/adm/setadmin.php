<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of setadmin
 *
 * @author phepen
 */
class setadmin extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        
    }

    function index() {
       
            $this->load->view('admin/headeradmin');
            $this->load->view('admin/view/fadmin');
            $this->load->view('admin/footeradmin');
      
    }
    
    function edit(){
        $p1 = md5($this->input->post('pass1'));
        $p2 = $this->input->post('pass2');
        $p3 = $this->input->post('pass3');
        $pasli = $this->session->userdata('PASS');
        $id=1;
        if(($pasli == $p1) && ($p2 == $p3)){
            $dataAdmin = array('password' => md5($p2));
            $this->model_login->editAdmin($id,$dataAdmin);
            $data['ss']="masuk";
            $data['dd']=$this->session->userdata('USERNAME');
            $this->load->view('admin/headeradmin');
            $this->load->view('admin/view/fadmin',$data);
            $this->load->view('admin/footeradmin');
        }else{
            $data['ss']="gagal";
            $data['dd']=$this->session->userdata('USERNAME');
            $this->load->view('admin/headeradmin');
            $this->load->view('admin/view/fadmin',$data);
            $this->load->view('admin/footeradmin');
        }
        
        
    }

}

?>
