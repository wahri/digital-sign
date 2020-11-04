<?php defined('BASEPATH') or exit('No direct script access allowed');

class Surat extends TU_Controller
{
    public function index()
    {
        $this->db->select('*');
        $this->db->from('pengajuan_surat');
        $this->db->join('mahasiswa', 'mahasiswa.nim = pengajuan_surat.nim');
        $this->db->where(['approve_tu' => 0]);
        $this->data['tabel_pengajuan'] = $this->db->get()->result_array();

        $this->db->select('*');
        $this->db->from('pengajuan_surat');
        $this->db->join('mahasiswa', 'mahasiswa.nim = pengajuan_surat.nim');
        $this->db->where(['approve_tu' => 1]);
        $this->data['tabel_menunggu'] = $this->db->get()->result_array();

        $this->db->select('*');
        $this->db->from('pengajuan_surat');
        $this->db->join('mahasiswa', 'mahasiswa.nim = pengajuan_surat.nim');
        $this->db->where(['approve_tu' => 1]);
        $this->data['tabel_terbit'] = $this->db->get()->result_array();

        $this->data['title'] = "Surat Keterangan Aktif";
        $this->load->view('tatausaha/surat', $this->data);
    }

    public function setujui($id, $nim)
    {
        $data['approve_tu'] = 1;
        
        $this->db->update('pengajuan_surat', $data, ['id_pengajuan' => $id]);

        // $this->_cetakSurat($id, $nim);

        $this->session->set_flashdata('message', 'Berhasil menyetujui surat');
        redirect('tatausaha/surat');
    }

    public function _cetakSurat($id, $nim)
    {
        // $this->load->library('pdf');

        // $this->pdf->setPaper('A4', 'potrait');
        // $this->pdf->filename = "tes.pdf";
        // $this->pdf->load_view('dekan/surat_keterangan_aktif');

        $this->load->library('ciqrcode'); //pemanggilan library QR CODE

        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/qrcode/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
        $config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);

        $qrcode = $id . '_' . $nim . '.png'; //buat name dari qr code sesuai dengan nim

        $params['data'] = base_url('cek_surat/' . $id); //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH . $config['imagedir'] . $qrcode; //simpan image QR CODE ke folder assets/qrcode/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

        $data['qr_code'] =$qrcode;
        $data['id_pengajuan'] = $id;
        $this->db->insert('surat', $data);

        ob_start();
        $this->data['surat'] = $this->db->get_where('pengajuan_surat', ['id_pengajuan' => $id])->row_array();
        $this->data['mhs'] = $this->db->get_where('mahasiswa', ['nim' => $nim])->row_array();
        $this->load->view('surat/format_surat', $this->data);
        $html = ob_get_contents();
        ob_end_clean();

        $pdf = new Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'en');
        $pdf->WriteHTML($html);
        $pdf->Output($_SERVER['DOCUMENT_ROOT'] . 'digital-sign/assets/surat/' . $id . $nim . '.pdf', 'F');
    }
}
