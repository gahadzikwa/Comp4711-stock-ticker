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
                if ($this->session->userdata('user') == null) {
                    redirect('/account/login','refresh');
                }
		if ($this->session->userdata('user') !== null) {
			if($this->session->userdata('user')->Role == ROLE_ADMIN) {
				redirect('agent/management');
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

	public function game_status() {
		$this->load->model('Gamestatus');

		// 1. initialize
		$curly = curl_init();

		// 2. set the options, including the url
		curl_setopt($curly, CURLOPT_URL, BSX_URL . 'status');
		curl_setopt($curly, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curly, CURLOPT_HEADER, 0);

		// 3. execute and fetch the resulting HTML output
		$response = curl_exec($curly);

		// 4. free up the curl handle
		curl_close($curly);

		$xml_resp = new SimpleXMLElement($response);

		$gamestatus = new GameStatus(
			$xml_resp->state->__toString(),
			$xml_resp->round->__toString(),
			$xml_resp->countdown->__toString(),
			$xml_resp->desc->__toString()
		);

		header('Content-Type: application/json');
		echo json_encode( $gamestatus );
	}

	public function get_stocks() {
		$result = $this->stocks->all();

		header('Content-Type: application/json');
		echo json_encode( $result );
	}

	public function get_players() {
		$result = $this->players->all();

		header('Content-Type: application/json');
		echo json_encode( $result );
	}
}
