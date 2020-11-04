<?php defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function index()
    {
        if ($this->session->userdata('login_status') == 'login') {
            if ($this->session->userdata('role') == 'admin') {
                redirect('admin');
            }
            if ($this->session->userdata('role') == 'tu') {
                redirect('tatausaha');
            }
            if ($this->session->userdata('role') == 'dekan') {
                redirect('dekan');
            }
            if ($this->session->userdata('role') == 'mahasiswa') {
                redirect('mahasiswa');
            }
        }

        $this->form_validation->set_rules('nim', 'NIM/NIDN', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() === TRUE) {

            $this->_login();
        } else {
            $this->load->view('login');
        }
    }

    public function _login()
    {
        $nim = $this->input->post('nim');
        $password = $this->input->post('password');

        $admin = $this->db->get_where('admin', ['username' => $nim])->row_array();

        $dosen = $this->db->get_where('dosen', ['nidn' => $nim])->row_array();

        $mahasiswa = $this->db->get_where('mahasiswa', ['nim' => $nim])->row_array();

        if ($admin) {
            if (password_verify($password, $admin['password'])) {
                $data = [
                    'username' => $admin['username'],
                    'role' => 'admin',
                    'login_status' => 'login'
                ];
                $this->session->set_userdata($data);

                redirect('admin');
            } else {
                $this->session->set_flashdata('message', 'Password salah!');
                redirect("auth", 'refresh');
            }
        } elseif ($dosen) {
            if (password_verify($password, $dosen['password'])) {
                if ($dosen['level'] == 1) {
                    $data = [
                        'nidn' => $dosen['nidn'],
                        'role' => 'tu',
                        'login_status' => 'login'
                    ];
                    $this->session->set_userdata($data);
                    redirect('tatausaha');
                } elseif ($dosen['level'] == 2) {
                    $data = [
                        'nidn' => $dosen['nidn'],
                        'role' => 'dekan',
                        'login_status' => 'login'
                    ];
                    $this->session->set_userdata($data);
                    redirect('dekan');
                }else{
                    echo 'anda siapa?';
                    die;
                }
            } else {
                $this->session->set_flashdata('message', 'Password salah!');
                redirect("auth", 'refresh');
            }
        } elseif ($mahasiswa) {
            if (password_verify($password, $mahasiswa['password'])) {
                $data = [
                    'nim' => $mahasiswa['nim'],
                    'role' => 'mahasiswa',
                    'login_status' => 'login'
                ];
                $this->session->set_userdata($data);

                redirect('mahasiswa');
            } else {
                $this->session->set_flashdata('message', 'Password salah!');
                redirect("auth", 'refresh');
            }
        } else {
            $this->session->set_flashdata('message', 'Akun tidak terdaftar!');
            redirect("auth", 'refresh');
        }
    }

    public function logout()
    {
        session_destroy();
        $this->session->set_flashdata('message', 'Anda telah logout.');
        redirect('auth');
    }
}
