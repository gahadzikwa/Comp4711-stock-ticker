<?php

class Players extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function headers()
    {
        return $this->db->list_fields('players');
    }

    public function all()
    {
        return $this->db->get('players')->result_array();
    }

    public function get($username)
    {
        $this->db->select('*');
        $this->db->where('username=', $username);
        return $this->db->get('players')->row();
    }

    public function getPlayerEquity($username)
    {
        $this->db->select('*');
        $this->db->where('username=', $username);
        $result = $this->db->get('stockdistribution')->result();

        $this->load->model('stocks');
        $stocks = $this->stocks->all();

        $total = 0;

        foreach($result as $r) {

        }

        return $total;
    }
}
