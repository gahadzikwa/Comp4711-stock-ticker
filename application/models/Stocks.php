<?php
class Stocks extends CI_Model {

    function __contruct() {
        parent::__construct();
    }
    
    function all() {
        $this->db->select('*');
        $this->db->order_by("id");
        $query = $this->db->get('stocks');

        return $query->result_array();
    }

    function headers()
    {
        return $this->db->list_fields('stocks');
    }

    function get($id)
    {
        $this->db->select('*');
        $this->db->where('ID=', $id);
        return $this->db->get('stocks')->result_array();
    }
}
