<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
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
        $data['order'] = $this->Morder->dataOrder();
        $data['count'] = $this->Morder->dataCount();
        $this->load->view('templates/Header');
        $this->load->view('templates/Sidebar');
        $this->load->view('templates/Topbar');
        $this->load->view('admin/Orderpage', $data);
        $this->load->view('templates/Footer');
    }

    public function editData()
    {
        if (isset($_POST['submit'])) {
            $id = $this->input->post('orderid');
            $data = array(
                'statusOrder'  =>  $this->input->post('status'),
                'statusPayment'  =>  $this->input->post('statsPay'),
                'totalPrices'  =>  $this->input->post('total'),
                'note' => $this->input->post('note'),
                'imageUrl' => $this->input->post('image')
            );
            $this->Morder->editOrder($id, $data);
            redirect('Order');
        } else {
            $params = array('foodId' =>  $this->uri->segment(3));
            $data['food'] = json_decode($this->curl->simple_get($this->API . '/food/list', $params));
            $this->load->view('admin/Foodpage', $data);
        }
    }
}
