<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules(
            'username__user',
            'Username',
            'trim|required'
        );

        $this->form_validation->set_rules(
            'password__user',
            'Password',
            'trim|required'
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('v_auth/login_user');
        } else {
            //validasi success
            $this->_auth();
        }
    }

    private function _auth()
    {
        $username = $this->input->post('username__user');
        $password = $this->input->post('password__user');

        $user = $this->db->get_where('users', ['username__user' => $username])->row_array();

        // jika user ada
        if ($user) {
            // jika user aktif
            if ($user['is_active'] == 1) {
                //cek password
                if (password_verify($password, $user['password__user'])) {
                    $data = [
                        'username__user' => $user['username__user'],
                        'id_role' => $user['id_role']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['id_role'] == 2) {
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Password salah!</div>');
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Username belum aktif</div>');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Username tidak ada</div>');
            redirect('login');
        }
    }

    public function daftar()
    {
        $this->form_validation->set_rules(
            'name__user',
            'Nama',
            'required|trim'
        );

        $this->form_validation->set_rules(
            'username__user',
            'Username',
            'required|trim|is_unique[users.username__user]',
            ['is_unique' => 'Username sudah digunakan!']
        );

        $this->form_validation->set_rules(
            'nik__user',
            'NIK',
            'required|trim'
        );

        $this->form_validation->set_rules(
            'no_telepon',
            'Telepon',
            'required|trim'
        );

        $this->form_validation->set_rules(
            'email__user',
            'Email',
            'required|trim|valid_email|is_unique[users.email__user]',
            ['is_unique' => 'Email sudah pernah didaftarkan!']
        );

        $this->form_validation->set_rules(
            'password__user',
            'Password',
            'required|trim|min_length[4]|matches[rpassword__user]',
            ['matches' => 'Password tidak cocok!', 'min_length' => 'Password terlalu pendek!',]
        );

        $this->form_validation->set_rules(
            'rpassword__user',
            'Password',
            'required|trim|matches[password__user]'
        );

        if ($this->form_validation->run() == false) {
            $this->load->library('form_validation');
            $this->load->view('v_auth/daftar');
        } else {
            $data  = [
                'name__user' => $this->input->post('name__user'),
                'email__user' => $this->input->post('email__user'),
                'nik__user' => $this->input->post('nik__user'),
                'no_telepon' => $this->input->post('no_telepon'),
                'username__user' => $this->input->post('username__user'),
                'password__user' => password_hash($this->input->post('password__user'), PASSWORD_DEFAULT),
                'id_role' => 2,
                'is_active' => 1,
                'date_created' => date('Y-m-d')
            ];

            $this->db->insert('users', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Selamat! Akun kamu telah berhasil dibuat. Silahkan Login</div>');
            redirect('login');
        }
    }

    public function login_admin()
    {
        $this->load->view('v_auth/login_admin');
    }

    public function logout()
    {
        $this->session->unset_userdata('username__user');
        $this->session->unset_userdata('id_role');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Kamu telah keluar</div>');
        redirect('login');
    }
}
