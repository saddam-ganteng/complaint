<?php
defined('BASEPATH') or exit('No direct script access allowed');

class auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('admin');
        }
        $data['title'] = 'Dashboard';
        $this->load->view('dashboard/login', $data);
    }

    public function register_rakyat()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim', [
            'required' => 'Please enter a name in the field!',
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
            'required' => 'Please enter a Password in the field!',
            'min_length' => 'Password too short!',
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[login.email]', [
            'required' => 'Please enter a valid email in the field!',
            'is_unique' => 'This Email is already registered!'
        ]);
        $this->form_validation->set_rules('nik', 'Nik', 'required|trim|min_length[15]|max_length[16]', [
            'required' => 'Please enter the ID card in the field!',
        ]);

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Sorry Registration failed try again! </div>');
            $this->load->view('dashboard/login');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'nik' => $this->input->post('nik'),
                'foto' => 'default.jpg',
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            ];

            $this->db->insert('masyarakat', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            congratulations, the account has been successfully Registered! </div>');
            redirect('auth');
        }
    }

    public function login_rakyat()
    {
        $this->form_validation->set_rules('emaila', 'Email', 'required|trim|valid_email', [
            'required' => 'Please enter a valid email in the field!',
        ]);
        $this->form_validation->set_rules('passworda', 'Password', 'required|trim', [
            'required' => 'Please enter a password in the field!',
        ]);

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Sorry Login failed try again! </div>');
            $data['title'] = 'Dashboard';
            $this->load->view('dashboard/login', $data);
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('emaila');
        $password = $this->input->post('passworda');

        $user = $this->db->get_where('login', ['email' => $email])->row_array();

        if ($user) {
            if ($user['status'] == 1) {
                if (password_verify($password, $user['password'])) {
                    if ($user['level'] == "masyaraakat") {
                        $data = [
                            'email' => $user['email'],
                        ];
                        $this->session->set_userdata($data);
                        redirect('asdzxczxc');
                    } elseif ($user['level'] == "admin") {
                        $data = [
                            'email' => $user['email'],
                        ];
                        $this->session->set_userdata($data);
                        redirect('admin');
                    } elseif ($user['level'] == "petugas") {
                        $data = [
                            'email' => $user['email'],
                        ];
                        $this->session->set_userdata($data);
                        redirect('asdjkl');
                    } else {
                        redirect('authasd');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Wrong Password! </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                This email has not been activated! </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email is not Registered! </div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        You have been Logout! </div>');
        redirect('auth');
    }
}
