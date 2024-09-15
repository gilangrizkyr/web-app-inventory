<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_masuk extends CI_Model
{
	// READ
	public function GetDataMasuk($where="")
	{
		$data = $this->db->query('select * from masuk'.$where);
		return $data->result_array();
	}

	public function InsertData($tableName,$data)
	{
		$spn =$this->db->insert($tableName,$data);
		return $spn;
	}

	public function UpdateData($tableName,$data)
	{
		$spn =$this->db->update($tableName,$data);
		return $spn;
	}

	public function DeleteData($tableName,$data)
	{
		$spn =$this->db->delete($tableName,$data);
		return $spn;
	}

}