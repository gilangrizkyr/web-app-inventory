<?php
defined('BASEPATH') or exit('No direct script access allowed');

class History extends CI_Controller
{

    public function index()
    {
        // Ambil data dari tabel history
        $query = $this->db->get('history');
        $history = $query->result(); // Mengambil hasil query ke dalam array

        // Mengirimkan data history ke view
        $data['history'] = $history;

        // Memuat view history sebagai string dan menyimpannya dalam variabel $data['konten']
        $data['konten'] = $this->load->view('v_history', $data, TRUE);

        // Mengirimkan $data ke view template.php untuk dimuat
        $this->load->view('widget/template', $data);
    }
}
