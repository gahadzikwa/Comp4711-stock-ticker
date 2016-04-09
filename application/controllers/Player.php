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

        $user = $this->players->get($username);

        $this->data['playerList'] = $this->players->all();
        $this->data['current_player_username'] = $user->Username;
        $this->data['current_player_cash'] = $user->Cash;
        $this->data['current_player_equity'] = number_format($this->players->getPlayerEquity($username));
        $this->data['holdings'] = $this->stocks->getPlayerStocks($username);
        $this->data['transactions'] = $this->transactions->getPlayerTransactions($username);

        $this->data['pagebody'] = 'player';
        $this->render();
    }
    
}
