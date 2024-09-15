<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('auth');
    }

    public function index()
    {
        $this->load->view('v_register');
    }

    public function proses()
    {
        $this->form_validation->set_rules('username', 'username','trim|required|min_length[1]|max_length[255]|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'password','trim|required|min_length[1]|max_length[255]');
        $this->form_validation->set_rules('nama_lengkap', 'nama_lengkap','trim|required|min_length[1]|max_length[255]');
        $this->form_validation->set_rules('no_hp', 'no_hp','trim|required|min_length[1]|max_length[255]');
        $this->form_validation->set_rules('email', 'email','trim|required|min_length[1]|max_length[255]');
        
        if ($this->form_validation->run()==true)
        {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $nama_lengkap = $this->input->post('nama_lengkap');
            $no_hp = $this->input->post('no_hp');
            $email = $this->input->post('email');
            $this->auth->register($username,$password,$nama_lengkap,$no_hp,$email);
            $this->session->set_flashdata('success_register','Proses Pendaftaran User Berhasil');
            redirect('login');
        }
        else
        {
            $this->session->set_flashdata('error', validation_errors());
            redirect('register');
        }
    }
}