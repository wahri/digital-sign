<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="<?= base_url('assets/admin/') ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url('assets/admin/') ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url('assets/admin/') ?>vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= base_url('assets/admin/') ?>build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <?php $this->load->view('mahasiswa/template/sidebar'); ?>

            <!-- top navigation -->
            <?php $this->load->view('mahasiswa/template/topbar'); ?>
            <!-- /top navigation -->

            <!-- page content -->
            <?= $this->session->flashdata('message'); ?>
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3><?= $title ?></h3>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="x_title"></div>

                    <div class="row">
                        <?php if (!empty($this->session->flashdata('message'))) { ?>
                            <div class="alert alert-success alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <strong>Pesan..!!</strong> <?php echo $this->session->flashdata('message'); ?>
                            </div>
                        <?php } ?>
                        <?php if (!empty($this->session->flashdata('message_error'))) { ?>
                            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <strong>Pesan..!!</strong> <?php echo $this->session->flashdata('message_error'); ?>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12  ">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Surat Keterangan Aktif Kuliah</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-inline">
                                                <div class="form-group">
                                                    <label for="semester">Pilih Semester</label>
                                                    <div class="input-group">
                                                        <form action="<?= base_url('mahasiswa/pengajuan/buatsurat/') ?>" method="POST">
                                                            <select name="semester" class="form-control">
                                                                <option value="20191">20191</option>
                                                                <option value="20192">20192</option>
                                                            </select>
                                                            <span class="input-group-btn">
                                                                <button type="submit" class="btn btn-info">Ajukan</button>
                                                            </span>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <table id="data_surat" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Tahun Semester</th>
                                                        <th>NIM</th>
                                                        <th>Tanggal pengajuan</th>
                                                        <th class="text-center">status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($data_surat as $d) : ?>
                                                        <tr>
                                                            <td class="align-middle" width="15%"><?= $d['tahun_semester'] ?>-<?= $d['semester'] ?></td>
                                                            <td class="align-middle"><?= $d['nim'] ?></td>
                                                            <td class="align-middle"><?= date('d F Y', strtotime($d['tanggal_pengajuan'])) ?></td>
                                                            <td width="10%" class="text-center">
                                                                <?php if ($d['approve_tu'] && $d['approve_dekan']) : ?>
                                                                    <a href="<?= base_url('assets/surat/' . $d['nama_surat']) ?>" class="btn btn-app" target="_blank">
                                                                        <i class="fa fa-search-plus"></i>
                                                                        Check
                                                                    </a>
                                                                <?php else : ?>
                                                                    <div class="btn btn-warning">Menunggu</div>
                                                                <?php endif; ?>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <?php $this->load->view('mahasiswa/template/footer'); ?>
            <!-- /footer content -->
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?= base_url('assets/admin/') ?>vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?= base_url('assets/admin/') ?>vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="<?= base_url('assets/admin/') ?>vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?= base_url('assets/admin/') ?>vendors/nprogress/nprogress.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?= base_url('assets/admin/') ?>build/js/custom.min.js"></script>

</body>

</html>