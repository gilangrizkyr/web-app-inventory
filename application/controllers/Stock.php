<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stock extends CI_Controller
{
    public function index()
    {
        // Ambil data dari tabel stock
        $stocks = $this->db->query("SELECT * FROM stock ORDER BY id DESC")->result();

        // Siapkan data untuk dikirim ke view
        $konten = [
            'stocks' => $stocks
        ];

        // Siapkan data untuk template
        $data = [
            'master' => 'active',
            'stock' => 'active',
            'konten' => $this->load->view('v_stock', $konten, TRUE)
        ];

        // Tampilkan view dengan template
        $this->load->view('widget/template', $data);
    }
}
