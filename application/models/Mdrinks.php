<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mdrinks extends CI_Model
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

    public function dataDrinks()
    {
        $data = json_decode($this->curl->simple_get($this->API . '/drink/list'), true);
        return $data['data'];
    }

    public function popDrinks()
    {
        $data = json_decode($this->curl->simple_get($this->API . '/drink/populer'), true);
        return $data['data'];
    }

    public function insertDrinks($data)
    {
        $insert =  $this->curl->simple_post($this->API . '/drink/add', $data, array(CURLOPT_BUFFERSIZE => 10));
        if ($insert) {
            $this->session->set_flashdata('hasil', 'Insert Data Berhasil');
        } else {
            $this->session->set_flashdata('hasil', 'Insert Data Gagal');
        }
        redirect('Drinks');
    }

    public function editDrink($data, $id)
    {

        $update =  $this->curl->simple_put($this->API . '/drink/update/' . $id, $data, array(CURLOPT_BUFFERSIZE => 10));
        if ($update) {
            $this->session->set_flashdata('hasil', 'Update Data Berhasil');
        } else {
            $this->session->set_flashdata('hasil', 'Update Data Gagal');
        }
    }
}
