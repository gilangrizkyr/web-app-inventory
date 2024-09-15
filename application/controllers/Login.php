<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{

    public function index()
    {
        $this->load->view('v_login');
    }

    public function validasi()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $cek = $this->db->query("SELECT * FROM users WHERE username ='$username' AND password ='$password'");
        
        if ($cek->num_rows() == 1) {
            $valid = $cek->row();

            // Set session data
            $session_data = array(
                'nama_lengkap' => $valid->nama_lengkap,
                'username' => $valid->username,
                'id' => $valid->id,
                'role_id' => $valid->role_id  // Ambil role_id dari hasil query
            );
            $this->session->set_userdata($session_data);

            // Redirect based on role_id
            if ($valid->role_id == 1) {
                redirect('home'); // Misalnya role_id 1 adalah admin
            } else {
                redirect('home'); // Misalnya role_id 2 adalah user biasa
            }

        } else {
            $this->session->set_flashdata('sweet_error', 'Username atau Password salah :(');
            redirect('login', 'refresh');
        }
    }
}
