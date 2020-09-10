<?php
defined('BASEPATH') or exit('No direct script access allowed');

require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
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
        // CHART JS
        $query =  $this->db->query("SELECT COUNT(id_pengaduan) as count,MONTHNAME(tgl_pengaduan) as month_name FROM pengaduan WHERE YEAR(tgl_pengaduan) = '" . date('Y') . "'
        GROUP BY YEAR(tgl_pengaduan),MONTH(tgl_pengaduan)");
        $record = $query->result();
        $data = [];
        foreach ($record as $row) {
            $data['label'][] = $row->month_name;
            $data['data'][] = (int) $row->count;
        }
        $data['chart_data'] = json_encode($data);
        // CHART JS
        // hiasan
        $data['total_user'] = $this->M_admin->hitungJumlahrakyat();
        $data['total_proses'] = $this->M_admin->jumlah_proses();
        $data['total_selesai'] = $this->M_admin->jumlah_selesai();
        $data['total_kasus'] = $this->M_admin->hitungJumlahkasus();

        $data['title'] = 'Dashboard';
        $data['navbar'] = 'Dashboard';
        $data['user'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('admin/dashboard', $data);
    }

    public function table()
    {
        $data['total_user'] = $this->M_admin->hitungJumlahrakyat();
        $data['title'] = 'Table User';
        $data['navbar'] = 'Table User';
        $data['user'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('admin/table_rud', $data);
    }

    public function profile()
    {
        $data['title'] = 'Profile';
        $data['navbar'] = 'Profile';
        $data['user'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('admin/user_profile', $data);
    }

    public function caselist()
    {
        $data['pengaduan'] = $this->M_admin->get_report();
        $data['title'] = 'Case List';
        $data['navbar'] = 'Case List';
        $data['user'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('admin/case_list', $data);
    }

    public function detail_case()
    {
        $data['pengaduan'] = $this->M_admin->get_report();
        $id = $this->input->get('link_id');
        $data['perid'] = $this->M_admin->show_kasus($id);

        $content                = $this->db->query("SELECT * FROM pengaduan WHERE id_pengaduan='$id'")->row_array();
        $data['id_pengaduan']   = $content['id_pengaduan'];

        $data['title'] = 'Case List';
        $data['navbar'] = 'Case List';
        $data['user'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('admin/case_detail', $data);
    }

    public function pending_case()
    {
        $id = $this->input->get('link_id');
        $data['perid'] = $this->M_admin->show_kasus($id);
        $this->db->set('status', 'proses');
        $this->db->where('id_pengaduan', $id);
        $this->db->update('pengaduan');
        redirect('admin/caselist');
        // var_dump($data);
        // die;
    }

    public function complate_case()
    {
        $id = $this->input->get('link_id');
        $data['perid'] = $this->M_admin->show_kasus($id);
        $this->db->set('status', 'selesai');
        $this->db->set('tgl_selesai', date("Y-m-d H:i"));
        $this->db->where('id_pengaduan', $id);
        $this->db->update('pengaduan');
        // var_dump($data);
        // die;
        redirect('admin/caselist');
    }

    public function komen_admin()
    {
        $idkomen        = $this->db->get_where('petugas', ['email' => $this->session->userdata('email')])->row_array();
        $id             = $this->input->post('id');
        $nama           = $this->input->post('nama');
        $isi_komen      = $this->input->post('isikomen');
        $level          = $this->input->post('levelkomen');
        $data = [
            'id_pengaduan' => $id,
            'tgl_tanggapan' => date("F j, Y, H:i"),
            'tanggapan' => $isi_komen,
            'id' => $idkomen['id_petugas'],
            'nama' => $nama,
            'level' => $level
        ];

        $this->db->insert('tanggapan', $data);
        redirect('admin/detail_case/?link_id=' . $id);
    }

    public function editprofile()
    {
        $data['title'] = 'Profile';
        $data['navbar'] = 'Profile';
        $data['user'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Name', 'required|trim', [
            'required' => 'Please enter a Name in the field!',
        ]);
        $this->form_validation->set_rules('telp', 'Telp', 'required|trim', [
            'required' => 'Please enter a Mobile Phone number in the field!',
        ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('admin/user_profile', $data);
        } else {
            //

            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $telp = $this->input->post('telp');

            $upload_image = $_FILES['foto']['name'];

            if ($upload_image) {

                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->upload->initialize($config);

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $old_image = $data['user']['foto'];
                    if ($old_image != 'default.jpg') {
                        unlink('assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('nama', $name);
            $this->db->set('telp', $telp);
            $this->db->where('email', $email);
            $this->db->update('login');
            $this->session->set_flashdata('message', '<div class="alert alert-success mt-3" role="alert">
            congratulations, the account has been updated! </div>');
            redirect('admin/profile');
        }
    }

    public function editpassword()
    {
        $data['title'] = 'Change Password';
        $data['navbar'] = 'Change Password';
        $data['user'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('oldpass', 'Current Password', 'required|trim', [
            'required' => 'Please enter a Current Password in the field!',
        ]);
        $this->form_validation->set_rules('newpass1', 'New Password', 'required|trim|min_length[5]|matches[newpass2]', [
            'required' => 'Please enter a New Password in the field!',
            'min_length' => 'Minimum 5 Characters '
        ]);
        $this->form_validation->set_rules('newpass2', 'Confirm New Password', 'required|trim|min_length[5]|matches[newpass1]', [
            'required' => 'Please Confirm New Password in the field!',
            'min_length' => 'Minimum 5 Characters',
            'matches' => 'Passwords are not the same '
        ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('admin/user_profile_cp', $data);
        } else {
            $current_password = $this->input->post('oldpass');
            $new_password = $this->input->post('newpass1');

            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger mt-3" role="alert">
                Wrong Current Password! </div>');
                redirect('admin/editpassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger mt-3" role="alert">
                    New Password cannot be the same as Current </div>');
                    redirect('admin/editpassword');
                } else {
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('login');
                    $this->session->set_flashdata('message', '<div class="alert alert-success mt-3" role="alert">
                    Password Changed! </div>');
                    redirect('admin/editpassword');
                }
            }
        }
    }

    function get_rakyat_json()
    {     //get product data and encode to be JSON object
        echo $this->M_admin->get_all_rakyat();
    }

    function insert()
    { //update record method
        $this->M_admin->insertdata();
        redirect('admin/table');
    }

    function update()
    { //update record method
        $this->M_admin->update_rakyat();
        redirect('admin/table');
    }

    function delete()
    { //delete record method
        $this->M_admin->delete_rakyat();
        redirect('admin/table');
    }

    public function print_pdf() //CETAK PDF
    {
        $data['user'] = $this->M_admin->get_masyarakat();
        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-data.pdf";
        $this->pdf->load_view('print/print_rakyat', $data);
    }

    public function print_petugas_pdf() //CETAK PDF
    {
        $data['user'] = $this->M_admin->get_petugas();
        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-data.pdf";
        $this->pdf->load_view('print/print_petugas', $data);
    }

    public function xml()
    {
        header("Content-type: application/vnd.openxmlformats-officedocument.spreadsheet.sheet");
        header('Content-Disposition: attachment; filename="Data Pengaduan.xls"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');

        $data['user'] = $this->M_admin->get_masyarakat();
        $this->load->view('print/print_rakyat', $data);
    }

    public function xml_admin()
    {
        $data = $this->M_admin->get_petugas();
        $spreadsheet = new Spreadsheet();
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);

        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A3', 'ID Officer');
        $sheet->setCellValue('B3', 'Nama');
        $sheet->setCellValue('C3', 'Phone Number');
        $sheet->setCellValue('D3', 'Email');

        $x = 4;
        foreach ($data as $row) {
            $sheet->setCellValue('A' . $x, $row->id_petugas);
            $sheet->setCellValue('B' . $x, $row->nama);
            $sheet->setCellValue('C' . $x, $row->telp);
            $sheet->setCellValue('D' . $x, $row->email);
            $x++;
        }
        $writer = new Xlsx($spreadsheet);
        $filename = 'laporan-excel-Data Petugas';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }

    function get_admin_json()
    {     //get product data and encode to be JSON object
        echo $this->M_admin->get_all_admin();
    }

    public function table_petugas()
    {
        $data['total_user'] = $this->M_admin->hitungJumlahpetugas();
        $data['title'] = 'List Offcer';
        $data['navbar'] = 'List Offcer';
        $data['user'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('admin/table_rud_', $data);
    }
}
