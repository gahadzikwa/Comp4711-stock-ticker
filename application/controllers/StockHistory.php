<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class StockHistory extends Application
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('stocks');
    }

    public function index()
    {
        $this->data['pagebody'] = 'stockhistory';
        //var_dump($this->stocks->get_stock_list());
        $data['stock'] = $this->stocks->get_stock_list();


        // validate stock option
        //$this->form_validation->set_rules('stock', 'Stock', 'callback_combo_check');

//
//        $this->load->model('stocks');
//        $pix = $this->stocks->get_stock_list();
//        var_dump($pix);
////        $data['stock_list'] = $pix;
////        $this->load->view('history', $data);

        $this->render();
    }


}