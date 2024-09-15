<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
    public function index()
    {
        // Query SQL untuk mengambil data dari stock dengan menghubungkannya ke barangmasuk berdasarkan nama_barang
        $query = $this->db->query("SELECT s.*, bm.* 
                                   FROM stock s
                                   LEFT JOIN barangmasuk bm ON s.nama_barang = bm.nama_barang 
                                   ORDER BY s.id DESC");
        $stocks = $query->result(); // Mengambil hasil query ke dalam array
        $this->db->order_by('idmasuk', 'DESC'); 

        // Query SQL untuk mengambil data dari tabel barangmasuk
        $query_barangmasuk = $this->db->get('barangmasuk');
        $barangmasuk = $query_barangmasuk->result(); // Mengambil hasil query ke dalam array

        // Mengirimkan data $stocks ke view v_barang
        $data['users'] = $stocks;

        // Mengirimkan data $barangmasuk ke view v_barang
        $data['barang_masuk'] = $barangmasuk;

        // Memuat view v_barang sebagai string dan menyimpannya dalam variabel $data['master']
        $data['konten'] = $this->load->view('v_barang', $data, TRUE);

        // Mengirimkan $data ke view template.php untuk dimuat
        $this->load->view('widget/template', $data);
    }

    // Controller: Barang.php
    // Controller: Barang.php
    public function ajax_search_nama_barang()
    {
        $searchTerm = $this->input->get('q'); // Ambil parameter pencarian dari URL

        // Query untuk mencari barang berdasarkan nama_barang
        $this->db->select('nama_barang AS id, nama_barang AS text'); // Mengatur hasil query sesuai format yang dibutuhkan oleh Select2
        $this->db->like('nama_barang', $searchTerm);
        $this->db->group_by('nama_barang'); // Mengelompokkan hasil query berdasarkan nama_barang
        $query = $this->db->get('barangmasuk'); // Mengambil data dari tabel barangmasuk

        $barang = $query->result_array(); // Mengambil hasil query ke dalam array

        echo json_encode($barang); // Mengembalikan data dalam format JSON
    }
}
