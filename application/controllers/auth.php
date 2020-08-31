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
        $this->form_validation->set_rules('nik', 'Nik', 'required|trim|min_length[15]|max_length[16]|is_unique[login.id]', [
            'required' => 'Please enter the ID card in the field!',
            'is_unique' => 'This ID Card is already registered!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Dashboard';
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Sorry Registration failed try again! </div>');
            $this->load->view('dashboard/login', $data);
        } else {
            $email = $this->input->post('email', true);

            $data = [
                'nama' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($email),
                'nik' => $this->input->post('nik'),
                'foto' => 'default.jpg',
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'status' => 0,
            ];

            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];

            $this->db->insert('masyarakat', $data);
            $this->db->insert('login_token', $user_token);

            $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            congratulations! your account has been created. Please active your account!</div>');
            redirect('auth');
        }
    }

    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'clodycode@gmail.com',
            'smtp_pass' => 'adasaraS556',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('clodycode@gmail.com', 'Clody Code');
        $this->email->to($this->input->post('email'));


        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('Click this link to verify you account : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
        }


        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('login', ['email' => $email])->row_array();
        if ($user) {
            $login_token = $this->db->get_where('login_token', ['token' => $token])->row_array();
            if ($login_token) {
                if (time() - $login_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('status', 1);
                    $this->db->where('email', $email);
                    $this->db->update('login');

                    $this->db->delete('login_token', ['email' => $email]);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' has been activated! Please login.</div>');
                    redirect('auth');
                } else {
                    $this->db->delete('login', ['email' => $email]);
                    $this->db->delete('login_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Account activation failed! Token Failed. </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Account activation failed! Wrong Token. </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Account activation failed! Wrong email. </div>');
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
                    if ($user['level'] == "masyarakat") {
                        $data = [
                            'email' => $user['email'],
                        ];
                        $this->session->set_userdata($data);
                        redirect('admin');
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
