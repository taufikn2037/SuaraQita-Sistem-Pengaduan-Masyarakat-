<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LAdmin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules(
            'username__admin',
            'Username',
            'trim|required'
        );

        $this->form_validation->set_rules(
            'password__admin',
            'Password',
            'trim|required'
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('v_auth/login_admin');
        } else {
            //validasi success
            $this->_auth();
        }
    }

    private function _auth()
    {
        $username = $this->input->post('username__admin');
        $password = $this->input->post('password__admin');
        $hpassword = password_hash($password, PASSWORD_DEFAULT);
        $user = $this->db->get_where('admins', ['username__admin' => $username])->row_array();

        // jika user ada
        if ($user) {
            // jika user aktif
            if ($user['is_active'] == 1) {
                //cek password
                if (password_verify($user['password__admin'], $hpassword)) {
                    $data = [
                        'username__admin' => $user['username__admin'],
                        'id_role' => $user['id_role']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['id_role'] == 1) {
                        redirect('admin');
                    } else if ($user['id_role'] == 3) {
                        redirect('petugas');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Password salah!</div>');
                    redirect('ladmin');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Username belum aktif</div>');
                redirect('ladmin');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Username tidak ada</div>');
            redirect('ladmin');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username__admin');
        $this->session->unset_userdata('id_role');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Kamu telah keluar</div>');
        redirect('ladmin');
    }
}
