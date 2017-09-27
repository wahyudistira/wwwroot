<?php
class dashboard extends CI_Controller{
    
	
	function __construct() {
        parent::__construct();
        $this->load->model(array('model_dashboard'));
        chek_session();
    }
    
    function index(){
        chek_session();
		$data['record']=  $this->model_dashboard->dailytransaction();
		// var_dump($data['record']);
		// var_dump($data);
		// exit;
        $this->template->load('template','v_dashboard',$data);
    }
	
	// function dailyreport(){
			// // $data['barang']=  $this->model_barang->tampil_data();
            // // $data['detail']= $this->model_transaksi->tampilkan_detail_transaksi()->result();
			// $data['record']=  $this->model_transaksi->dailytransaction();
            // $this->template->load('template','v_dashboard',$data);
		
	// }
}