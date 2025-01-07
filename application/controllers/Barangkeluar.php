<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barangkeluar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load database library untuk query
        $this->load->database();
    }
    public function search_barang()
    {
        $nama_barang = $this->input->get('nama_barang');
    
        log_message('debug', 'Pencarian barang dengan nama: ' . $nama_barang);
    
        $this->db->like('nama_barang', $nama_barang);
        $query = $this->db->get('stock');
    
        if ($query === false) {
            log_message('error', 'Query error: ' . $this->db->_error_message());
            echo "Error in query";
            return;
        }
    
        $barang = $query->result();
    
        if (!empty($barang)) {
            echo "<div style='display: flex; flex-wrap: wrap; justify-content: flex-start; gap: 10px;'>";
            foreach ($barang as $item) {
                echo "<div class='barang-item' onclick='selectBarang(\"" . $item->nama_barang . "\", \"" . $item->spesifikasi . "\")' style='cursor: pointer; width: calc(33.33% - 10px); margin-bottom: 15px; border: 1px solid #ddd; padding: 15px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); background-color: #f9f9f9; box-sizing: border-box;'>";
                echo "<h5 style='margin: 0; color: #2c3e50; font-weight: bold;'>" . $item->nama_barang . "</h5>";
                echo "<p style='margin: 5px 0; color: #7f8c8d;'>Spesifikasi: " . $item->spesifikasi . "</p>";
                echo "<p style='margin: 5px 0; color: #2ecc71; font-weight: bold;'>Jumlah Tersedia: " . $item->jumlah . "</p>";
                echo "<p style='margin: 5px 0; color: #e67e22; font-weight: bold;'>Harga: Rp. " . number_format($item->harga, 0, ',', '.') . "</p>";
                echo "</div>";
            }
            echo "</div>";
        } else {
            echo "<p>Tidak ada barang yang ditemukan.</p>";
        }
        
    }
    
    
    
    

    // Fungsi untuk memilih barang (misalnya untuk autofill input nama barang)
    public function pilih_barang()
    {
        // Ambil parameter barang yang dipilih
        $nama_barang = $this->input->get('nama_barang');

        // Set nama barang ke input field
        echo $nama_barang;
    }
    public function index()
    {
        $barangkeluar = $this->db->query("SELECT * FROM barangkeluar ORDER BY idkeluar DESC")->result();

        $konten = [
            'barangkeluar' => $barangkeluar
        ];


        $data =  [
            'master' => 'active',
            'masuk' => 'active',
            'konten' => $this->load->view('v_barangkeluar', $konten, TRUE)

        ];
        $this->load->view('widget/template', $data);
    }

    public function editkeluar($idkeluar = null)
    {
        if (!$idkeluar) {
            // Handle jika idkeluar tidak ada
            $this->session->set_flashdata('sweet_error', 'ID Barang Keluar tidak valid.');
            redirect('barangkeluar/index');
        }

        // Jika form disubmit (POST request), proses penyimpanan perubahan
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Ambil data yang di-post dari form
            $jumlah_keluar_baru = $this->input->post('jumlah_keluar');

            // Ambil data barang keluar dari tabel barangkeluar
            $query = $this->db->where('idkeluar', $idkeluar)->get('barangkeluar');
            $barang_keluar = $query->row();

            if (!$barang_keluar) {
                // Handle jika barang keluar tidak ditemukan
                $this->session->set_flashdata('sweet_error', 'Barang keluar tidak ditemukan.');
                redirect('barangkeluar/index');
            }

            // Ambil jumlah keluar lama
            $jumlah_keluar_lama = $barang_keluar->jumlah_keluar;

            // Hitung perubahan jumlah keluar
            $perubahan_keluar = $jumlah_keluar_baru - $jumlah_keluar_lama;

            // Update jumlah keluar di tabel barangkeluar
            $data_barang_keluar = [
                'jumlah_keluar' => $jumlah_keluar_baru,
            ];
            $this->db->where('idkeluar', $idkeluar);
            $this->db->update('barangkeluar', $data_barang_keluar);

            // Update jumlah stok di tabel barangmasuk (jika perlu)
            // Misal, mencari barang masuk berdasarkan nama_barang
            $query_barang_masuk = $this->db->where('nama_barang', $barang_keluar->nama_barang)->get('barangmasuk');
            $barang_masuk = $query_barang_masuk->row();

            if ($barang_masuk) {
                // Kurangi stok barang masuk sesuai dengan perubahan jumlah keluar
                $new_jumlah = $barang_masuk->jumlah + $perubahan_keluar;
                $this->db->where('idmasuk', $barang_masuk->idmasuk);
                $this->db->update('barangmasuk', ['jumlah' => $new_jumlah]);
            }

            // Set flashdata sukses
            $this->session->set_flashdata('sweet_success', 'Data barang keluar berhasil diupdate.');

            // Redirect ke halaman index
            redirect('barangkeluar/index');
        } else {
            // Jika bukan POST request, tampilkan form edit
            // Query untuk mengambil data barangkeluar berdasarkan idkeluar
            $query = $this->db->where('idkeluar', $idkeluar)->get('barangkeluar');
            $barangkeluar = $query->row();

            if (!$barangkeluar) {
                // Handle jika data tidak ditemukan
                $this->session->set_flashdata('sweet_error', 'Data tidak ditemukan.');
                redirect('barangkeluar/index');
            }

            // Data untuk dikirim ke view v_editkeluar
            $data = [
                'master' => 'active',
                'barangkeluar' => 'active',
                'cek' => $barangkeluar,
            ];

            $data['konten'] = $this->load->view('v_editkeluar', $data, TRUE);

            // Memuat template dengan $data
            $this->load->view('widget/template', $data);
        }
    }

    public function hapus1()
    {
        $idkeluar = $this->input->post('idkeluar');

        // Ambil data barangkeluar yang akan dihapus
        $barangkeluar = $this->db->where('idkeluar', $idkeluar)->get('barangkeluar')->row();

        if (!$barangkeluar) {
            // Handle jika data tidak ditemukan
            $this->session->set_flashdata('sweet_error', 'Data tidak ditemukan.');
            redirect('barangkeluar/index');
        }

        // Lakukan penghapusan data dengan melakukan soft delete
        $this->db->set('deleted_at', date('Y-m-d H:i:s'));
        $this->db->where('idkeluar', $idkeluar);
        $this->db->update('barangkeluar');

        // Set pesan sukses
        $this->session->set_flashdata('sweet_success', 'Data Berhasil Dihapus');

        // Redirect ke halaman barangkeluar/index
        redirect('barangkeluar/index');
    }

    public function tambahkeluar()
    {
        $data = [
            'master' => 'active',
            'stock' => 'active'
        ];

        // Muat view v_tambahkeluar dan simpan hasilnya ke $data['konten']
        $data['konten'] = $this->load->view('v_tambahkeluar', $data, TRUE);

        // Muat template untuk struktur halaman
        $this->load->view('widget/template', $data);
    }

    public function tambahkeluar_proses()
    {
        // Ambil data yang di-post dari form
        $nama_barang = $this->input->post('nama_barang');
        $spesifikasi = $this->input->post('spesifikasi');
        $jumlah = $this->input->post('jumlah');

        // Validasi data input
        if (empty($nama_barang) || empty($spesifikasi) || empty($jumlah)) {
            $this->session->set_flashdata('sweet_error', 'Semua field harus diisi.');
            redirect('barangkeluar/tambahkeluar');
        }

        // Ambil data barang masuk dari tabel barangmasuk (misal berdasarkan nama_barang dan spesifikasi)
        $query = $this->db->where('nama_barang', $nama_barang)
            ->where('spesifikasi', $spesifikasi)
            ->get('barangmasuk');
        $barang_masuk = $query->row();

        if (!$barang_masuk) {
            // Handle jika barang masuk tidak ditemukan
            $this->session->set_flashdata('sweet_error', 'Barang masuk tidak ditemukan.');
            redirect('barangkeluar/tambahkeluar');
        }

        // Pastikan jumlah yang diminta tidak melebihi jumlah yang tersedia di barangmasuk
        if ($jumlah > $barang_masuk->jumlah) {
            // Handle jika jumlah melebihi jumlah barang yang tersedia
            $this->session->set_flashdata('sweet_error', 'Jumlah yang diminta melebihi jumlah barang yang tersedia.');
            redirect('barangkeluar/tambahkeluar');
        }

        // Set data untuk dimasukkan ke tabel barangkeluar
        $data_barang_keluar = [
            'nama_barang' => $nama_barang,  // Menggunakan nama_barang dari barangmasuk
            'spesifikasi' => $spesifikasi,
            'jumlah' => $jumlah,
            'deleted_at' => date('Y-m-d H:i:s')  // Tambahkan waktu keluar saat ini
        ];

        // Masukkan data ke tabel barangkeluar
        $this->db->insert('barangkeluar', $data_barang_keluar);

        // Kurangi stok di tabel barangmasuk
        $new_jumlah = $barang_masuk->jumlah - $jumlah;
        $this->db->where('idmasuk', $barang_masuk->idmasuk);  // Sesuaikan dengan primary key tabel barangmasuk
        $this->db->update('barangmasuk', ['jumlah' => $new_jumlah]);

        // Set flashdata sukses
        $this->session->set_flashdata('sweet_success', 'Barang keluar berhasil diinput.');

        // Redirect ke halaman barangkeluar/index
        redirect('barangkeluar/index');
    }

    public function hapus()
    {
        $nama_barang = $this->input->post('nama_barang');
        $spesifikasi = $this->input->post('spesifikasi');
        $jumlah = $this->input->post('jumlah');

        // Validasi jika spesifikasi yang diberikan adalah salah
        $valid_spesifikasi = ['tk', 'sd', 'smp', 'mts', 'sma', 'smk'];
        if (!in_array($spesifikasi, $valid_spesifikasi)) {
            // Handle jika spesifikasi tidak valid
            $this->session->set_flashdata('sweet_error', 'Spesifikasi tidak valid.');
            redirect('barangkeluar');
        }

        // Query untuk mendapatkan data barangkeluar berdasarkan nama_barang dan spesifikasi
        $this->db->where('nama_barang', $nama_barang);
        $this->db->where('spesifikasi', $spesifikasi);
        $query = $this->db->get('barangkeluar');
        $barangkeluar = $query->row();

        if (!$barangkeluar) {
            // Handle jika barang keluar tidak ditemukan
            $this->session->set_flashdata('sweet_error', 'Barang keluar tidak ditemukan.');
            redirect('barangkeluar');
        }

        // Pastikan jumlah yang diminta tidak melebihi jumlah barang yang tersedia
        if ($jumlah > $barangkeluar->jumlah) {
            // Handle jika jumlah melebihi jumlah barang yang tersedia
            $this->session->set_flashdata('sweet_error', 'Jumlah yang diminta melebihi jumlah barang yang tersedia.');
            redirect('barangkeluar');
        }

        // Lakukan pengurangan jumlah barang di tabel barangkeluar
        $new_jumlah = $barangkeluar->jumlah - $jumlah;

        // Jika jumlah menjadi 0, hapus record dari barangkeluar
        if ($new_jumlah === 0) {
            $this->db->where('nama_barang', $nama_barang);
            $this->db->where('spesifikasi', $spesifikasi);
            $this->db->delete('barangkeluar');
        } else {
            // Update jumlah barang yang tersisa di barangkeluar
            $this->db->set('jumlah', $new_jumlah);
            $this->db->where('nama_barang', $nama_barang);
            $this->db->where('spesifikasi', $spesifikasi);
            $this->db->update('barangkeluar');
        }

        // Set data untuk dimasukkan ke stock_keluar
        $data_stock_keluar = [
            'nama_barang' => $nama_barang,
            'spesifikasi' => $spesifikasi,
            'jumlah' => $jumlah,
            'deleted_at' => date('Y-m-d H:i:s')  // Tambahkan waktu keluar saat ini
        ];

        // Masukkan data ke stock_keluar
        $this->db->insert('stock_keluar', $data_stock_keluar);

        // Set flashdata sukses
        $this->session->set_flashdata('sweet_success', 'Barang berhasil dihapus dari stock keluar.');

        // Redirect ke halaman riwayatkeluar
        redirect('riwayatkeluar');
    }

    public function simpan()
    {
        $nama_barang = $this->input->post('nama_barang');
        $jumlah = $this->input->post('jumlah');
        $spesifikasi = $this->input->post('spesifikasi');
        $harga = $this->input->post('harga');

        // Ambil tanggal dan waktu saat ini
        $created_at = date('Y-m-d H:i:s');  // Format: YYYY-MM-DD HH:MM:SS


        // Query untuk memeriksa apakah barang sudah ada berdasarkan nama dan spesifikasi
        $this->db->where('nama_barang', $nama_barang);
        $this->db->where('spesifikasi', $spesifikasi);
        $query = $this->db->get('barangmasuk');
        $barang = $query->row();

        if ($barang) {
            // Jika barang sudah ada, tambahkan jumlah stok yang baru diinputkan
            $new_jumlah = $barang->jumlah + $jumlah;

            // Update stok barangmasuk berdasarkan nama_barang dan spesifikasi
            $this->db->where('nama_barang', $nama_barang);
            $this->db->where('spesifikasi', $spesifikasi);
            $this->db->update('barangmasuk', ['jumlah' => $new_jumlah]);

            $this->session->set_flashdata('sweet_success', 'Stok Barang berhasil ditambahkan.');
        } else {
            // Jika barang belum ada, buat data baru dan masukkan ke database
            $data = [
                'nama_barang' => $nama_barang,
                'jumlah' => $jumlah,
                'spesifikasi' => $spesifikasi,
                'harga' => $harga,
                'created_at' => $created_at  // Sertakan created_at

            ];
            $this->db->insert('barangmasuk', $data);

            $this->session->set_flashdata('sweet_success', 'Data Barang baru berhasil disimpan.');
        }

        redirect('barangmasuk/index');
    }

    public function update()
    {
        $idkeluar = $this->input->post('idkeluar');
        $nama_barang = $this->input->post('nama_barang');
        $jumlah = $this->input->post('jumlah');
        $alasan = $this->input->post('alasan');


        // Ambil data barang keluar berdasarkan idkeluar
        $query_keluar = $this->db->where('idkeluar', $idkeluar)->get('barangkeluar');
        $barangkeluar = $query_keluar->row();

        if (!$barangkeluar) {
            // Handle jika data barang keluar tidak ditemukan
            $this->session->set_flashdata('sweet_error', 'Data barang keluar tidak ditemukan.');
            redirect('barangkeluar/index');
        }

        // Ambil data barang masuk berdasarkan nama barang dan spesifikasi
        $this->db->where('nama_barang', $nama_barang);

        $query_masuk = $this->db->get('barangmasuk');
        $barangmasuk = $query_masuk->row();

        if (!$barangmasuk) {
            // Handle jika data barang masuk tidak ditemukan
            $this->session->set_flashdata('sweet_error', 'Data barang masuk tidak ditemukan.');
            redirect('barangkeluar/index');
        }

        // Hitung jumlah barang masuk yang baru
        $new_jumlah_masuk = $barangmasuk->jumlah + ($barangkeluar->jumlah - $jumlah);

        // Pastikan tidak kurang dari nol
        if ($new_jumlah_masuk < 0) {
            $this->session->set_flashdata('sweet_error', 'Jumlah yang diminta melebihi jumlah barang masuk yang tersedia.');
            redirect('barangkeluar/index');
        }

        // Update data barang keluar
        $data_keluar = [
            'nama_barang' => $nama_barang,
            'jumlah' => $jumlah,
            'alasan' => $alasan,

        ];
        $this->db->where('idkeluar', $idkeluar);
        $this->db->update('barangkeluar', $data_keluar);

        // Update data barang masuk
        $data_masuk = [
            'jumlah' => $new_jumlah_masuk,
        ];
        $this->db->where('nama_barang', $nama_barang);

        $this->db->update('barangmasuk', $data_masuk);

        // Set pesan sukses
        $this->session->set_flashdata('sweet_success', 'Data Barang Keluar Berhasil Diupdate.');

        // Redirect ke halaman barang keluar
        redirect('barangkeluar/index');
    }



    public function get_barangmasuk()
    {
        $search = $this->input->get('search'); // Mendapatkan term pencarian dari AJAX request

        // Query untuk mencari data barangmasuk berdasarkan nama_barang
        $this->db->like('nama_barang', $search);
        $barangmasuk = $this->db->get('barangmasuk')->result_array();

        // Mengembalikan data dalam format JSON
        echo json_encode($barangmasuk);
    }
}
