<?php defined('BASEPATH') or exit('No direct script access allowed');

class User extends Admin_Controller
{
    public function index($user = null)
    {
        $this->data['title'] = 'User Management';
        $this->data['user_account'] = $user;

        $this->data['data_mhs'] = $this->db->get('mahasiswa')->result_array();
        $this->data['data_dsn'] = $this->db->get('dosen')->result_array();
        $this->data['data_adm'] = $this->db->get('admin')->result_array();


        if ($this->input->post('admin')) {
            $this->_tambahAdmin();
        }
        if ($this->input->post('dosen')) {
            $this->_tambahDosen();
        }
        if ($this->input->post('mahasiswa')) {
            $this->_tambahMahasiswa();
        }
        $this->load->view('admin/user', $this->data);
    }

    public function _tambahAdmin()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[admin.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'required');

        $username = $this->input->post('username');
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

        if ($this->form_validation->run() === TRUE) {
            $data = [
                'username' => $username,
                'password' => $password
            ];
            $this->db->insert('admin', $data);

            $this->session->set_flashdata('message', 'Berhasil mendaftarkan admin.');
            redirect("admin/user/index/admin", 'refresh');
        } else {
            $this->session->set_flashdata('message_error', 'Gagal mendaftarkan admin.');
            redirect("admin/user/index/admin", 'refresh');
        }
    }
    public function _tambahMahasiswa()
    {
        $this->form_validation->set_rules('nim', 'NIM', 'trim|required|numeric|is_unique[mahasiswa.nim]');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'required|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'required');

        $nim = $this->input->post('nim');
        $nama = $this->input->post('nama');
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

        if ($this->form_validation->run() === TRUE) {
            $data = [
                'nim' => $nim,
                'nama' => $nama,
                'password' => $password,
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'prodi' => 'Teknik Informatika',
                'alamat' => $this->input->post('alamat'),
                'status' => 1
            ];
            $this->db->insert('mahasiswa', $data);

            $this->session->set_flashdata('message', 'Berhasil mendaftarkan mahasiswa.');
            redirect("admin/user/index/mahasiswa", 'refresh');
        } else {
            $this->session->set_flashdata('message_error', 'Gagal mendaftarkan mahasiswa.');
            redirect("admin/user/index/mahasiswa", 'refresh');
        }
    }
    public function _tambahDosen()
    {
        $this->form_validation->set_rules('nidn', 'NIDN', 'trim|required|numeric|is_unique[dosen.nidn]');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'required|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'required');

        $nidn = $this->input->post('nidn');
        $nama = $this->input->post('nama');
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

        if ($this->form_validation->run() === TRUE) {
            $data = [
                'nidn' => $nidn,
                'nama' => $nama,
                'password' => $password,
                'level' => $this->input->post('level')
            ];
            $this->db->insert('dosen', $data);

            $this->session->set_flashdata('message', 'Berhasil mendaftarkan dosen.');
            redirect("admin/user/index/dosen", 'refresh');
        } else {
            $this->session->set_flashdata('message_error', 'Gagal mendaftarkan dosen.');
            redirect("admin/user/index/dosen", 'refresh');
        }
    }
}
