<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaduan_m extends CI_Model
{

	private $table = 'pengaduan';

	public function create($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function data_pengaduan()
	{
		$this->db->select('pengaduan.*,users.name__user, users.no_telepon, kategori.nama_kategori');
		$this->db->from($this->table);
		$this->db->join('users', 'users.id_user = pengaduan.id_user', 'inner');
		$this->db->join('kategori', 'kategori.id_kategori = pengaduan.id_kategori','inner');
		$this->db->where('status', '0');
		return $this->db->get();
	}

	public function data_pengaduan_users_id_user($id_user, $status = null)
	{
		$this->db->select('pengaduan.*,users.name__user, kategori.nama_kategori	');
		$this->db->from($this->table);
		$this->db->join('users', 'users.id_user = pengaduan.id_user', 'inner');
		$this->db->join('kategori', 'kategori.id_kategori = pengaduan.id_kategori','inner');
		$this->db->where('pengaduan.id_user', $id_user);
		if($status){
			$this->db->where('pengaduan.status', $status);
		}
		return $this->db->get();
	}

	public function data_pengaduan_users_proses()
	{
		$this->db->select('pengaduan.*,users.name__user, users.no_telepon');
		$this->db->from($this->table);
		$this->db->join('users', 'users.id_user = pengaduan.id_user', 'inner');
		$this->db->where('status', 'proses');
		return $this->db->get();
	}

	public function data_pengaduan_users_selesai()
	{
		$this->db->select('pengaduan.*,users.name__user, users.no_telepon');
		$this->db->from($this->table);
		$this->db->join('users', 'users.id_user = pengaduan.id_user', 'inner');
		$this->db->where('status', 'selesai');
		return $this->db->get();
	}

	public function data_pengaduan_users_tolak()
	{
		$this->db->select('pengaduan.*,users.name__user, users.no_telepon');
		$this->db->from($this->table);
		$this->db->join('users', 'users.id_user = pengaduan.id_user', 'inner');
		$this->db->where('status', 'tolak');
		return $this->db->get();
	}

	public function data_pengaduan_users_id($id_user)
	{
		$this->db->select('pengaduan.*,users.name__user, kategori.nama_kategori	');
		$this->db->from($this->table);
		$this->db->join('users', 'users.id_user = pengaduan.id_user', 'inner');
		$this->db->join('kategori', 'kategori.id_kategori = pengaduan.id_kategori','inner');
		$this->db->where('pengaduan.id_pengaduan', $id_user);
		return $this->db->get();
	}

	public function data_pengaduan_tanggapan($id)
	{
		$this->db->select('pengaduan.*,tanggapan.tgl_tanggapan,tanggapan.tanggapan');
		$this->db->from($this->table);
		$this->db->join('tanggapan', 'tanggapan.id_pengaduan = pengaduan.id_pengaduan', 'inner');
		$this->db->where('pengaduan.id_pengaduan', $id);
		return $this->db->get();
	}

	public function laporan_pengaduan($tgl_akhir = null, $tgl_awal = null)
	{
		$this->db->select('pengaduan.*, users.name__user, users.nik__user, tanggapan.tgl_tanggapan, tanggapan.tanggapan, admins.name__admin');
		$this->db->from('pengaduan');
		$this->db->join('users', 'users.id_user = pengaduan.id_user', 'left');
		$this->db->join('tanggapan', 'tanggapan.id_pengaduan = pengaduan.id_pengaduan', 'left');
		$this->db->join('admins', 'admins.id_admin = tanggapan.id_admin', 'left');
		if($tgl_awal && $tgl_akhir){
			$this->db->where('pengaduan.tgl_pengaduan BETWEEN "'.$tgl_awal.'" AND "'.$tgl_akhir.'"');
		}
		return $this->db->get();
	}
}
