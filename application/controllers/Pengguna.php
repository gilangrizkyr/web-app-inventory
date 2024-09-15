<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{
	// READ

	public function index()
	{
		$users = $this->db->query("SELECT * FROM users ORDER BY id DESC")->result();

		$koten = [
			'users' => $users
		];


		$data =  [
			'master' => 'active',
			'pengguna' => 'active',
			'konten' => $this->load->view('v_pengguna', $koten, TRUE)

		];
		$this->load->view('widget/template', $data);
	}

	// CREATE

	public function tambahpengguna()
	{
		$koten = [];

		$data =  [
			'master' => 'active',
			'pengguna' => 'active',
			'konten' => $this->load->view('v_tambahpengguna', $koten, TRUE)

		];
		$this->load->view('widget/template', $data);
	}

	public function editpengguna($id)
	{
		$cek = $this->db->query("SELECT * FROM users WHERE id='$id'")->row();
		$koten = [
			'cek'=>$cek
		];

		$data =  [
			'master' => 'active',
			'pengguna' => 'active',
			'konten' => $this->load->view('v_editpengguna', $koten, TRUE)

		];
		$this->load->view('widget/template', $data);
	}


	public function simpan()
	{

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$nama_lengkap = $this->input->post('nama_lengkap');
		$no_hp = $this->input->post('no_hp');
		$email = $this->input->post('email');

		$data = [
			'username' => $username,
			'password' => $password,
			'nama_lengkap' => $nama_lengkap,
			'no_hp' => $no_hp,
			'email' => $email,

		];
		$this->db->insert('users', $data);

		$this->session->set_flashdata('sweet_success', 'Data Berhasil Disimpan');
		redirect('pengguna');
	}

	public function update()
	{

		$id = $this->input->post('id');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$nama_lengkap = $this->input->post('nama_lengkap');
		$no_hp = $this->input->post('no_hp');
		$email = $this->input->post('email');

		$data = [
			'username' => $username,
			'password' => $password,
			'nama_lengkap' => $nama_lengkap,
			'no_hp' => $no_hp,
			'email' => $email,

		];
		$this->db->where('id', $id);
		$this->db->update('users', $data);

		$this->session->set_flashdata('sweet_success', 'Data Berhasil Disimpan');
		redirect('pengguna');
	}

	public function hapus()
	{

		$id = $this->input->post('id');
	
		$this->db->where('id', $id);
		$this->db->delete('users');

		$this->session->set_flashdata('sweet_success', 'Data Berhasil Dihapus');
		redirect('pengguna');
	}
}