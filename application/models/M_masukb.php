<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_masukb extends CI_Model
{
	// READ
	public function GetDataBarang($where="")
	{
		$data = $this->db->query('select * from barang'.$where);
		return $data->result_array();
	}

	function JoinAllTable(){
		$this->db->select('*');
		$this->db->from('barang b');
		$this->db->join('masuk u', 'u.id = b.id');
		$query=$this->db->get();
		return $query->result_array();
	}

}