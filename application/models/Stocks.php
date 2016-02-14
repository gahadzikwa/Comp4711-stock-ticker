<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stocks extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getStockList()
    {
        $query = $this->db->get('stocks');
        $result = $query->result_array();

        return $result;

    }

    public function getStockMovements($id)
    {

        $this->db->select('Datetime,Action,Amount,StockID');
        $this->db->where('StockID = ', $id);
        $this->db->order_by('Datetime');
        $query = $this->db->get('movements');

        return $query->result_array();

    }

    public function getStockTransactions($id)
    {


        $this->db->select('*');
        $this->db->from('players');
        $this->db->join('transactions', 'transactions.id = players.id');
        $this->db->where('StockID = ', $id);
        $this->db->order_by('Datetime');
        $query = $this->db->get();

        return $query->result_array();

    }


}