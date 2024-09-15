<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barangmasuk extends CI_Controller
{
	// READ

	public function index()
	{
		$users = $this->db->query("SELECT * FROM barangmasuk ORDER BY idmasuk DESC")->result();
		

		$konten = [
			'users' => $users
		];


		$data =  [
			'master' => 'active',
			'masuk' => 'active',
			'konten' => $this->load->view('v_barangmasuk', $konten, TRUE)

		];
		$this->load->view('widget/template', $data);
	}

	public function tambahmasuk()
	{
		$konten = [];

		$data = [
			'master' => 'active',
			'barangmasuk' => 'active',
			'konten' => $this->load->view('v_tambahmasuk', $konten, TRUE)
		];
		$this->load->view('widget/template', $data);
	}


	public function simpan()
    {
        $nama_barang = $this->input->post('nama_barang');
        $jumlah = $this->input->post('jumlah');
        $spesifikasi = $this->input->post('spesifikasi');
        $harga = $this->input->post('harga');

        // Ambil tanggal dan waktu saat ini
        $created_at = date('Y-m-d H:i:s');  // Format: YYYY-MM-DD HH:MM:SS

        // Query untuk memeriksa apakah barang sudah ada berdasarkan nama dan spesifikasi di tabel barangmasuk
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

            $idmasuk = $barang->idmasuk;

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

            $idmasuk = $this->db->insert_id(); // Dapatkan ID dari data yang baru saja dimasukkan

            $this->session->set_flashdata('sweet_success', 'Data Barang baru berhasil disimpan.');
        }

        // Query untuk memeriksa apakah barang sudah ada berdasarkan nama dan spesifikasi di tabel stock
        $this->db->where('nama_barang', $nama_barang);
        $this->db->where('spesifikasi', $spesifikasi);
        $query_stock = $this->db->get('stock');
        $stock = $query_stock->row();

        if ($stock) {
            // Jika barang sudah ada di tabel stock, tambahkan jumlah stok yang baru diinputkan
            $new_stock_jumlah = $stock->jumlah + $jumlah;

            // Update stok di tabel stock berdasarkan nama_barang dan spesifikasi
            $this->db->where('nama_barang', $nama_barang);
            $this->db->where('spesifikasi', $spesifikasi);
            $this->db->update('stock', ['jumlah' => $new_stock_jumlah]);
        } else {
            // Jika barang belum ada di tabel stock, buat data baru dan masukkan ke database
            $data_stock = [
                'nama_barang' => $nama_barang,
                'spesifikasi' => $spesifikasi,
                'jumlah' => $jumlah,
                'harga' => $harga,
                'idmasuk' => $idmasuk  // Tambahkan idmasuk yang terhubung dengan tabel barangmasuk
            ];
            $this->db->insert('stock', $data_stock);
        }

        redirect('barangmasuk/index');
    }

    // ... (fungsi lainnya tetap sama)



	public function editmasuk($id)
	{
		$cek = $this->db->query("SELECT * FROM barangmasuk WHERE idmasuk='$id'")->row();
		$konten = [
			'cek' => $cek
		];

		$data =  [
			'master' => 'active',
			'barangmasuk' => 'active',
			'konten' => $this->load->view('v_editmasuk', $konten, TRUE)

		];
		$this->load->view('widget/template', $data);
	}

	public function update()
{
    $idmasuk = $this->input->post('idmasuk');
    $nama_barang = $this->input->post('nama_barang');
    $spesifikasi = $this->input->post('spesifikasi');
    $harga = $this->input->post('harga');
    $jumlah = $this->input->post('jumlah');
    $alasan = $this->input->post('alasan');

    // Query untuk mendapatkan data barang masuk lama sebelum di-update
    $barang_masuk_lama = $this->db->where('idmasuk', $idmasuk)->get('barangmasuk')->row();

    // Update data barang masuk di tabel barangmasuk
    $data = [
        'nama_barang' => $nama_barang,
        'spesifikasi' => $spesifikasi,
        'harga' => $harga,
        'jumlah' => $jumlah,
    ];
    $this->db->where('idmasuk', $idmasuk);
    $this->db->update('barangmasuk', $data);

    // Tambahkan log ke tabel history
    $history_data = [
        'idmasuk' => $idmasuk,
        'nama_barang' => $barang_masuk_lama->nama_barang,
        'spesifikasi' => $barang_masuk_lama->spesifikasi,
        'jumlah' => $barang_masuk_lama->jumlah,
        'harga' => $barang_masuk_lama->harga,
        'aksi' => 'edit',
        'alasan' => $alasan
    ];
    $this->db->insert('history', $history_data);

    // Set pesan sukses
    $this->session->set_flashdata('sweet_success', 'Data Barang Masuk Berhasil Diupdate.');

    // Redirect ke halaman barang masuk
    redirect('barangmasuk/index');
}

public function hapus()
{
    $idmasuk = $this->input->post('idmasuk');
    $alasan = $this->input->post('alasan');

    // Validasi apakah alasan telah diisi
    if (empty($alasan)) {
        $this->session->set_flashdata('error', 'Alasan penghapusan harus diisi.');
        redirect('barangmasuk/index');
    }

    // Query untuk mendapatkan data barang masuk sebelum dihapus
    $barang_masuk = $this->db->where('idmasuk', $idmasuk)->get('barangmasuk')->row();

    // Hapus data barang masuk
    $this->db->where('idmasuk', $idmasuk);
    $this->db->delete('barangmasuk');

    // Tambahkan log ke tabel history
    $history_data = [
        'idmasuk' => $idmasuk,
        'nama_barang' => $barang_masuk->nama_barang,
        'spesifikasi' => $barang_masuk->spesifikasi,
        'jumlah' => $barang_masuk->jumlah,
        'harga' => $barang_masuk->harga,
        'aksi' => 'hapus',
        'alasan' => $alasan
    ];
    $this->db->insert('history', $history_data);

    // Set pesan sukses
    $this->session->set_flashdata('sweet_success', 'Data Barang Masuk Berhasil Dihapus.');

    // Redirect ke halaman barang masuk
    redirect('barangmasuk/index');
}




	public function akses()
	{
		$idkeluar = $this->input->post('idkeluar');
		$nama_barang = $this->input->post('nama_barang');
		$id = $this->input->post('id');

		$data = [
			'idkeluar' => $idkeluar,
			'jumlah' => $nama_barang,
			'id' => $id,

		];
		$this->db->insert('barangmasuk', $data);

		$this->session->set_flashdata('sweet_success', 'Data Berhasil Disimpan');
		redirect('barangmasuk');
	}

	// Tambahkan fungsi ajax_search_nama_barang di dalam controller Barangmasuk
	// Controller: Barangmasuk.php
	// Controller: Barangmasuk.php
public function ajax_search_nama_barang()
{
    $searchTerm = $this->input->get('q'); // Ambil parameter pencarian dari URL

    // Query untuk mencari barang berdasarkan nama_barang
    $this->db->select('nama_barang AS id, nama_barang AS text'); // Format hasil query sesuai dengan yang dibutuhkan oleh Select2
    $this->db->like('nama_barang', $searchTerm);
    $this->db->group_by('nama_barang'); // Kelompokkan hasil query berdasarkan nama_barang
    $query = $this->db->get('barangmasuk'); // Ambil data dari tabel barangmasuk

    $barang = $query->result_array(); // Ambil hasil query ke dalam bentuk array

    echo json_encode($barang); // Kembalikan data dalam format JSON
}

}
