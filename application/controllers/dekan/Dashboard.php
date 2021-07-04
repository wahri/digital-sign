<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends Dekan_Controller
{
    public function index()
    {
        $this->data['surat_masuk'] = $this->db->get_where('pengajuan_surat', ['approve_tu' => 1, 'approve_dekan' => 0])->num_rows();
        $this->data['surat_terbit'] = $this->db->get('surat')->num_rows();
        $this->data['title'] = "Dashboard";
        $this->load->view('dekan/dashboard', $this->data);

    }
}