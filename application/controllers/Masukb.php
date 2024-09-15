<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masukb extends CI_Controller
{
	// READ

	public function load_barang()
	{
		$data = $this->m_masukb->GetDataBarang();
		$this->load->view('v_masukb', array('data' => $data));
	}

	public function load_tablejoin()
	{
		$data = $this->m_masukb->JoinAllTable();
		$this->load->view('v_masukjoin', array('dataa' => $data));
	}

}