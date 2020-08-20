<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Carousels extends CI_Controller
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
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('Mcarousel');
    }
    public function index()
    {
        $data['data'] = $this->Mcarousel->get();
        $this->load->view('templates/Header');
        $this->load->view('templates/Sidebar');
        $this->load->view('templates/Topbar');
        $this->load->view('admin/Carouselpage', $data);
        $this->load->view('templates/Footer');
    }

    public function addData()
    {
        if (isset($_POST['submit'])) {
            $imgUrl = $this->uploadFile();

            $data = array(
                'title'       =>  $this->input->post('title'),
                'image' => $imgUrl
            );
            $this->Mcarousel->insert($data);
        } else {
            redirect('Carousels');
        }
    }

    public function editData()
    {
        if (isset($_POST['submit'])) {
            $id = $this->input->post('id');

            $imgUrl = $this->uploadFile();

            if ($imgUrl)
                $filePath = $imgUrl;
            else
                $filePath = $this->input->post('image');

            $data = array(

                'title'       =>  $this->input->post('title'),
                'image' => $filePath
            );
            $this->Mcarousel->update($data, $id);
            redirect('Carousels');
        } else {
            $params = array('slideId' =>  $this->uri->segment(3));
            $data['data'] = json_decode($this->curl->simple_get($this->API . '/slide/list', $params));
            $this->load->view('admin/Carouselpage', $data);
        }
    }

    public function deleteData($id)
    {
        if (empty($id)) {
            redirect('Carousels');
        } else {
            $delete =  $this->curl->simple_delete($this->API . '/slide/delete/' . $id, array(CURLOPT_BUFFERSIZE => 10));
            if ($delete) {
                $this->session->set_flashdata('hasil', 'Delete Data Berhasil');
            } else {
                $this->session->set_flashdata('hasil', 'Delete Data Gagal');
            }
            redirect('Carousels');
        }
    }

    private function uploadFile()
    {
        if (!$_FILES['file']['tmp_name'])
            return '';

        $tmpFile = $_FILES['file']['tmp_name'];
        $fileName = $_FILES['file']['name'];

        $url = "https://us-central1-reservation-1b2b0.cloudfunctions.net/api/food/uploadfile";
        $cFile = curl_file_create($tmpFile, 'image/jpeg', $fileName);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        $post = array(
            "file" => $cFile
        );
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        $response = curl_exec($ch);

        curl_close($ch);

        $response = json_decode($response, true);

        return $response['data']['linkimage'];
    }
}
