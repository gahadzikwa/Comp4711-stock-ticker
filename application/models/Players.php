<?php

class Players extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get($which)
    {

    }

    public function all()
    {
        $query = $this->db->get('players');

        return $query->result_array();
    }

    public function GetPlayer($id)
    {
        $sql = "SELECT * FROM players WHERE ID = ?";
        
        $query = $this->db->query($sql, array($id));

        return $query->result_array();
    }
}
