<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Player extends Application
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('players');
        $this->load->model('stocks');
        $this->load->model('transactions');
    }

    public function index()
    {
        $index = $this->session->userdata('ID') !== null ? $this->session->userdata('ID') : 1;
        $this->player($index);
    }

    public function player($id)
    {
        $this->data['players'] = $this->players->all();

        $this->data['player'] = $this->players->get($id)[0]['Player'];

        $this->data['holdings'] = $this->stocks->getPlayerStocks($id);

        $tempTransactions = array();
        foreach($this->transactions->getPlayerTransactions($id) as $trans)
        {
            $temp = array('DateTime' => $trans['DateTime'],
                          'Name' => $trans['Name'],
                          'Quantity' => $trans['Quantity'],
                          'Trans' => $trans['Quantity'] >= 0 ? 'Buy' : 'Sell');

             $tempTransactions[] = $temp;
        }

        $this->data['transactions'] = $tempTransactions;

        $this->data['pagebody'] = 'player';
        
        $this->render();
    }
    
}
