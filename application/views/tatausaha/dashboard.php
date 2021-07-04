<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard</title>

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
            <?php $this->load->view('tatausaha/template/sidebar') ?>

            <!-- top navigation -->
            <?php $this->load->view('tatausaha/template/topbar'); ?>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Dashboard Tata Usaha</h3>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="x_title"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12  ">
                            <div class="x_content">
                                <div class="row">
                                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                                        <div class="tile-stats">
                                            <div class="icon"><i class="fa fa-envelope"></i>
                                            </div>
                                            <div class="count"><?= $surat_masuk ?></div>

                                            <h3>Surat Masuk</h3>
                                        </div>
                                    </div>
                                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                                        <div class="tile-stats">
                                            <div class="icon"><i class="fa fa-paper-plane"></i>
                                            </div>
                                            <div class="count"><?= $surat_terbit ?></div>

                                            <h3>Surat Terbit</h3>
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
            <?php $this->load->view('tatausaha/template/footer'); ?>
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