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
        if ($this->session->userdata('user') == null) {
            redirect('/account/login','refresh');
        }
        $this->stock();
    }

    public function stock($stockcode = null)
    {
        // get stock code for current page
        $stockcode = $stockcode == null ? $this->data['stocks'][0]['code'] : $stockcode;

        $this->data['stocks'] = $this->stocks->all();

        // get stock name
        $this->data['stockname'] = $this->stocks->getStockName($stockcode, "stockname");

        // get stock code
        $this->data['stockcode'] = $this->stocks->getStockName($stockcode, "stockcode");
        
        // get stock value
        $this->data['stockvalue'] = $this->stocks->getStockName($stockcode, "stockvalue");

        // get value for stock list
        $this->data['stocks'] = $this->stocks->all();


        // get stock movements
        $this->data['stockmovements'] = $this->movements->getStockMovements($stockcode);

        // get stock transactions
        $this->data['stocktransactions'] = $this->transactions->getStockTransactions($stockcode);

        // load stockhistory view
        $this->data['pagebody'] = 'stockhistory';
        $this->render();
    }
}
