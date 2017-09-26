<?php

class Kategori_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function insert($data) {
        $insert = $this->db->insert('kategori', $data);
        return $insert;
    }

    function update($id, $data) {
        $this->db->where('id', $id);
        $update = $this->db->update('kategori', $data);
        return $update;
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('kategori');
    }

    function get_all() {
        $query = $this->db->get('kategori');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    function get_by_id($id) {
        $this->db->where('id',$id);
        $query = $this->db->get('kategori');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }
}

?>
