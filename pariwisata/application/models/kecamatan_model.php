<?php
class Kecamatan_model extends CI_Model {

    function __construct() {
        parent::__construct();
        }

        function insert($data){
            $insert=$this->db->insert('kecamatan',$data);
            return $insert;
        }
        
        function update($id,$data){
            $this->db->where('id',$id);
            $upate=$this->db->update('kecamatan',$data);
            return $upate;
        }
        
        function delete($id){
            $this->db->where('id',$id);
            $this->db->delete('kecamatan');
        }
        
        function get_all(){
            $query=$this->db->get('kecamatan');
            if($query->num_rows()>0){
                return $query->result();
            }else{
                return FALSE;
            }
        }
        
        function get_by_id($id){
            $this->db->where('id',$id);
            $query=$this->db->get('kecamatan');
            if($query->num_rows()>0){
                return $query->result();
            }else{
                return FALSE;
            }
        }
}
?>
