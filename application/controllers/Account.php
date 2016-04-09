<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends Application {

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('players');
        $this->load->helper('form');
//        $this->load->library('upload');
    }
    public function index()
    {
        $this->data['pagebody'] = 'login';
        $this->render();
    }

    // TODO: This is just for testing purposes. Need to properly handle sessions with encryption, etc
    public function submitLogin()
    {
        $data = $this->input->post('username');
        $player = $this->players->get($data);
        if($player == null) 
        {
            redirect('/Account','refresh');
        }
        if (password_verify($this->input->post('password'),$player->Password)) 
        {
            $this->session->set_userdata('username',$data);
            $this->session->set_userdata('userrole',$player->Role);
        } else 
        {
            redirect('/Account','refresh');
        }
        redirect('/Home', 'refresh');
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
        $data = $this->input->post('username');
        if($data == null) 
        {
            //redirect('/Account/register','refresh');
        } 
        $player = $this->players->get($data);
        
        if($player != null) 
        {
            //redirect('/Account/register','refresh');
        } 
        
        $config['upload_path'] = 'assets/images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '0';
        $config['max_width'] = '0';
        $config['max_height'] = '0';
        var_dump($config);
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
        redirect('/Home', 'refresh');
    }
}
