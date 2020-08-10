<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mfood extends CI_Model
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

    public function dataFood()
    {
        $data = json_decode($this->curl->simple_get($this->API . '/food/list'), true);
        return $data['data'];
    }

    public function popFood()
    {
        $data = json_decode($this->curl->simple_get($this->API . '/food/populer'), true);
        return $data['data'];
    }

    public function insertFood($data)
    {
        $uploadpath = "images/";
        $filedata = $_FILES['filedata']['tmp_name'];
        $filename = $_POST['filename'];
        if ($filedata != '' && $filename != '')
            copy($filedata, $uploadpath . $filename);

        $insert =  $this->curl->simple_post($this->API . '/food/add', $data, array(CURLOPT_BUFFERSIZE => 10));
        if ($insert) {
            $this->session->set_flashdata('hasil', 'Insert Data Berhasil');
        } else {
            $this->session->set_flashdata('hasil', 'Insert Data Gagal');
        }
        redirect('Food');
    }

    public function editFood($data, $id)
    {

        $update =  $this->curl->simple_put($this->API . '/food/update/' . $id, $data, array(CURLOPT_BUFFERSIZE => 10));
        if ($update) {
            $this->session->set_flashdata('hasil', 'Update Data Berhasil');
        } else {
            $this->session->set_flashdata('hasil', 'Update Data Gagal');
        }
    }
}
