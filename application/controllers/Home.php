<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Application {
    function __construct() {
        parent::__construct();
        $this->load->model('players');
    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{        

        if($this->session->userdata('Player') !== null)
        {
            $this->data['welcome'] = 'Welcome '.$this->session->userdata('Player');
        }
        else
        {
            $this->data['welcome'] = 'Welcome!  Please log in...';
        }

        $this->data['players'] = array();

        foreach( $this->players->all() as $player)
        {
            $temp = array(
                'Player' => $player['Username'],
                'Cash' => $player['Cash'],
                'Equity' => $player['Equity'] !== null ? $player['Equity'] : '0'
            );

            $this->data['players'][] = $temp;
        }

//        $this->data['stocks'] = $this->stocks->all();
        $this->data['pagebody'] = 'home';
        $this->render();
	}
        
        
}
