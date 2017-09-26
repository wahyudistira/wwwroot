<?php
class Pageadmin {

    function __construct() {
        parent::__construct();
        }
        
        function index(){
            $this->load->view('admin/headeradmin');
            $this->load->view('admin/login');
            $this->load->view('admin/footeradmin');
        }
}
?>
