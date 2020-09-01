<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user extends CI_Controller
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

    public function profile()
    {
        $data['title'] = 'Profile';
        $data['navbar'] = 'Profile';
        $data['user'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('admin/user_profile', $data);
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

                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/profile/';

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

            // $this->db->set('nama', $name);
            // $this->db->set('telp', $telp);
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
}
