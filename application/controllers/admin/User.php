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
            $this->session->set_flashdata('message_error', 'Gagal mendaftarkan admin.' . validation_errors());
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
            $this->session->set_flashdata('message_error', 'Gagal mendaftarkan mahasiswa.' . validation_errors());
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
            $this->session->set_flashdata('message_error', 'Gagal mendaftarkan dosen.' . validation_errors());
            redirect("admin/user/index/dosen", 'refresh');
        }
    }

    public function edit($table, $id)
    {
        if ($this->input->post('admin')) {
            if (!empty($this->input->post('password'))) {
                $this->form_validation->set_rules('password', 'Password', 'required|matches[password_confirm]');
                $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'required');
                if ($this->form_validation->run() === TRUE) {
                    $data = [
                        'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
                    ];
                    $this->db->update('admin', $data, ['id_admin' => $id]);
                }
            }
            $data = [
                'username' => $this->input->post('username')
            ];
            $this->db->update('admin', $data, ['id_admin' => $id]);

            $this->session->set_flashdata('message', 'Berhasil mengupdate admin.');
            redirect('admin/user', 'refresh');
        }

        if ($this->input->post('dosen')) {
            if (!empty($this->input->post('password'))) {
                $this->form_validation->set_rules('password', 'Password', 'required|matches[password_confirm]');
                $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'required');
                if ($this->form_validation->run() === TRUE) {
                    $data = [
                        'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
                    ];
                    $this->db->update('dosen', $data, ['id_dosen' => $id]);
                }
            }
            $data = [
                'nama' => $this->input->post('nama')
            ];
            $this->db->update('dosen', $data, ['id_dosen' => $id]);

            $this->session->set_flashdata('message', 'Berhasil mengupdate dosen.');
            redirect('admin/user/index/dosen', 'refresh');
        }

        if ($this->input->post('mahasiswa')) {
            if (!empty($this->input->post('password'))) {
                $this->form_validation->set_rules('password', 'Password', 'required|matches[password_confirm]');
                $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'required');
                if ($this->form_validation->run() === TRUE) {
                    $data = [
                        'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
                    ];
                    $this->db->update('mahasiswa', $data, ['id_mahasiswa' => $id]);
                }
            }
            $data = [
                'nama' => $this->input->post('nama')
            ];
            $this->db->update('mahasiswa', $data, ['id_mahasiswa' => $id]);

            $this->session->set_flashdata('message', 'Berhasil mengupdate mahasiswa.');
            redirect('admin/user/index/mahasiswa', 'refresh');
        }

        if ($table == 'admin') {
            $this->data['detail_user'] = $this->db->get_where('admin', ['id_admin' => $id])->row_array();
            $this->data['title'] = 'Edit Admin';
            $this->load->view('admin/edit_admin', $this->data);
        } elseif ($table == 'dosen') {
            $this->data['detail_user'] = $this->db->get_where('dosen', ['id_dosen' => $id])->row_array();
            $this->data['title'] = 'Edit Dosen';
            $this->load->view('admin/edit_dosen', $this->data);
        } elseif ($table == 'mahasiswa') {
            $this->data['detail_user'] = $this->db->get_where('mahasiswa', ['id_mahasiswa' => $id])->row_array();
            $this->data['title'] = 'Edit Mahasiswa';
            $this->load->view('admin/edit_mahasiswa', $this->data);
        } else {
            echo "something is wrong";
        }
    }

    public function hapusUser($table, $id)
    {
        if ($table == 'admin') {
            $this->db->delete('admin', ['id_admin' => $id]);
            $this->session->set_flashdata('message', 'Berhasil menghapus user.');
            redirect('admin/user/index/admin', 'refresh');
        } elseif ($table == 'dosen') {
            $this->db->delete('dosen', ['id_dosen' => $id]);

            $this->session->set_flashdata('message', 'Berhasil menghapus user.');
            redirect('admin/user/index/dosen', 'refresh');
        } elseif ($table == 'mahasiswa') {
            $this->db->delete('mahasiswa', ['id_mahasiswa' => $id]);

            $this->session->set_flashdata('message', 'Berhasil menghapus user.');
            redirect('admin/user/index/mahasiswa', 'refresh');
        } else {
            echo "something is wrong";
        }
    }
}
