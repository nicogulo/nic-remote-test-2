<?php


if (!defined('BASEPATH')) exit('No direct script access allowed');

class History extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MKriteria');
        $this->load->model('MNilai');
        $this->load->model('MPelatihan');
        $this->load->model('MSAW');
        $this->page->setTitle('Rangking');
    }

    public function index(){

        $data["history"] = $this->MNilai->getHistory();

        loadPage('history/index',$data);
    }



}