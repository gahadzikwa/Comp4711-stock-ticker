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
        $this->data['stocktransactions'] = $this->transactions->getStockTransactions($id);

        foreach($this->movements->headers() as $header)
        {
            if($header !== 'ID' && $header !== 'StockID')
            {
                $temp = array('name' => $header);
                $this->data['movementsheaders'][$header] = $temp;
            }
        }

        foreach($this->transactions->headers() as $header)
        {
            if($header !== 'ID' && $header !== 'StockID')
            {
                $temp = array('name' => ($header !== 'PlayerID' ? $header : 'Player'));
                $this->data['transactionsheaders'][$header] = $temp;
            }
        }

        $this->data['pagebody'] = 'stockhistory';
        $this->render();
    }
}
