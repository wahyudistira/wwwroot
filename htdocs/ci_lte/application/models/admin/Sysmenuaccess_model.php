<?php
class Sysmenuaccess_model extends ci_model{
    
    
    function tampildata()
    {
        $query= "SELECT
						s.id as id, g.name as namegroup, m.menu_name					
				FROM sys_menu_access s 
					INNER JOIN groups g ON s.idsysgroup = g.id
					INNER JOIN sys_menu m ON s.idsysmenu = m.id";
        return $this->db->query($query);
    }
	
	function tampilkan_data_paging($halaman,$batas)
  {	
		$sql ="SELECT
						s.id as id, g.name as namegroup, m.menu_name					
				FROM sys_menu_access s 
					INNER JOIN groups g ON s.idsysgroup = g.id
					INNER JOIN sys_menu m ON s.idsysmenu = m.id";
        
		return $this->db->query($sql);
  }
  
	  function getdatagroup(){
		  $sql ="SELECT s.id, s.name
				 FROM groups s 
				 WHERE TRUE
				 ";        
			return $this->db->query($sql);
		  
	  }
	  function getdatamenu(){
		  $sql ="SELECT s.id, s.menu_name 
				 FROM sys_menu s 
				 WHERE TRUE
				 ";        
			return $this->db->query($sql);
		  
	  }
    
    function post($data)
    {	
		// var_dump($data['idsysgroup']);exit;
		
		$idsysgroup     = $this->getIdgroups($data);
		$idsysmenu      = $this->getIdmenus($data);
        $data           = array('idsysgroup'=>$idsysgroup,
                                'idsysmenu'=>$idsysmenu);		
        $this->db->insert('sys_menu_access',$data);
    }
	
    
    function get_one($id)
    {
        $param  =   array('sys_menu_access'=>$id);
        return $this->db->get_where('sys_menu_access',$param);
    }
    
    function edit($data,$id)
    {
        $this->db->where('sys_menu_access',$id);
        $this->db->update('sys_menu_access',$data);
    }
    
    
    function delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('sys_menu_access');
    }
	
	function getIdgroups($data){
		$idsysgroup     = $this->db->get_where('groups',array('name'=>$data['idsysgroup']))->row_array();
		return  $idsysgroup['id'];		
	}
	
	function getIdmenus($data){
		$idsysmenu = $this->db->get_where('sys_menu',array('menu_name'=>$data['idsysmenu']))->row_array();
		return  $idsysmenu['id'];		
	}
	
	function getMenusaccess($id){
		$query = "
			SELECT 
				s.id,
				g.`name` as group_name, 
				m.menu_name as menu_name
			FROM
				sys_menu_access s LEFT JOIN groups g ON s.idsysgroup = g.id
			INNER JOIN sys_menu m ON s.idsysmenu = m.id
			WHERE s.id='".$id."'";
		return  $this->db->query($query)->result();		
	}
	 public function checkDuplicateData($data) {
			$query = "SELECT * FROM sys_menu_access  WHERE idsysgroup='".$this->getIdgroups($data)."' and idsysmenu='".$this->getIdmenus($data)."'";
			$count_row = $this->db->query($query)->num_rows();
			if ($count_row > 0) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
}