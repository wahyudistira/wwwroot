<?php
class Page extends CI_Controller {

    function __construct() {
        parent::__construct();
    }
    
    function index(){
        
        $this->load->view('header');
        $this->load->view('frontend/menu');        
        $this->load->view('frontend/contain');
        $this->load->view('footer');
        
    }
    
    
}
?>
