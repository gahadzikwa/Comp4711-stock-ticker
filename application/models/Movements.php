<?php
class Movements extends CI_Model {

    function __contruct() {
        parent::__construct();
    }

    function all() {
        $this->db->order_by('id');
        $query = $this->db->get('movements');

        return $query->result_array();
    }

    function headers()
    {
        return $this->db->list_fields('movements');
    }


    public function getStockMovements($stockId)
    {
        $this->db->select('Datetime,Action,Amount,StockID');
        $this->db->where('StockID = ', $stockId);
        $this->db->order_by('Datetime');
        $query = $this->db->get('movements');
        return $query->result_array();
    }
}
