<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends Application {

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
        $this->load->model('players');
        $this->data['pagebody'] = 'login';
        $this->render();
    }

    public function submitLogin()
    {
        $this->load->model('players');
        $this->load->helper('url');

        $data = array(
            'user_name' => $this->input->post('username'),
            'user_email_id' => $this->input->post('password')
        );

        $players = $this->players->all();

        foreach($players as $player)
        {
            if($player['Player'] == $data['user_name'])
            {
                redirect('/Home', 'refresh');
            }
        }

        $this->data['pagebody'] = 'login';
        $this->render();
    }
}
