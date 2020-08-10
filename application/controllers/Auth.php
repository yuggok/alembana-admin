<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
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
    }

    public function index()
    {
        $this->load->view('templates/Auth_header');
        $this->load->view('Login');
        $this->load->view('templates/Auth_footer');
    }

    public function login()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'name'       =>  $this->input->post('uname'),
                'password'      =>  $this->input->post('pass')
            );
            $login = $this->curl->simple_post($this->API . '/user/login', $data, array(CURLOPT_BUFFERSIZE => 10));
            if ($login) {
                redirect('Admin');
            } else {
                redirect('Auth');
            }
        } else {
            redirect('Auth');
        }
    }
}
