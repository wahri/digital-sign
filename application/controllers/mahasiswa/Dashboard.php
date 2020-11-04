<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends Mahasiswa_Controller
{
    public function index()
    {
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
