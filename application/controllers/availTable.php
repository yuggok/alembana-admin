<?php
defined('BASEPATH') or exit('No direct script access allowed');

class availTable extends CI_Controller
{
    var $API = "";
    public function __construct()
    {
        parent::__construct();

        if (!isset($_SESSION['alembana'])) {
            redirect('Auth');
        }

        $this->API = "https://us-central1-reservation-1b2b0.cloudfunctions.net/api";
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('Mtable');
    }
    public function index()
    {
        $data['meja'] = $this->Mtable->dataTable();
        $this->load->view('templates/Header');
        $this->load->view('templates/Sidebar');
        $this->load->view('templates/Topbar');
        $this->load->view('admin/avTable', $data);
        $this->load->view('templates/Footer');
    }
}
