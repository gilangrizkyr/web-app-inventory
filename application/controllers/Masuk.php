<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masuk extends CI_Controller
{
	// READ

	public function index()
	{
		$data = $this->m_masuk->GetDataMasuk();
		$this->load->view('v_masuk', array ('data'=> $data));
	}

	public function add_data()
	{
		$this->load->view('add_masuk');
	}

	public function do_insert()
	{
		$idmasuk = $_POST['idmasuk'];
		$penerima = $_POST['penerima'];
		$jumlah = $_POST['jumlah'];
		$id = $_POST['id'];
		$data_insert = array(
			'idmasuk'=> $idmasuk,
			'penerima'=> $penerima,
			'jumlah'=> $jumlah,
			'id' => $id
		);
		$spn =$this->m_masuk->InsertData('masuk',$data_insert);
		if ($spn>=1) {
			redirect('masuk/index');
		}
	}

	public function edit_data($idmasuk)
	{
		$usr = $this->m_masuk->GetDataMasuk("where idmasuk = '$idmasuk'");
		$data = array(
			"idmasuk" => $usr[0]['idmasuk'],
			"penerima" => $usr[0]['penerima'],
			"jumlah" => $usr[0]['jumlah'],
			"id" => $usr[0]['id']
		);
		$this->load->view('edit_masuk', $data);
	}

	public function do_update()
	{
		$idmasuk = $_POST['idmasuk'];
		$penerima = $_POST['penerima'];
		$jumlah = $_POST['jumlah'];
		$id = $_POST['id'];
		$data_insert = array(
			'idmasuk'=> $idmasuk,
			'penerima'=> $penerima,
			'jumlah'=> $jumlah,
			'id' => $id
		);
		$where = array('idmasuk' => $idmasuk);
		$spn =$this->m_masuk->UpdateData('masuk',$data_update,$where);
		if ($spn>=1) {
			redirect('masuk/index');
		}
	}

	public function do_delete($idmasuk)
	{
		$where = array('idmasuk' => $idmasuk);
		$spn =$this->m_masuk->DeleteData('masuk',$where);
		if ($spn>=1) {
			redirect('masuk/index');
		}
	}

}