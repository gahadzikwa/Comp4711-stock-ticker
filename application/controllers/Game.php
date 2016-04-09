<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Game extends Application {

	function __construct() {
		parent::__construct();
		$this->load->model('stocks');
		$this->load->model('players');
	}

	public function index()
	{
		if ($this->session->userdata('user') !== null) {
			if($this->session->userdata('user')->Role == ROLE_ADMIN) {
				$this->data['pagebody'] = 'management';
			}
			else {
				$user = $this->session->userdata('user');

				$this->data['pagebody'] = 'gameplay';
				$this->data['stocks'] = $this->stocks->all();
				$this->data['my_stocks'] = $this->stocks->getPlayerStocks($user->Username);
				$this->data['current_player_username'] = $user->Username;
				$this->data['current_player_cash'] = $user->Cash;
				$this->data['current_player_equity'] = number_format($this->players->getPlayerEquity($user->Username));
				$this->data['curent_player_avatar'] = $user->Avatar;
			}
		}
		else {
			$this->data['pagebody'] = 'welcome';
		}

		$this->render();
	}
}
