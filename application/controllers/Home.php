<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Application {

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
        $this->load->model('stocks');
        $this->load->model('players');

        foreach($this->stocks->headers() as $header)
        {
            if($header !== 'ID')
            {
                $temp = array('column' => $header);
                $this->data['stocksheaders'][$header] = $temp;
            }
        }

        foreach($this->players->headers() as $header)
        {
            if($header !== 'ID')
            {
                $temp = array('column' => $header);
                $this->data['playersheaders'][$header] = $temp;
            }
        }

        if($this->session->userdata('Player') !== null)
        {
            $this->data['welcome'] = 'Welcome '.$this->session->userdata('Player');
        }
        else
        {
            $this->data['welcome'] = 'Welcome!  Please log in...';
        }

        $this->data['players'] = $this->players->all();
        $this->data['stocks'] = $this->stocks->all();
        $this->data['pagebody'] = 'home';
        $this->render();
	}
        
        
}
