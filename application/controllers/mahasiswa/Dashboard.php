<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends Mahasiswa_Controller
{
    public function index()
    {
        $this->data['surat'] = $this->db->get_where('pengajuan_surat', ['nim' => $this->data['user']['nim'], 'approve_tu' => 1, 'approve_dekan' => 1])->num_rows();
        $title = [
            'nama' => 'Wahyu Nuzul Bahri',
            'nim' => '180401187',
            'ttl' => 'Pekanbaru, 12 Desember 2000',
            'prodi' => 'Teknik Informatika',
            'alamat' => 'Jl. H. Agussalim Gg. Irsyad No. 18',
            'semester' => '20192',
            'status' => 1
        ];
        // echo $title['nama'];
        // die;
        $this->data['title'] = "Dashboard";
        $this->load->view('mahasiswa/dashboard', $this->data);
    }
}
