<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Muser extends CI_Model
{
    var $API = "";
    public function __construct()
    {
        parent::__construct();
        $this->API = "https://us-central1-reservation-1b2b0.cloudfunctions.net/api";
        $this->load->library('session');
        $this->load->library('Curl');
        $this->load->helper('form');
        $this->load->helper('url');
    }

    public function dataUser()
    {
        $data = json_decode($this->curl->simple_get($this->API . '/user/list'), true);
        return $data['data'];
    }
    public function insertUser($data)
    {
        $insert =  $this->curl->simple_post($this->API . '/user/add', $data, array(CURLOPT_BUFFERSIZE => 10));
        if ($insert) {
            $this->session->set_flashdata('hasil', 'Insert Data Berhasil');
        } else {
            $this->session->set_flashdata('hasil', 'Insert Data Gagal');
        }
        redirect('User');
    }
}
