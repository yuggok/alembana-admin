<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Popdrink extends CI_Controller
{
    var $API = "";
    public function __construct()
    {
        parent::__construct();
        $this->API = "https://us-central1-reservation-1b2b0.cloudfunctions.net/api";
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('Mdrinks');
    }
    public function index()
    {
        $data['populer'] = $this->Mdrinks->popDrinks();
        $this->load->view('templates/Header');
        $this->load->view('templates/Sidebar');
        $this->load->view('templates/Topbar');
        $this->load->view('admin/Popdrinkpage', $data);
        $this->load->view('templates/Footer');
    }

    public function addData()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'name'       =>  $this->input->post('name'),
                'price'      =>  $this->input->post('price'),
                'type' =>  $this->input->post('type')
            );
            $this->Mfood->insertFood($data);
        } else {
            redirect('Food');
        }
    }

    public function editData()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'foodId' => $this->input->post('id'),
                'name'       =>  $this->input->post('name'),
                'price'      =>  $this->input->post('price'),
                'type' =>  $this->input->post('type')
            );
            $this->Mfood->editFood($data);
            redirect('Food');
        } else {
            $params = array('foodId' =>  $this->uri->segment(3));
            $data['food'] = json_decode($this->curl->simple_get($this->API . '/food/list', $params));
            $this->load->view('admin/Foodpage', $data);
        }
    }

    public function deleteData($id)
    {
        if (empty($id)) {
            redirect('Food');
        } else {
            $delete =  $this->curl->simple_delete($this->API . '/food/delete/' . $id, array(CURLOPT_BUFFERSIZE => 10));
            if ($delete) {
                $this->session->set_flashdata('hasil', 'Delete Data Berhasil');
            } else {
                $this->session->set_flashdata('hasil', 'Delete Data Gagal');
            }
            redirect('Food');
        }
    }
}
