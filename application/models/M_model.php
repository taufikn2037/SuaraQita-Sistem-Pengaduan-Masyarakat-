<?php

class M_model extends CI_Model
{
	private $table = 'users_role';

	public function get_data($table){
		return $this->db->get($table);
	}

	public function insert_data($data, $table){
		$this->db->insert($table, $data);
	}

	public function update_data($data, $table){
		$this->db->where('id_admin', $data['id_admin']);
		$this->db->update($table, $data);
	}

	public function update_kategori($data, $table){
		$this->db->where('id_kategori', $data['id_kategori']);
		$this->db->update($table, $data);
	}

	public function rating_pengaduan($data, $table){
		$this->db->where('id_pengaduan', $data['id_pengaduan']);
		$this->db->update($table, $data);
	}

	public function update_berita($data, $table){
		$this->db->where('id_berita', $data['id_berita']);
		$this->db->update($table, $data);
	}

	public function delete($where, $table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function get_kategori(){
		$query = $this->db->query("SELECT * FROM kategori ORDER BY nama_kategori ASC");

		return $query->result();
	}

	public function get_berita(){
		$query = $this->db->query("SELECT * FROM berita");

		return $query->result();
	}

	public function get_galeri(){
		$query = $this->db->query("SELECT * FROM galeri");

		return $query->result();
	}

}
