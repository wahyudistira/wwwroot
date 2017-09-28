<?php
class dynamic_menu extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_dynamic_menu');
        chek_session();
    }
    
    function menu(){
        $this->data['menus'] = $this->model_dynamic_menu->tampil_data();
		var_dump($this->data);
		$this->template->load('template',$this->data);
		
		// $this->load->view('template', $this->data);
        // $this->template->load('index', $this->data);
    }
    
}