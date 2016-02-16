<?php

class Players extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }


    public function all()
    {
        return $this->db->get('players')->result_array();
    }

    function headers()
    {
        return $this->db->list_fields('players');
    }

    public function get($id)
    {
        $this->db->select('*');
        $this->db->where('ID=', $id);
        return $this->db->get('players')->result_array();
    }

    public function login($username, $password)
    {
        $this->db->select('*');
        $this->db->where('Player=', $username);
        //TODO: Add password where clause later
        
        return $this->db->get('players')->result_array();
    }
}
