<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
    var $API = "";
    public function __construct()
    {
        parent::__construct();

        if (!isset($_SESSION['alembana']))
        {
            redirect('Auth');
        }

        $this->API = "https://us-central1-reservation-1b2b0.cloudfunctions.net/api";
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('Morder');
    }

    public function index()
    {
        $data['order'] = $this->Morder->dataConfirmed();
        $data['count'] = $this->Morder->dataCount();

        $this->load->view('templates/Header');
        $this->load->view('templates/Sidebar');
        $this->load->view('templates/Topbar');
        $this->load->view('admin/Pelangganpage', $data);
        $this->load->view('templates/Footer');
    }

    public function editData()
    {
        if (isset($_POST['submit'])) {
            $id = $this->input->post('id');
            $data = array(
                'statusOrder'  =>  'selesai',
                'statusPayment'  =>  'selesai',
                'totalPrices'  =>  $this->input->post('total'),
                'note' => $this->input->post('note'),
                'imageUrl' => $this->input->post('imageUrl')
            );

            $this->Morder->editOrder($data, $id);
            redirect('Pelanggan');
        } else {
            $params = array('foodId' =>  $this->uri->segment(3));
            $data['food'] = json_decode($this->curl->simple_get($this->API . '/food/list', $params));
            $this->load->view('admin/Foodpage', $data);
        }
    }
}
