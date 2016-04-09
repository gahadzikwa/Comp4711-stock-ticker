<?php

class StockDistribution extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function headers()
    {
        return $this->db->list_fields('stockdistribution');
    }

    public function all()
    {
        return $this->db->get('stockdistribution')->result_array();
    }
}
