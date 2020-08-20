<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
        $this->load->model('Muser');
    }
    public function index()
    {
        $data['user'] = $this->Muser->dataUser();
        $this->load->view('templates/Header');
        $this->load->view('templates/Sidebar');
        $this->load->view('templates/Topbar');
        $this->load->view('admin/Userpage', $data);
        $this->load->view('templates/Footer');
    }

    public function addData()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'name'       =>  $this->input->post('name'),
                'gender'      =>  $this->input->post('jeniskel'),
                'dateOfBirth' =>  $this->input->post('tanggal'),
                'email'       =>  $this->input->post('email'),
                'phone'      =>  $this->input->post('telp'),
                'password' =>  $this->input->post('pass')
            );
            $this->Muser->insertUser($data);
        } else {
            redirect('User');
        }
    }

    public function deleteUser($id)
    {
        if (empty($id)) {
            redirect('Food');
        } else {
            $delete =  $this->curl->simple_delete($this->API . '/user/delete/' . $id, array(CURLOPT_BUFFERSIZE => 10));
            if ($delete) {
                $this->session->set_flashdata('hasil', 'Delete Data Berhasil');
            } else {
                $this->session->set_flashdata('hasil', 'Delete Data Gagal');
            }
            redirect('User');
        }
    }
}
