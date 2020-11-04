<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body style="font-size: 12px; ;color: black">
    <div class="page-portrait-list">
        <img src="<?= base_url('assets/kop.png') ?>" style="width:100%;">
        <br>
        <div class="invoice">

            <!-- left column -->

            <!-- Input addon -->
            <!-- /.box-header -->
            <div class="box-body">
                <!-- Contoh susunan rapi -->



                <p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style=""><strong><u><span style="font-size:14.0pt">SURAT KETERANGAN AKTIF KULIAH</span></u></strong></span></span></p>

                <p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style=""><strong><span style="font-size:12.0pt">Nomor : <?= $nomor_surat ?>/KET.AK/II.3.AU/F/5/<?= date('Y') ?></span></strong></span></span></p>

                <p style="margin-left:0cm; margin-right:0cm; text-align:justify">&nbsp;</p>

                <p style="margin-left:0cm; margin-right:0cm; text-align:justify"><span style="font-size:12pt"><span style=""><span style="font-size:12.0pt">Dekan Fakultas Ilmu Komputer</span><span style="font-size:12.0pt"> Universitas Muhammadiyah Riau, dengan ini </span><span style="font-size:12.0pt">menerangkan bahwa</span> <span style="font-size:12.0pt">:</span></span></span></p>

                <table cellspacing="0" class="MsoTableGrid" style="border-collapse:collapse; border:undefined">
                    <tbody>
                        <tr>
                            <td style="vertical-align:top; width:116.85pt">
                                <p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style=""><span style="font-size:12.0pt">Nama</span></span></span></p>
                            </td>
                            <td style="vertical-align:top; width:11.8pt">
                                <p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style=""><span style="font-size:12.0pt">:</span></span></span></p>
                            </td>
                            <td style="vertical-align:top; width:221.95pt">
                                <p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style=""><span style="font-size:12.0pt"><?= $mhs['nama'] ?></span></span></span></p>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top; width:116.85pt">
                                <p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style=""><span style="font-size:12.0pt">NIM</span></span></span></p>
                            </td>
                            <td style="vertical-align:top; width:11.8pt">
                                <p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style=""><span style="font-size:12.0pt">:</span></span></span></p>
                            </td>
                            <td style="vertical-align:top; width:221.95pt">
                                <p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style=""><span style="font-size:12.0pt"><?= $mhs['nim'] ?></span></span></span></p>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top; width:116.85pt">
                                <p style="margin-left:0cm; margin-right:0cm; text-align:justify"><span style="font-size:12pt"><span style=""><span style="font-size:12.0pt">TTL</span></span></span></p>
                            </td>
                            <td style="vertical-align:top; width:11.8pt">
                                <p style="margin-left:0cm; margin-right:0cm; text-align:justify"><span style="font-size:12pt"><span style=""><span style="font-size:12.0pt">:</span></span></span></p>
                            </td>
                            <td style="vertical-align:top; width:221.95pt">
                                <p style="margin-left:0cm; margin-right:0cm; text-align:justify"><span style="font-size:12pt"><span style=""><span style="font-size:12.0pt"><?= $mhs['tempat_lahir'] ?>, 03 Mei 1999</span></span></span></p>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top; width:116.85pt">
                                <p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style=""><span style="font-size:12.0pt">Prodi</span></span></span></p>
                            </td>
                            <td style="vertical-align:top; width:11.8pt">
                                <p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style=""><span style="font-size:12.0pt">:</span></span></span></p>
                            </td>
                            <td style="vertical-align:top; width:221.95pt">
                                <p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style=""><?= $mhs['prodi'] ?></span></span></p>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top; width:116.85pt">
                                <p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style=""><span style="font-size:12.0pt">Alamat</span></span></span></p>
                            </td>
                            <td style="vertical-align:top; width:11.8pt">
                                <p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style=""><span style="font-size:12.0pt">:</span></span></span></p>
                            </td>
                            <td style="vertical-align:top; width:221.95pt">
                                <p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style=""><span style="font-size:12.0pt"><?= $mhs['alamat'] ?></span></span></span></p>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <p style="margin-left:0cm; margin-right:0cm; text-align:justify"><span style="font-size:12pt"><span style=""><span style="font-size:12.0pt">Nama tersebut adalah benar </span><span style="font-size:12.0pt">mahasiswa</span><span style="font-size:12.0pt"> Fakultas Ilmu Komputer </span><span style="font-size:12.0pt">Universitas Muhammadiyah Riau </span><span style="font-size:12.0pt">yang</span><span style="font-size:12.0pt"> tercatat pada </span><span style="font-size:12.0pt">Semester <?= $surat['semester'] ?> Tahun Akademik <?= $surat['tahun_semester'] ?>/<?= $surat['tahun_semester'] + 1 ?> dan aktif dalam perkuliahan.</span></span></span></p>

                <p style="margin-left:0cm; margin-right:0cm; text-align:justify">&nbsp;</p>

                <p style="margin-left:0cm; margin-right:0cm; text-align:justify"><span style="font-size:12pt"><span style=""><span style="font-size:12.0pt">Demikian surat keterangan ini kami buat dengan sesungguhnya untuk dipergunakan sebagaimana mestinya.</span></span></span></p>

            </div>
            <div class="row" style="position: relative; right: 0; width: 220;">
                <div class="col-sm-4 invoice-col" style="text-align: right;">
                    <br><br>
                    <table align="justify">`
                        <tbody>
                            <tr>
                                <td>Dikeluarkan di</td>
                                <td>:</td>
                                <td>Pekanbaru</td>
                            </tr>
                            <tr>
                                <td style="padding-bottom: 25px ">Pada Tanggal</td>
                                <td style="padding-bottom: 25px ">:</td>
                                <td>

                                    <u> 9 Dzulhijjah 1441 H </u><br><?= date('d F Y') ?> M<br>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table>
                        <tbody>
                            <tr>
                                <td align="center">
                                    <b>
                                        <br><img style="width: 70px" src="<?= base_url('assets/qrcode/' . $qrcode) ?>"><br>
                                        <u>
                                            Harun Mukhtar, S.Kom., M.Kom </u><br>
                                        NIDN :1004117603 </b>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>

            </div>
            <!-- /.col -->
        </div>
    </div>
    <br>


    <!-- Contoh susunan rapi end -->
</body>

</html>