<?php
defined('BASEPATH') or exit('No direct script access allowed');

class rakyat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
        $this->load->model('M_rakyat');
        $this->load->library('datatables');
        $this->load->library('upload');
        $this->load->library('pdf');
        $this->load->library('form_validation');
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('rakyat/dashboard', $data);
    }

    public function detail_case()
    {
        $data['user'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();

        $id = $this->input->get('link_id');
        $data['perid'] = $this->M_rakyat->show_kasus($id);

        $content                = $this->db->query("SELECT * FROM pengaduan WHERE id_pengaduan='$id'")->row_array();
        $data['id_pengaduan']   = $content['id_pengaduan'];

        // var_dump($data);
        // die;
        $this->load->view('rakyat/case_detail', $data);
    }

    public function komen()
    {
        $nikkomen       = $this->db->get_where('masyarakat', ['email' => $this->session->userdata('email')])->row_array();
        $id             = $this->input->post('id');
        $nama           = $this->input->post('nama');
        $isi_komen      = $this->input->post('isikomen');
        $level          = $this->input->post('levelkomen');
        $data = [
            'id_pengaduan' => $id,
            'tgl_tanggapan' => date("F j, Y, H:i"),
            'tanggapan' => $isi_komen,
            'id' => $nikkomen['nik'],
            'nama' => $nama,
            'level' => $level,
        ];

        $this->db->insert('tanggapan', $data);
        redirect('rakyat/detail_case/?link_id=' . $id);
    }

    public function my_case()
    {
        $data['user'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();

        $email = $this->session->userdata('email');
        $masyarakat = $this->M_rakyat->get_nik($email);
        $nik = $masyarakat['nik'];
        $data['pengaduan'] = $this->M_rakyat->get_data_pengaduan($nik);
        // var_dump($data);
        // die;
        $this->load->view('rakyat/case_user', $data);
    }

    public function insertreport()
    {
        $data['user'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('titlecom', 'Title', 'required|trim', [
            'required' => 'Please give a title for the Complaint!',
        ]);
        $this->form_validation->set_rules('contentcom', 'Content', 'required|trim', [
            'required' => 'Please fill out the complaint!',
        ]);
        $this->form_validation->set_rules('towncom', 'Home Town', 'required|trim', [
            'required' => 'Please fill in where you are from!',
        ]);
        $this->form_validation->set_rules('towncom', 'Home Town', 'required|trim', [
            'required' => 'Please fill in where you are from!',
        ]);
        $this->form_validation->set_rules('catecom', 'Type', 'required|trim', [
            'required' => 'Please choose the Category!',
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('rakyat/dashboard', $data);
        } else {
            $nikcom       = $this->db->get_where('masyarakat', ['email' => $this->session->userdata('email')])->row_array();
            $titlecom     = $this->input->post('titlecom');
            $typecom      = $this->input->post('typecom');
            $contentcom   = $this->input->post('contentcom');
            $towncom      = $this->input->post('towncom');
            $catecom      = $this->input->post('catecom');
            $data = [
                'tgl_pengaduan' =>  date("Y-m-d H:i"),
                'nik' => $nikcom['nik'],
                'jenis' => $typecom,
                'judul' => $titlecom,
                'kota' => $towncom,
                'isi_laporan' => $contentcom,
                'kategori' => $catecom,
                'status' => 'pending',
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
            complaint has been sent, please wait for a while! </div>');
            redirect('rakyat');
        }
    }
}
