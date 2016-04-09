<?php

/**
 * core/MY_Controller.php
 *
 * Default application controller
 *
 * @author		JLP
 * @copyright           2010-2013, James L. Parry
 * ------------------------------------------------------------------------
 */
class Application extends CI_Controller {

    protected $data = array();	  // parameters for view components
    protected $id;				  // identifier for our content
    /**
     * Constructor.
     * Establish view parameters & load common helpers
     */
    function __construct()
    {
        parent::__construct();
        $this->data = array();
        $this->errors = array();
        $this->data['title'] = 'Stock Ticker';

        if($this->session->userdata('user') !== null)
        {
			$this->data['menu_items'] = array(
				array('name' => "Game", 'link' => '/game'),
				array('name' => "Players", 'link' => '/player'),
				array('name' => "Stocks", 'link' => '/stock'),
				array('name' => "Sign Out", 'link' => '/account/logout')
			);
        }
        else
        {
			$this->data['menu_items'] = array(
				array('name' => "Welcome", 'link' => '/game'),
				array('name' => "Register", 'link' => '/account/register'),
				array('name' => "Sign In", 'link' => '/account/login'),
			);
        }
        $this->data['sidemenu'] = $this->parser->parse('_sidemenu', $this->data, true);
    }   

    /**
     * Render this page
     */
    function render()
    {
        $this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
        // finally, build the browser page!
        $this->data['data'] = &$this->data;
        $this->parser->parse('_template', $this->data);
    }
}

/* End of file MY_Controller.php */
/* Location: application/core/MY_Controller.php */