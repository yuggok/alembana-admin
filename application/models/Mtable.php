<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mtable extends CI_Model
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

    public function dataTable()
    {
        $data = json_decode($this->curl->simple_get($this->API . '/table/list'), true);
        return $data['data'];
    }

    public function insertTable($data)
    {
        $insert =  $this->curl->simple_post($this->API . '/table/add', $data, array(CURLOPT_BUFFERSIZE => 10));
        if ($insert) {
            $this->session->set_flashdata('hasil', 'Insert Data Berhasil');
        } else {
            $this->session->set_flashdata('hasil', 'Insert Data Gagal');
        }
        redirect('Table');
    }

    public function editTable($data, $id)
    {

        $update =  $this->curl->simple_put($this->API . '/table/update/' . $id, $data, array(CURLOPT_BUFFERSIZE => 10));
        if ($update) {
            $this->session->set_flashdata('hasil', 'Update Data Berhasil');
        } else {
            $this->session->set_flashdata('hasil', 'Update Data Gagal');
        }
    }
}
