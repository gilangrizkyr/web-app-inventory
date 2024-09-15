<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayatkeluar extends CI_Controller
{
    public function index()
    {
        // Query SQL untuk mengambil data riwayat keluar dari tabel barangkeluar
        $this->db->select('nama_barang, spesifikasi, jumlah, deleted_at');
        $this->db->from('barangkeluar');
        $this->db->order_by('deleted_at', 'DESC'); // Urutkan berdasarkan waktu terbaru
        $query = $this->db->get();
        
        // Periksa apakah query berhasil dijalankan
        if ($query && $query->num_rows() > 0) {
            $riwayat_keluar = $query->result(); // Hasil query disimpan dalam array
        } else {
            // Jika tidak ada data yang dikembalikan
            $riwayat_keluar = array(); // Atur $riwayat_keluar menjadi array kosong
            // Anda bisa menampilkan pesan kosong atau melakukan tindakan lainnya
            // Misalnya:
            // echo "Tidak ada riwayat barang keluar yang tersedia.";
        }

        $data = [
            'master' => 'active',
            'stock' => 'active',
            'riwayat_keluar' => $riwayat_keluar, // Kirim data riwayat_keluar ke view v_riwayatkeluar
        ];

        // Memuat view v_riwayatkeluar sebagai string dan menyimpannya dalam variabel $data['konten']
        $data['konten'] = $this->load->view('v_riwayatkeluar', $data, TRUE);

        // Load template untuk struktur halaman
        $this->load->view('widget/template', $data); // Template untuk struktur halaman
    }

}
?>
