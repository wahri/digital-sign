<?php defined('BASEPATH') or exit('No direct script access allowed');

class Surat extends Dekan_Controller
{
    public function tes()
    {
        echo hash_file('md5','./assets/surat/20201028_001.pdf');
        die;
    }
    public function index()
    {
        $this->db->select('*');
        $this->db->from('pengajuan_surat');
        $this->db->join('mahasiswa', 'mahasiswa.nim = pengajuan_surat.nim');
        $this->db->where(['approve_tu' => 1, 'approve_dekan' => 0]);
        $this->data['tabel_pengajuan'] = $this->db->get()->result_array();

        $this->db->select('*');
        $this->db->from('surat');
        $this->db->join('pengajuan_surat', 'pengajuan_surat.id_pengajuan = surat.id_pengajuan');
        $this->db->join('mahasiswa', 'mahasiswa.nim = pengajuan_surat.nim');
        $this->data['tabel_terbit'] = $this->db->get()->result_array();

        $this->data['title'] = "Surat Keterangan Aktif";
        $this->load->view('dekan/surat', $this->data);
    }

    public function setujui($id, $nim)
    {
        $this->_cetakSKA($id, $nim);

        $data['approve_dekan'] = 1;
        $data['tanggal_disetujui'] = date('Y-m-d H:i:s');
        $this->db->update('pengajuan_surat', $data, ['id_pengajuan' => $id]);
        $this->session->set_flashdata('message', 'Berhasil menyetujui surat');
        redirect('dekan/surat');
    }
    public function _cetakSKA($id, $nim)
    {

        // BUAT NOMOR SURAT
        $this->db->select_max('nomor_surat');
        $cek_nomor = $this->db->get('surat')->row_array();

        if (empty($cek_nomor['nomor_surat'])) {
            $data['nomor_surat'] = '001';
        } else {
            $nomor = $cek_nomor['nomor_surat'];
            $nomor++;
            $data['nomor_surat'] = sprintf("%03s", $nomor);
        }

        // proses encrypt
        $n = 2797609;   
        $e = 3;

        $encrypt = '';
        for ($i = 0; $i < strlen($data['nomor_surat']); ++$i) {
            //rumus enkripsi <enkripsi>=<pesan>^<e>mod<n>
            $encrypt .= gmp_strval(gmp_mod(gmp_pow(ord($data['nomor_surat'][$i]), $e), $n));
            //antar tiap karakter dipisahkan dengan "."
            if ($i != strlen($data['nomor_surat']) - 1) {
                $encrypt .= ".";
            }
        }

        // BUAT QR CODE
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

        $qrcode = date('Ymd_' . $data['nomor_surat']) . '.png'; //buat name dari qr code sesuai dengan nim

        $params['data'] = base_url('cek_surat/' . $encrypt); //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH . $config['imagedir'] . $qrcode; //simpan image QR CODE ke folder assets/qrcode/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

        

        ob_start();
        $this->data['qrcode'] = $qrcode;
        $this->data['nomor_surat'] = $data['nomor_surat'];
        $this->data['surat'] = $this->db->get_where('pengajuan_surat', ['id_pengajuan' => $id])->row_array();
        $this->data['mhs'] = $this->db->get_where('mahasiswa', ['nim' => $nim])->row_array();
        $this->load->view('surat/format_surat', $this->data);
        $html = ob_get_contents();
        ob_end_clean();

        $pdf = new Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'en');
        $pdf->WriteHTML($html);
        $pdf->Output($_SERVER['DOCUMENT_ROOT'] . 'digital-sign/assets/surat/' . date('Ymd_' . $data['nomor_surat']) . '.pdf', 'F');

        $data['nama_surat'] = date('Ymd_' . $data['nomor_surat']) . '.pdf';
        $data['qr_code'] = $qrcode;
        $data['id_pengajuan'] = $id;
        $data['tanggal_approve'] = date('Y-m-d H:i:s');
        $data['encrypt_code'] = $encrypt;
        $this->db->insert('surat', $data);
    }

    public function laporan_pdf()
    {
        // $this->data['mhs'] = $this->db->get_where
        ob_start();
        $this->load->view('dekan/surat_keterangan_aktif', $this->data);
        $html = ob_get_contents();
        ob_end_clean();

        $pdf = new Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'en');
        $pdf->WriteHTML($html);
        $pdf->Output($_SERVER['DOCUMENT_ROOT'] . './assets/surat/Data_Siswa.pdf', 'F');
    }
}
