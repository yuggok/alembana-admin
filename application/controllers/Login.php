<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    var $API = "";
    public function __construct()
    {
        parent::__construct();
        $this->API = "https://us-central1-reservation-1b2b0.cloudfunctions.net/api";
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('Morder');
    }
    public function index()
    {
        $data['login'] = $this->MLogin->loginin();
        $this->load->view('templates/Header');
        $this->load->view('templates/Sidebar');
        $this->load->view('templates/Topbar');
        $this->load->view('admin/Orderpage', $data);
        $this->load->view('templates/Footer');
    }
}
