<?php
class Busstation extends CI_Controller{

    function __construct() {
        parent::__construct();
        }
        
        function index(){
            $this->load->view('header');
            $this->load->view('frontend/menu');        
            $this->load->view('frontend/busstation_view');
            $this->load->view('footer');
        }
}
?>
