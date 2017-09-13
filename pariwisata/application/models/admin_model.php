<?php

class Admin_model extends CI_Model {

    function __construct() {
        parent::__construct();
        }

        function validate_login($username, $password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		
		$query = $this->db->get('admin');
		
		return $query;
	}
        
        function add($data){
            $insert=$this->db->insert('admin',$data);
            return $insert;
        }
        
        function cari_email($id)
	{
		$this->db->where('email', $id);
		
		
		$query = $this->db->get('admin');

		if ($query->num_rows() > 0)
		{
			return $query->row_array();
		}
		else
		{
			return FALSE;
		}
	}
        
        function update_data($id,$data)
	{
		$this->db->where('codeadmin', $id);
		$update = $this->db->update('admin', $data);
		return $update;
	}

	function delete_data($id){
		$this->db->where('codeadmin', $id);
		$delete = $this->db->delete('admin');
		return $delete;
	}
        
        function get_all(){
            $query = $this->db->get('admin');
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return FALSE;
		}
        }
        
        function get_data_by_id($id)
	{
		$this->db->where('codeadmin', $id);
		$query = $this->db->get('admin');
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return FALSE;
		}
	}
        
        function get_data_by_name($name)
	{
		$this->db->where('nama', $name);
		$query = $this->db->get('admin');
		if ($query->num_rows() > 0)
		{
			return $query->row_array();
		}
		else
		{
			return FALSE;
		}
	}
        
        function reset($username,$data){
            $this->db->where('username',$username);
            $update=$datadb->update('admin',$data);
            return $update;
        }
}
?>
