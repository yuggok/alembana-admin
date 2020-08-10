<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Drinks extends CI_Controller
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
        $this->load->model('Mdrinks');
    }

    public function index()
    {
        $data['drinks'] = $this->Mdrinks->dataDrinks();
        $this->load->view('templates/Header');
        $this->load->view('templates/Sidebar');
        $this->load->view('templates/Topbar');
        $this->load->view('admin/Drinkspage', $data);
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
            $this->Mdrinks->insertDrinks($data);
        } else {
            echo "gagal";
        }
    }

    public function editData()
    {
        if (isset($_POST['submit'])) {
            $id = $this->input->post('id');
            $data = array(

                'name'       =>  $this->input->post('name'),
                'price'      =>  $this->input->post('price'),
                'type' =>  $this->input->post('type')
            );
            $this->Mdrinks->editDrink($data, $id);
            redirect('Drinks');
        } else {
            $params = array('drinkId' =>  $this->uri->segment(3));
            $data['food'] = json_decode($this->curl->simple_get($this->API . '/drink/list', $params));
            $this->load->view('admin/Drinkspage', $data);
        }
    }

    public function deleteData($id)
    {
        if (empty($id)) {
            redirect('Drinks');
        } else {
            $delete =  $this->curl->simple_delete($this->API . '/drink/delete/' . $id, array(CURLOPT_BUFFERSIZE => 10));
            if ($delete) {
                $this->session->set_flashdata('hasil', 'Delete Data Berhasil');
            } else {
                $this->session->set_flashdata('hasil', 'Delete Data Gagal');
            }
            redirect('Drinks');
        }
    }
}
