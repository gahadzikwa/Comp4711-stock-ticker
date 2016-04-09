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
        if($this->session->userdata('stockcode') == null) {
            $this->stock($this->stocks->all()[0]->code);
        }
        else {
            //$this->stock($this->stocks->all()[0]->code);
            $this->stock($this->session->userdata('stockcode'));
        }
    }

    public function stock($stockcode)
    {
        $this->session->set_userdata(array('$stockcode' => $stockcode));

        $this->data['stocks'] = $this->stocks->all();
        $this->data['stock'] = $this->stocks->get($stockcode)[0];
        $this->data['stockname'] = $this->data['stock']['Name'];
        $this->data['stockvalue'] =$this->data['stock']['Value'] ;
        $this->data['stockcode'] = $this->data['stock']['Code'];

//        $this->data['stockmovements'] = $this->movements->getStockMovements($stockcode);;
//
//        $this->data['stocktransactions'] = array();
//
//        foreach($this->transactions->getStockTransactions($stockcode) as $trans)
//        {
//            $temp = array('DateTime' => $trans['DateTime'],
//                'Player' => $trans['Player'],
//                'Quantity' => $trans['Quantity'],
//                'Trans' => $trans['Quantity'] >= 0 ? 'Buy' : 'Sell');
//
//            $this->data['stocktransactions'][] = $temp;
//        }

        $this->data['pagebody'] = 'stockhistory';
        $this->render();
    }
}
