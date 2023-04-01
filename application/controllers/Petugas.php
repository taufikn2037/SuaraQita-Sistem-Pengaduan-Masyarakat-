<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Petugas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_model');
        $this->load->model('Tanggapan_m');
        $this->load->model('Pengaduan_m');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['pengaduan'] = $this->db->get('pengaduan')->num_rows();
        $data['admins'] = $this->db->get_where('admins', ['username__admin' =>
        $this->session->userdata('username__admin')])->row_array();
        $data['pengaduan_proses'] = $this->db->get_where('pengaduan', ['status' => 'proses'])->num_rows();
        $data['pengaduan_selesai'] = $this->db->get_where('pengaduan', ['status' => 'selesai'])->num_rows();
        $data['pengaduan_tolak'] = $this->db->get_where('pengaduan', ['status' => 'tolak'])->num_rows();

        $this->load->view('components_admin/header', $data);
        $this->load->view('components_petugas/sidebar', $data);
        $this->load->view('v_petugas/dashboard');
        $this->load->view('components_admin/footer');
    }

    public function pengaduan_masuk()
    {
        $data['title'] = 'Pengaduan Masuk';
        $data['admins'] = $this->db->get_where('admins', ['username__admin' =>
        $this->session->userdata('username__admin')])->row_array();
        $data['data_pengaduan'] = $this->Pengaduan_m->data_pengaduan()->result_array();

        $this->load->view('components_admin/header', $data);
        $this->load->view('components_petugas/sidebar', $data);
        $this->load->view('v_admin/p_masuk', $data);
        $this->load->view('components_admin/footer');
    }

    public function pengaduan_detail()
    {
        $id = htmlspecialchars($this->input->post('id', true));

        $data['title'] = 'Pengaduan Detail';
        $data['admins'] = $this->db->get_where('admins', ['username__admin' =>
        $this->session->userdata('username__admin')])->row_array();
        $data['data_pengaduan'] = $this->Pengaduan_m->data_pengaduan_users_id(htmlspecialchars($id))->row_array();

        $this->load->view('components_admin/header', $data);
        $this->load->view('components_petugas/sidebar', $data);
        $this->load->view('v_admin/p_detail', $data);
        $this->load->view('components_admin/footer');
    }

    public function tambah_tanggapan()
    {
        $id_pengaduan = htmlspecialchars($this->input->post('id', true));

        $petugas = $this->db->get_where('admins', ['username__admin' => $this->session->userdata('username__admin')])->row_array();

        $params = [
            'id_pengaduan'        => $id_pengaduan,
            'tgl_tanggapan'        => date('Y-m-d'),
            'tanggapan'            => htmlspecialchars($this->input->post('tanggapan', true)),
            'id_admin'            => $petugas['id_admin'],
        ];

        $menanggapi = $this->db->insert('tanggapan', $params);

        if ($menanggapi) {
            $params = [
                'status' => $this->input->post('status', true),
            ];

            $update_status_pengaduan = $this->db->update('pengaduan', $params, ['id_pengaduan' =>  $id_pengaduan]);

            if ($update_status_pengaduan) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil Menanggapi<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('/petugas/pengaduan_masuk');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Gagal Update<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('/petugas/pengaduan_masuk');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Gagal Menanggapi<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('/petugas/pengaduan_masuk');
        }
    }

    public function pengaduan_proses()
    {
        $data['title'] = 'Pengaduan Diproses';
        $data['admins'] = $this->db->get_where('admins', ['username__admin' =>
        $this->session->userdata('username__admin')])->row_array();
        $data['data_pengaduan'] = $this->Pengaduan_m->data_pengaduan_users_proses()->result_array();

        $this->load->view('components_admin/header', $data);
        $this->load->view('components_petugas/sidebar', $data);
        $this->load->view('v_admin/p_proses', $data);
        $this->load->view('components_admin/footer');
    }

    public function tanggapan_selesai()
    {
        $id_pengaduan = htmlspecialchars($this->input->post('id', true));

        $params = [
            'status' => 'selesai',
        ];

        $update_status_pengaduan = $this->db->update('pengaduan', $params, ['id_pengaduan' =>  $id_pengaduan]);

        if ($update_status_pengaduan) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Pengaduan Berhasil Diselesaikan<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('/petugas/pengaduan_proses');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Pengaduan Gagal Diselesaikan<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('/petugas/pengaduan_proses');
        }
    }

    public function pengaduan_selesai()
    {
        $data['title'] = 'Pengaduan Selesai';
        $data['admins'] = $this->db->get_where('admins', ['username__admin' =>
        $this->session->userdata('username__admin')])->row_array();
        $data['data_pengaduan'] = $this->Pengaduan_m->data_pengaduan_users_selesai()->result_array();

        $this->load->view('components_admin/header', $data);
        $this->load->view('components_petugas/sidebar', $data);
        $this->load->view('v_admin/p_selesai', $data);
        $this->load->view('components_admin/footer');
    }

    public function pengaduan_tolak()
    {
        $data['title'] = 'Pengaduan Ditolak';
        $data['admins'] = $this->db->get_where('admins', ['username__admin' =>
        $this->session->userdata('username__admin')])->row_array();
        $data['data_pengaduan'] = $this->Pengaduan_m->data_pengaduan_users_tolak()->result_array();

        $this->load->view('components_admin/header', $data);
        $this->load->view('components_petugas/sidebar', $data);
        $this->load->view('v_admin/p_tolak', $data);
        $this->load->view('components_admin/footer');
    }
}
