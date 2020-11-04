<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends TU_Controller
{
    public function index()
    {
        
        $this->data['title'] = "Dashboard";
        $this->load->view('tatausaha/dashboard', $this->data);

    }
}