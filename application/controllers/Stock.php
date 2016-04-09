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
        // TODO: Replace magic 1 with a method to find the highest ID
        $index = $this->session->userdata('stockindex') > 0 ? $this->session->userdata('stockindex') : 1;
        $this->stock($index);
    }

    public function stock($id)
    {
        $this->session->set_userdata(array('stockindex' => $id));

        // get stock information
        $this->data['stockname'] = "FIX ME PLS";

        $this->data['stocks'] = $this->stocks->all();

        // get stock movements
        $this->data['stockmovements'] = $this->movements->getStockMovements($id);

        // get stock transactions
        $this->data['stocktransactions'] = $this->transactions->getStockTransactions($id);

        // load stockhistory view
        $this->data['pagebody'] = 'stockhistory';
        $this->render();
    }
}
