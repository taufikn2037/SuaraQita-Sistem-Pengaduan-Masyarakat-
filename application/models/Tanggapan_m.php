<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tanggapan_m extends CI_Model {

	private $table = 'tanggapan';

	public function create($data)
	{
		return $this->db->insert($this->table, $data);
	}
}
