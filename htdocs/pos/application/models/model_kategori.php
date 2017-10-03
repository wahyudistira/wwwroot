<?php
class Model_kategori extends CI_Model{
    
    
    
    function tampilkan_data(){
		// echo "<pre>";
        // var_dump($this->session);
		// echo "</pre>";
        return $this->db->get('kategori_barang');
    }
    
  function tampilkan_data_paging($halaman,$batas)
  {
      return $this->db->query("select * from kategori_barang");
  }
    /*
    function post(){
        $data=array(
           'nama_kategori'=>  $this->input->post('kategori')
                    );
        $this->db->insert('kategori_barang',$data);
    }
    */
	
	function post(){
		$kategoriID   = $this->CIT_AUTONUMBER('kategori_barang', 'kategori_id');
		
		$kategoriNama = $this->input->post('kategori');
		
		$sql       = "call sp_kategori_insert(".$kategoriID.",'".$kategoriNama."','".$_SERVER["REMOTE_ADDR"]."','".$this->session->userdata['username']."')";              
		/* ekseskusi stored procedure, dengan memberikan parameter yang dibutuhkan oleh stored procedure */
		$result    = $this->db->query($sql,TRUE)->result();

    }
    
    function edit()
    {
        $data=array(
           'nama_kategori'=>  $this->input->post('kategori')
                    );
        $this->db->where('kategori_id',$this->input->post('id'));
        $this->db->update('kategori_barang',$data);
    }
    
    function get_one($id)
    {
        $param  =   array('kategori_id'=>$id);
        return $this->db->get_where('kategori_barang',$param);
    }
    
    
    function delete($id)
    {
        $this->db->where('kategori_id',$id);
        $this->db->delete('kategori_barang');
    }
	
	public function CIT_AUTONUMBER($table,$where){
		
        // $this->db->select("max(kategori_id) as kategori_id ");
        // $this->db->from($table);
        // // $this->db->like($where,$Parse,'after');
        // $this->db->order_by($where, "desc");
        // $this->db->limit(1, 0);
		
		// $this->db->query("select max(kategori_id) from kategori_barang");
		$sql =  "SELECT MAX(kategori_id) as maxID FROM ".$table."";
		$result =$this->db->query($sql,TRUE)->result();
		$maxID  = $result[0]->maxID;
		return $maxID +1;
		
        // $rslt = $this-> db-> get();
		// $result = $rslt->result_array();
		// $maxID = $result[0]['kategori_id'];
		
		// return $maxID+1;
		
    }
}