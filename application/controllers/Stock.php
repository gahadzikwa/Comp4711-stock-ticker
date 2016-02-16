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
        $index = $this->session->userdata('stockindex') > 0 ? $this->session->userdata('stockindex') : 1;
        $this->stock($index);
    }

    public function stock($id)
    {
        $this->session->set_userdata(array('stockindex' => $id));

        $this->data['stocks'] = $this->stocks->all();
        $this->data['stock'] = $this->stocks->get($id)[0];
        $this->data['stockmovements'] = $this->movements->getStockMovements($id);;

        $tempTransactions = array();
        foreach($this->transactions->getStockTransactions($id) as $trans)
        {
            $temp = array('DateTime' => $trans['DateTime'],
                'Player' => $trans['Player'],
                'Quantity' => $trans['Quantity'],
                'Trans' => $trans['Quantity'] >= 0 ? 'Buy' : 'Sell');

            $tempTransactions[] = $temp;
        }

        $this->data['stocktransactions'] = $tempTransactions;

        $this->data['pagebody'] = 'stockhistory';
        $this->render();
    }
}
