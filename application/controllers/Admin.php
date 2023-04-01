<?php

defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . "third_party/dompdf/autoload.inc.php";
 use Dompdf\Dompdf;
 define("DOMPDF_ENABLE_REMOTE", true);


class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_model');
		$this->load->model('Pengaduan_m');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['users'] = $this->db->get('users')->num_rows();
        $data['pengaduan'] = $this->db->get('pengaduan')->num_rows();
        $data['pengaduan_proses'] = $this->db->get_where('pengaduan',['status' => 'proses'])->num_rows();
	    $data['pengaduan_selesai'] = $this->db->get_where('pengaduan',['status' => 'selesai'])->num_rows();
        $data['pengaduan_tolak'] = $this->db->get_where('pengaduan',['status' => 'tolak'])->num_rows();
        $data['admins'] = $this->db->get_where('admins', ['username__admin' =>
        $this->session->userdata('username__admin')])->row_array();

        $this->load->view('components_admin/header', $data);
        $this->load->view('components_admin/sidebar', $data);
        $this->load->view('v_admin/dashboard');
        $this->load->view('components_admin/footer');
    }

    public function ekspor_data()
    {
        $data['title'] = 'Data Pengaduan';
        $data['admins'] = $this->db->get_where('admins', ['username__admin' =>
        $this->session->userdata('username__admin')])->row_array();
        $data['data_masyarakat'] = $this->Pengaduan_m->laporan_pengaduan()->result_array();

        $this->load->view('components_admin/header', $data);
        $this->load->view('components_admin/sidebar', $data);
        $this->load->view('v_admin/ekspor');
        $this->load->view('components_admin/footer');
    }

    public function data_masyarakat()
    {
        $data['title'] = 'Data Masyarakat';
        $data['admins'] = $this->db->get_where('admins', ['username__admin' =>
        $this->session->userdata('username__admin')])->row_array();
        $data['data_masyarakat'] = $this->m_model->get_data('users')->result();

        $this->load->view('components_admin/header', $data);
        $this->load->view('components_admin/sidebar', $data);
        $this->load->view('v_admin/masyarakat', $data);
        $this->load->view('components_admin/footer');
    }

    public function data_petugas()
    {
        $data['title'] = 'Data Petugas';
        $data['admins'] = $this->db->get_where('admins', ['username__admin' =>
        $this->session->userdata('username__admin')])->row_array();
        $data['data_petugas'] = $this->m_model->get_data('admins')->result();

        $this->load->view('components_admin/header', $data);
        $this->load->view('components_admin/sidebar', $data);
        $this->load->view('v_admin/petugas', $data);
        $this->load->view('components_admin/footer');
    }

    public function tambah_petugas()
    {
        $data['title'] = 'Tambah Data Petugas';
        $data['admins'] = $this->db->get_where('admins', ['username__admin' =>
        $this->session->userdata('username__admin')])->row_array();

        $this->load->view('components_admin/header', $data);
        $this->load->view('components_admin/sidebar', $data);
        $this->load->view('v_admin/tambah_petugas', $data);
        $this->load->view('components_admin/footer');
    }

    public function tambah_petugas_aksi()
    {
        $data = array(
            'name__admin' => $this->input->post('name__admin'),
            'username__admin' => $this->input->post('username__admin'),
            'password__admin' => $this->input->post('password__admin'),
            'id_role' => 3,
            'is_active' => 1
        );
        $this->m_model->insert_data($data, 'admins');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhasil Ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/data_petugas');
    }

    public function delete_masyarakat($id)
    {
        $where = array('id_user' => $id);

        $this->m_model->delete($where, 'users');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data Berhasil Dihapus<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/data_masyarakat');
    }

    public function delete_petugas($id)
    {
        $where = array('id_admin' => $id);

        $this->m_model->delete($where, 'admins');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data Berhasil Dihapus<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/data_petugas');
    }

    public function edit_petugas($id)
    {
        $data = array(
            'id_admin' => $id,
            'name__admin' => $this->input->post('name__admin'),
            'username__admin' => $this->input->post('username__admin'),
            'password__admin' => $this->input->post('password__admin'),
            'id_role' => 3,
            'is_active' => 1
        );
        $this->m_model->update_data($data, 'admins');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhasil Diubah<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/data_petugas');
    }

    public function kategori_p()
    {
        $data['title'] = 'Kategori Pengaduan';
        $data['admins'] = $this->db->get_where('admins', ['username__admin' =>
        $this->session->userdata('username__admin')])->row_array();
        $data['data_kategori'] = $this->m_model->get_data('kategori')->result();

        $this->load->view('components_admin/header', $data);
        $this->load->view('components_admin/sidebar', $data);
        $this->load->view('v_admin/kategori', $data);
        $this->load->view('components_admin/footer');
    }

    public function tambah_kategori()
    {
        $data = array(
            'nama_kategori' => $this->input->post('nama_kategori')
        );
        $this->m_model->insert_data($data, 'kategori');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhasil Ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/kategori_p');
    }

    public function delete_kategori($id)
    {
        $where = array('id_kategori' => $id);

        $this->m_model->delete($where, 'kategori');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data Berhasil Dihapus<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/kategori_p');
    }

    public function edit_kategori($id)
    {
        $data = array(
            'id_kategori' => $id,
            'nama_kategori' => $this->input->post('nama_kategori')
        );
        $this->m_model->update_kategori($data, 'kategori');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Kategori Berhasil Diubah<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/kategori_p');
    }

    public function berita()
    {
        $data['title'] = 'Berita';
        $data['admins'] = $this->db->get_where('admins', ['username__admin' =>
        $this->session->userdata('username__admin')])->row_array();
        $data['data_berita'] = $this->m_model->get_data('berita')->result();

        $this->load->view('components_admin/header', $data);
        $this->load->view('components_admin/sidebar', $data);
        $this->load->view('v_admin/berita', $data);
        $this->load->view('components_admin/footer');
    }

    public function tambah_berita()
    {
        $data['title'] = 'Tambah Berita';
        $data['admins'] = $this->db->get_where('admins', ['username__admin' =>
        $this->session->userdata('username__admin')])->row_array();
        $data['data_berita'] = $this->m_model->get_data('berita')->result();

        $this->load->view('components_admin/header', $data);
        $this->load->view('components_admin/sidebar', $data);
        $this->load->view('v_admin/t_berita', $data);
        $this->load->view('components_admin/footer');
    }

    public function tambah_berita_aksi()
    {
        $config['upload_path']          = './assets/uploads_b/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 2048;
        $config['remove_spaces']        = TRUE;
        $config['detect_mime']          = TRUE;
        $config['mod_mime_fix']         = TRUE;
        $config['encrypt_name']         = TRUE;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('foto_berita')){
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Gagal menambah berita, cek kembali data anda!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/berita');
        }
        else{
            $foto_berita = $this->upload->data();
            $foto_berita = $foto_berita['file_name'];
            
            $data = array(
                'judul_berita' => $this->input->post('judul_berita'),
                'isi_berita' => htmlspecialchars($this->input->post('isi_berita', true)),
                'foto_berita' => $foto_berita,
                'tgl_berita' => date('Y-m-d')
            );
            $this->m_model->insert_data($data, 'berita');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhasil Ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/berita');
        }    
    }

    public function delete_berita($id)
    {
        $where = array('id_berita' => $id);

        $this->m_model->delete($where, 'berita');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data Berhasil Dihapus<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/berita');
    }

    public function edit_berita($id)
    {
        $data['title'] = 'Edit Berita';
        $data['admins'] = $this->db->get_where('admins', ['username__admin' =>
        $this->session->userdata('username__admin')])->row_array();
        $data['data_berita'] = $this->db->get_where('berita', ['id_berita' => htmlspecialchars($id)])->row_array();

        $this->load->view('components_admin/header', $data);
        $this->load->view('components_admin/sidebar', $data);
        $this->load->view('v_admin/edit_berita', $data);
        $this->load->view('components_admin/footer');
    }   
    
    public function edit_berita_aksi($id)
    {
        $config['upload_path']          = './assets/uploads_b/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 2048;
        $config['remove_spaces']        = TRUE;
        $config['detect_mime']          = TRUE;
        $config['mod_mime_fix']         = TRUE;
        $config['encrypt_name']         = TRUE;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('foto_berita')){
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Gagal Mengubah Data<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/berita');
        }
        else{
            $foto_berita = $this->upload->data();
            $foto_berita = $foto_berita['file_name'];
            
            $data = array(
                'id_berita' => $id,
                'judul_berita' => $this->input->post('judul_berita'),
                'isi_berita' => htmlspecialchars($this->input->post('isi_berita', true)),
                'foto_berita' => $foto_berita,
                'tgl_berita' => date('Y-m-d')
            );
            $this->m_model->update_berita($data, 'berita');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berita Berhasil Diubah<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/berita');
        }    
    }

    public function galeri()
    {
        $data['title'] = 'Galeri';
        $data['admins'] = $this->db->get_where('admins', ['username__admin' =>
        $this->session->userdata('username__admin')])->row_array();
        $data['data_galeri'] = $this->m_model->get_data('galeri')->result();

        $this->load->view('components_admin/header', $data);
        $this->load->view('components_admin/sidebar', $data);
        $this->load->view('v_admin/galeri', $data);
        $this->load->view('components_admin/footer');
    }

    public function tambah_galeri(){
        $config['upload_path']          = './assets/uploads_g/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 2048;
        $config['remove_spaces']        = TRUE;
        $config['detect_mime']          = TRUE;
        $config['mod_mime_fix']         = TRUE;
        $config['encrypt_name']         = TRUE;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('foto_galeri')){
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Gagal menambahkan galeri, mohon cek kembali!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/galeri');
        }
        else{
            $foto_galeri = $this->upload->data();
            $foto_galeri = $foto_galeri['file_name'];
            
            $data = array(
                'foto_galeri' => $foto_galeri
            );
            $this->m_model->insert_data($data, 'galeri');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhasil Ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/galeri');
        }    
    }

    public function delete_galeri($id)
    {
        $where = array('id_galeri' => $id);

        $this->m_model->delete($where, 'galeri');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data Berhasil Dihapus<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/galeri');
    }

    public function pdf(){

        $tgl_awal             = $this->input->post('tgl_awal');
        $tgl_akhir             = $this->input->post('tgl_akhir');
        $data = array(
            'tgl_awal'             => $this->input->post('tgl_awal'),
            'tgl_akhir'            => $this->input->post('tgl_akhir'),
            'data_masyarakat'    => $this->Pengaduan_m->laporan_pengaduan($tgl_akhir, $tgl_awal)->result_array()
        );
        $this->load->view('v_admin/pdf_data', $data);

        $paper_size = 'A4';
        $orientation = 'portrait';
        $html = $this->output->get_output();

        $pdf = new Dompdf();

        $pdf->setPaper($paper_size, $orientation);

        $pdf->loadHtml($html);
        $pdf->set_option('isRemoteEnabled', TRUE);
        $pdf->render();

        $pdf->stream("Data Pengaduan.pdf", array('Attachment' => 0)); 
    }
}
