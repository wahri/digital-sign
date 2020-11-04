<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends Dekan_Controller
{
    public function index()
    {
        
        $this->data['title'] = "Dashboard";
        $this->load->view('dekan/dashboard', $this->data);

    }
}