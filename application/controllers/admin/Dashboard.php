<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends Admin_Controller
{
    public function index()
    {
        $pegawai = $this->db->get('dosen')->num_rows();
        $admin = $this->db->get('admin')->num_rows();
        $mahasiswa = $this->db->get('mahasiswa')->num_rows();
        $this->data['total'] = $pegawai + $admin + $mahasiswa;
        $this->data['title'] = "Dashboard";
        $this->load->view('admin/dashboard', $this->data);

    }
}