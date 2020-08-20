<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Morder extends CI_Model
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

    public function dataOrder()
    {
        $data = json_decode($this->curl->simple_get($this->API . '/order/list'), true);
        $res = array();

        foreach ($data['data'] as $d)
        {
            if (in_array($d['statusOrder'], array('waiting', 'prosess')))
            {
                $res[] = $d;
            }
        }

        return $res;
    }

    public function dataConfirmed()
    {
        $data = json_decode($this->curl->simple_get($this->API . '/order/list'), true);
        $res = array();

        foreach ($data['data'] as $d)
        {
            if (in_array($d['statusOrder'], array('berhasil')))
            {
                $res[] = $d;
            }
        }

        return $res;
    }

    public function dataExpired()
    {
        $data = json_decode($this->curl->simple_get($this->API . '/order/list'), true);
        $res = array();

        foreach ($data['data'] as $d)
        {
            if (in_array($d['statusPayment'], array('expired')))
            {
                $res[] = $d;
            }
        }

        return $res;
    }

    public function dataCount()
    {
        $data = json_decode($this->curl->simple_get($this->API . '/order/list'), true);
        return $data;
    }

    public function editOrder($data, $id)
    {
        $update =  $this->curl->simple_put($this->API . '/order/update/' . $id, $data, array(CURLOPT_BUFFERSIZE => 10));

        if ($update) {
            $this->session->set_flashdata('hasil', 'Update Data Berhasil');
        } else {
            $this->session->set_flashdata('hasil', 'Update Data Gagal');
        }
    }
}
