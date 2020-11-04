<?php defined('BASEPATH') or exit('No direct script access allowed');

class Cek_Surat extends CI_Controller
{
    public function index($enc)
    {
        $n = 2797609;
        $d = 1862827;
        $teks = explode(".", $enc);
        $id = '';
        foreach($teks as $nilai) {
            //rumus enkripsi <pesan>=<enkripsi>^<d>mod<n>
            $id .= chr(gmp_strval(gmp_mod(gmp_pow($nilai, $d), $n)));
        }

        $surat = $this->db->get_where('surat', ['nomor_surat' => $id])->row_array();

        $data['nama_surat'] = $surat['nama_surat'];

        $this->load->view('surat', $data);

    }
}
