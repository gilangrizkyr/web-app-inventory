<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayatmasuk extends CI_Controller
{
    public function index()
    {
        // Query SQL untuk mengambil data riwayat masuk dari tabel barangmasuk
        $this->db->select('nama_barang, jumlah, spesifikasi, created_at');
        $this->db->from('barangmasuk');
        $this->db->order_by('created_at', 'DESC'); // Urutkan berdasarkan waktu terbaru
        $query = $this->db->get();
        $riwayat_masuk = $query->result(); // Hasil query disimpan dalam array

        $data = [
            'master' => 'active',
            'stock' => 'active',
            'riwayat_masuk' => $riwayat_masuk, // Kirim data riwayat_masuk ke view v_riwayatmasuk
        ];

         // Memuat view v_barang sebagai string dan menyimpannya dalam variabel $data['master']
         $data['konten'] = $this->load->view('v_riwayatmasuk', $data, TRUE);

        // Load view v_riwayatmasuk dengan data yang dikirim
     
        $this->load->view('widget/template', $data); // Template untuk struktur halaman
    }
}
