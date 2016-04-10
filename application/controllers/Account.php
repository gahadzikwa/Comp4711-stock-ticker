<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends Application {

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('players');
        $this->load->helper('form');
    }

    public function login()
    {
        $this->data['pagebody'] = 'login';
        $this->render();
    }

    // TODO: This is just for testing purposes. Need to properly handle sessions with encryption, etc
    public function submitLogin()
    {
        $data = strtolower($this->input->post('username'));

        if($data == null)
        {
            redirect('/account','refresh');
        }

        $player = $this->players->get($data);

        if($player == null)
        {
            redirect('/account','refresh');
        }

        if (password_verify($this->input->post('password'),$player->Password)) 
        {
            $this->session->set_userdata('user', $player);
        }
        else
        {
            redirect('/account','refresh');
        }

        redirect('/game', 'refresh');
    }
    
    public function register() 
    {
        $this->data['pagebody'] = 'register';
        $this->render();
    }
    /*
     * Registers a user only if username is unique.
     * Redirects to home page and logs in if successful.
     * Otherwise, refresh current page.
     */
    public function submitRegister() 
    {        
        $data = strtolower($this->input->post('username'));

        if($data == null)
        {
            redirect('/account/register','refresh');
        }

        $player = $this->players->get($data);
        
        if($player != null) 
        {
            redirect('/account/register','refresh');
        } 
        
        $config['upload_path'] = 'assets/images/avatars';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '0';
        $config['max_width'] = '0';
        $config['max_height'] = '0';

        $this->load->library('upload');
        $this->upload->initialize($config);
        
        if(!$this->upload->do_upload()) {
            
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('register',$error);
            
        }
        else 
        {
            
            $data = array(
                'Username' => $data,
                'Password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'Role' => 'User',
                'Cash' => 1000,
                'Avatar' => $this->upload->data()['full_path']
            );
            
            $this->db->insert('players', $data);   
            $this->submitLogin();
        }        
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('/game', 'refresh');
    }
}
