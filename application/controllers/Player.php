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
        $this->player($this->session->userdata('user')->Username);
    }

    public function player($username) {

        $this->data['playerList'] = $this->players->all();
        $user = $this->players->get($username);
        $this->data['current_player_username'] = $user->Username;
        $this->data['current_player_cash'] = $user->Cash;

//        $this->data['playerEquity'] = number_format($this->players->getPlayerEquity($username)[0]["Equity"]);
//
        $this->data['holdings'] = $this->stocks->getPlayerStocks($username);
//
//        $tempTransactions = array();
//
//        foreach($this->transactions->getPlayerTransactions($username) as $trans)
//        {
//            $temp = array('DateTime' => $trans['DateTime'],
//                          'Name' => $trans['Name'],
//                          'Quantity' => $trans['Quantity'],
//                          'Trans' => $trans['Quantity'] >= 0 ? 'Buy' : 'Sell');
//
//             $tempTransactions[] = $temp;
//        }
//
//        $this->data['transactions'] = $tempTransactions;


        $this->data['pagebody'] = 'player';
        $this->render();
    }
    
}
