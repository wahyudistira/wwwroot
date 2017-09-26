<?php

class User_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function validate_login($pin) {
        $this->db->where('pin', $pin);
        
        $query = $this->db->get('user');

        return $query;
    }

    function insert($data) {
        $insert = $this->db->insert('user', $data);
        return $insert;
    }

    function update($id, $data) {
        $this->db->where('id', $id);
        $update = $this->db->update('user', $data);
        return $update;
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('user');
    }

    function get_all() {
        $query = $this->db->get('user');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    function get_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('user');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    function get_all_user() {
        $string = "select kecamatan.nama as nama,user.pin as pin,user.id as id from kecamatan,user where kecamatan.id=user.id_kecamatan";
        $query = $this->db->query($string);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

}

?>
