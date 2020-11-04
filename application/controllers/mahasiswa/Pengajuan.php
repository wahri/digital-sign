<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan extends Mahasiswa_Controller
{
    public function index()
    {
        $this->data['title'] = "Pengajuan Surat";
        // $this->data['data_surat'] = $this->db->get_where('pengajuan_surat', ['nim' => $this->data['user']['nim']])->result_array();

        $this->db->select('*');
        $this->db->from('pengajuan_surat');
        $this->db->join('surat', 'surat.id_pengajuan = pengajuan_surat.id_pengajuan', 'left');
        $this->db->join('mahasiswa', 'mahasiswa.nim = pengajuan_surat.nim');
        $this->db->where(['pengajuan_surat.nim' => $this->data['user']['nim']]);
        $this->data['data_surat'] = $this->db->get()->result_array();

        $this->load->view('mahasiswa/pengajuan', $this->data);
    }

    public function buatSurat()
    {
        $nim = $this->session->userdata('nim');
        $semester = substr($this->input->post('semester'), -1) == 1 ? "GANJIL" : "GENAP";
        $tahun_semester = substr($this->input->post('semester'), 0,4);
    
        $data = [
            'nim' => $nim,
            'semester' => $semester,
            'tahun_semester' => $tahun_semester
        ];

        $this->db->insert('pengajuan_surat', $data);

        $this->session->set_flashdata('message', 'Berhasil mengajukan surat');
        redirect('mahasiswa/pengajuan');
    }
}
