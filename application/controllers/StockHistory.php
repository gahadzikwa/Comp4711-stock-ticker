<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class StockHistory extends Application
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('stocks');
    }

    public function index()
    {
        $this->stockDropdownList();

        $this->data['pagebody'] = 'stockhistory';

       $this->render();
    }

    function stockDropdownList()
    {
        $stockloader = $this->stocks->getStockList();
        $stocks = array();
        foreach($stockloader as $tempstock) {
            $temp = array(
                'id' => $tempstock['ID'],
                'code' => $tempstock['Code'],
                'name' => $tempstock['Name'],
                'category' => $tempstock['Category'],
                'value' => $tempstock['Value']
            );
            $stocks[$tempstock['ID']] = $temp;
        }
        $this->data['stocks'] = $stocks;
    }


    public function stock($id)
    {

        $this->load->model('stocks');

        $this->stockDropdownList();

        $stockMovements = $this->stocks->getStockMovements($id);
        $this->data['stockmovements'] = $stockMovements;

        $stockTransactions = $this->stocks->getStockTransactions($id);
        $this->data['stocktransactions'] = $stockTransactions;

        $this->data['pagebody'] = 'stockhistory';

        $this->render();

    }


}
