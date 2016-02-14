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
        $this->data['pagebody'] = 'login';
        $this->render();
    }

    // TODO: This is just for testing purposes. Need to properly handle sessions with encryption, etc
    public function submitLogin()
    {
        $this->load->model('players');

        $data = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
        );

        // TODO: Create a function fo find a player using ussername + password in Player model
        $players = $this->players->all();
        foreach($players as $player)
        {
            if($player['Player'] == $data['username'])
            {
                $this->session->set_userdata($data);
                redirect('/Home', 'refresh');
            }
        }

        redirect('/Account', 'refresh');
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('password');


        redirect('/Home', 'refresh');
    }
}
