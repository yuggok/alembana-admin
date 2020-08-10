<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Table extends CI_Controller
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
        $this->load->model('Mtable');
    }
    public function index()
    {
        $data['meja'] = $this->Mtable->dataTable();
        $this->load->view('templates/Header');
        $this->load->view('templates/Sidebar');
        $this->load->view('templates/Topbar');
        $this->load->view('admin/Tablepage', $data);
        $this->load->view('templates/Footer');
    }

    public function addData()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'numberOfTable'       =>  $this->input->post('numseat'),
                'type' =>  $this->input->post('type'),
                'manyOfSeats'      =>  $this->input->post('jumlah'),
                'availableTime'      =>  $this->input->post('avail')
            );
            $this->Mtable->insertTable($data);
        } else {
            redirect('Table');
        }
    }

    public function editData()
    {
        if (isset($_POST['submit'])) {
            $id = $this->input->post('id');
            $data = array(
                'numberOfTable'       =>  $this->input->post('numseat'),
                'type' =>  $this->input->post('type'),
                'manyOfSeats'      =>  $this->input->post('jumlah'),
                'avalaibleTime'      =>  $this->input->post('avail')
            );
            $this->Mtable->editTable($data, $id);
            redirect('Table');
        } else {
            $params = array('tableId' =>  $this->uri->segment(3));
            $data['table'] = json_decode($this->curl->simple_get($this->API . '/table/list', $params));
            $this->load->view('admin/Tablepage', $data);
        }
    }

    public function deleteData($id)
    {
        if (empty($id)) {
            redirect('Table');
        } else {
            $delete =  $this->curl->simple_delete($this->API . '/table/delete/' . $id, array(CURLOPT_BUFFERSIZE => 10));
            if ($delete) {
                $this->session->set_flashdata('hasil', 'Delete Data Berhasil');
            } else {
                $this->session->set_flashdata('hasil', 'Delete Data Gagal');
            }
            redirect('Table');
        }
    }
}
