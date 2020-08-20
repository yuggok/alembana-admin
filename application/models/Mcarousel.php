<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mcarousel extends CI_Model
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

    public function get()
    {
        $data = json_decode($this->curl->simple_get($this->API . '/slide/list'), true);
        return $data['data'];
    }

    public function insert($data)
    {
        $insert =  $this->curl->simple_post($this->API . '/slide/add', $data, array(CURLOPT_BUFFERSIZE => 10));
        if ($insert) {
            $this->session->set_flashdata('hasil', 'Insert Data Berhasil');
        } else {
            $this->session->set_flashdata('hasil', 'Insert Data Gagal');
        }
        redirect('Carousels');
    }

    public function update($data, $id)
    {

        $update =  $this->curl->simple_put($this->API . '/slide/update/' . $id, $data, array(CURLOPT_BUFFERSIZE => 10));
        if ($update) {
            $this->session->set_flashdata('hasil', 'Update Data Berhasil');
        } else {
            $this->session->set_flashdata('hasil', 'Update Data Gagal');
        }
    }
}
