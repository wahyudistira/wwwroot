<?php
class Smp extends CI_Controller{

    function __construct() {
        parent::__construct();
        }
        
        function index(){
            $this->load->view('header');
            $this->load->view('frontend/menu');        
            $this->load->view('frontend/smp_view');
            $this->load->view('footer');
        }
}
?>
