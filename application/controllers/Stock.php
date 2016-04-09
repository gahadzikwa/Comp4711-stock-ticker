<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Stock extends Application
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('stocks');
        $this->load->model('movements');
        $this->load->model('transactions');
    }

    public function index()
    {
        $this->stock();
    }

    public function stock($stockcode = null)
    {
        $this->data['stocks'] = $this->stocks->all();

        $stockcode = $stockcode == null ? $this->data['stocks'][0]['code'] : $stockcode;

        $this->data['stockname'] = "FIX ME PLS";

        // get stock movements
        $this->data['stockmovements'] = $this->movements->getStockMovements($stockcode);

        // get stock transactions
        $this->data['stocktransactions'] = $this->transactions->getStockTransactions($stockcode);

        // load stockhistory view
        $this->data['pagebody'] = 'stockhistory';
        $this->render();
    }
}
