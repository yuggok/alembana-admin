<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Table extends CI_Controller
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
            $imgUrl = $this->uploadFile();

            $data = array(
                'numberOfTable'       =>  $this->input->post('numseat'),
                'type' =>  $this->input->post('type'),
                'manyOfSeats'      =>  $this->input->post('jumlah'),
                'availableTime'      =>  $this->input->post('avail'),
                'filePath' => $imgUrl
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

            $imgUrl = $this->uploadFile();

            if ($imgUrl)
                $filePath = $imgUrl;
            else
                $filePath = $this->input->post('filePath');

            $data = array(
                'numberOfTable'       =>  $this->input->post('numseat'),
                'type' =>  $this->input->post('type'),
                'manyOfSeats'      =>  $this->input->post('jumlah'),
                'avalaibleTime'      =>  $this->input->post('avail'),
                'filePath' => $filePath
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
