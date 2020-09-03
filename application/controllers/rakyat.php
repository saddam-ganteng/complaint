<?php
defined('BASEPATH') or exit('No direct script access allowed');

class rakyat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
        $this->load->library('datatables');
        $this->load->library('upload');
        $this->load->library('pdf');
        $this->load->library('form_validation');
    }

    public function index()
    {

        $this->load->view('rakyat/template/header');
        $this->load->view('rakyat/template/navbar');
        $this->load->view('rakyat/dashboard');
    }

    public function insertreport()
    {

        if ($this->form_validation->run() == false) {
            $this->load->view('rakyat/dashboard');
        } else {
            $nikcom       = $this->db->get_where('masyarakat', ['email' => $this->session->userdata('email')])->row_array();
            $titlecom     = $this->input->post('titlecom');
            $contentcom   = $this->input->post('contentcom');
            $towncom      = $this->input->post('towncom');
            $catecom      = $this->input->post('catecom');
            $data = [
                'tgl_pengaduan' => date("F j, Y"),
                'nik' => $nikcom['nik'],
                'judul' => $titlecom,
                'kota' => $towncom,
                'isi_laporan' => $contentcom,
                'kategori' => $catecom,
                'status' => 'proses',
            ];
            // get foto
            $upload_image = $_FILES['fotocom']['name'];
            if ($upload_image) {

                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/report/';

                $this->upload->initialize($config);

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('fotocom')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->insert('pengaduan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success mt-3" role="alert">
            congratulations, the account has been updated! </div>');
            redirect('rakyat/dashboard');
        }
    }
}
