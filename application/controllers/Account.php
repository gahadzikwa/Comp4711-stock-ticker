<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends Application {

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

        $players = $this->players->login($data['username'], $data['password']);
        $player = count($players) > 0 ? $players[0] : null;

        if($player !== null)
        {
            $this->session->set_userdata($player);
            redirect('/Home', 'refresh');
        }

        redirect('/Account', 'refresh');
    }

    public function logout()
    {
        $this->session->unset_userdata('ID');
        $this->session->unset_userdata('Player');

        // TODO: Add password in later
//        $this->session->unset_userdata('Password');

        redirect('/Home', 'refresh');
    }
}
