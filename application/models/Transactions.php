<?php
class Transactions extends CI_Model {

    function __contruct() {
        parent::__construct();
    }

    function all() {
        $this->db->order_by('id');
        $query = $this->db->get('transactions');

        return $query->result_array();
    }

    function headers()
    {
        return $this->db->list_fields('transactions');
    }

    public function getStockTransactions($stockId)
    {
        $this->db->select('*');
        $this->db->from('players');
        $this->db->join('transactions', 'transactions.id = players.id');
        $this->db->where('StockID = ', $stockId);
        $this->db->order_by('Datetime');
        $query = $this->db->get();
        return $query->result_array();
    }

    function getPlayerTransactions($playerId)
    {
        $this->db->select('*');
        $this->db->from('stocks');
        $this->db->join('transactions', 'transactions.id = stocks.id');
        $this->db->where('PlayerID=', $playerId);
        return $this->db->get()->result_array();
    }
}
