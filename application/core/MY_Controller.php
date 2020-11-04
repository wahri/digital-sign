<?php defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
    }
}

class Admin_Controller extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('login_status') != "login") {
            redirect('auth');
        }
        if ($this->session->userdata('role') !== "admin") {
            redirect('auth');
        }

        $this->data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username') ])->row_array();
    }
}

class TU_Controller extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('login_status') != "login") {
            redirect('auth');
        }
        if ($this->session->userdata('role') !== "tu") {
            redirect('auth');
        }

        $this->data['user'] = $this->db->get_where('dosen', ['nidn' => $this->session->userdata('nidn')])->row_array();
    }
}
class Dekan_Controller extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('login_status') != "login") {
            redirect('auth');
        }
        if ($this->session->userdata('role') !== "dekan") {
            redirect('auth');
        }

        $this->data['user'] = $this->db->get_where('dosen', ['nidn' => $this->session->userdata('nidn')])->row_array();
    }
}


class Mahasiswa_Controller extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('login_status') != "login") {
            redirect('auth');
        }
        if ($this->session->userdata('role') !== "mahasiswa") {
            redirect('auth');
        }

        $this->data['user'] = $this->db->get_where('mahasiswa', ['nim' => $this->session->userdata('nim')])->row_array();
    }
}
