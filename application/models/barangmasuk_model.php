<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load model Barangmasuk_model
        $this->load->model('Barangmasuk_model', 'barangmasuk_model');
    }

    public function index()
    {
        // Panggil method getBarangMasuk dari Barangmasuk_model untuk mengambil data barangmasuk
        $users = $this->barangmasuk_model->getBarangMasuk();

        $koten = [
            'users' => $users
        ];

        $data =  [
            'master' => 'active',
            'barang2' => 'active',
            'konten' => $this->load->view('v_barang', $koten, TRUE)
        ];

        $this->load->view('widget/template', $data);
    }

    // Metode lainnya seperti tambahbarang, editbarang, simpan, update, hapus
    // Anda dapat mengimplementasikan pemanggilan model Barangmasuk_model di sini

}
