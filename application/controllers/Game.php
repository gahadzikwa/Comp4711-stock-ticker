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
			$this->data['welcome'] = 'Welcome ' . $this->session->userdata('Player');
			$this->data['stocks'] = $this->stocks->all();
			$this->data['pagebody'] = 'gameplay';
			$this->data['players'] = $this->players->all();

//			foreach( $this->players->allPlayersIncludeEquity() as $player)
//			{
//				$temp = array(
//					'ID' => $player['ID'],
//					'Player' => $player['Player'],
//					'Cash' => $player['Cash'],
//					'Equity' => $player['Equity'] !== null ? $player['Equity'] : '0'
//				);
//
//				$this->data['players'][] = $temp;
//			}

		}
		else {
			$this->data['pagebody'] = 'welcome';
		}

		$this->render();
	}
}
