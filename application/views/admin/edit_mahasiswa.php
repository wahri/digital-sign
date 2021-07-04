 <?php $this->load->view('admin/template/header') ?>

 <!-- Bootstrap -->
 <link href="<?= base_url('assets/admin/') ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
 <!-- Font Awesome -->
 <link href="<?= base_url('assets/admin/') ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
 <!-- NProgress -->
 <link href="<?= base_url('assets/admin/') ?>vendors/nprogress/nprogress.css" rel="stylesheet">
 <!-- iCheck -->
 <link href="<?= base_url('assets/admin/') ?>vendors/iCheck/skins/flat/green.css" rel="stylesheet">
 <!-- bootstrap-wysiwyg -->
 <link href="<?= base_url('assets/admin/') ?>vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
 <!-- Select2 -->
 <link href="<?= base_url('assets/admin/') ?>vendors/select2/dist/css/select2.min.css" rel="stylesheet">
 <!-- Switchery -->
 <link href="<?= base_url('assets/admin/') ?>vendors/switchery/dist/switchery.min.css" rel="stylesheet">
 <!-- starrr -->
 <link href="<?= base_url('assets/admin/') ?>vendors/starrr/dist/starrr.css" rel="stylesheet">
 <!-- bootstrap-daterangepicker -->
 <link href="<?= base_url('assets/admin/') ?>vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

 <!-- Custom Theme Style -->
 <link href="<?= base_url('assets/admin/') ?>build/css/custom.min.css" rel="stylesheet">

 </head>

 <body class="nav-md">
     <div class="container body">
         <div class="main_container">
             <?php $this->load->view('admin/template/sidebar'); ?>

             <!-- top navigation -->
             <?php $this->load->view('admin/template/topbar'); ?>
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
                         <div class="col-12">
                             <?php if (!empty($this->session->flashdata('message'))) { ?>
                                 <div class="alert alert-success alert-dismissible " role="alert">
                                     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                     </button>
                                     <strong>Pesan..!!</strong> <?php echo $this->session->flashdata('message'); ?>
                                 </div>
                             <?php } ?>
                             <?php if (!empty($this->session->flashdata('message_error'))) { ?>
                                 <div class="alert alert-danger alert-dismissible " role="alert">
                                     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                     </button>
                                     <strong>Pesan..!!</strong> <?php echo $this->session->flashdata('message_error'); ?>
                                     <?= validation_errors() ?>
                                 </div>
                             <?php } ?>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-md-8 col-sm-8 col-xs-12">

                             <div class="x_panel">
                                 <div class="x_content">
                                     <form action="" method="post">
                                         <div class="item form-group">
                                             <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">NIM
                                             </label>
                                             <div class="col-md-9 col-sm-6 ">
                                                 <input type="text" id="first-name" readonly name="nim" class="form-control" value="<?= $detail_user['nim'] ?>">
                                             </div>
                                         </div>
                                         <div class="item form-group">
                                             <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama <span class="required">*</span>
                                             </label>
                                             <div class="col-md-9 col-sm-6 ">
                                                 <input type="text" id="first-name" required="required" name="nama" class="form-control" value="<?= $detail_user['nama'] ?>">
                                             </div>
                                         </div>
                                         <div class="item form-group">
                                             <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Change Password
                                             </label>
                                             <div class="col-md-9 col-sm-6 ">
                                                 <input type="password" id="first-name" name="password" class="form-control ">
                                             </div>
                                         </div>
                                         <div class="item form-group">
                                             <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Confirm Password
                                             </label>
                                             <div class="col-md-9 col-sm-6 ">
                                                 <input type="password" id="first-name" name="password_confirm" class="form-control ">
                                             </div>
                                         </div>
                                         <button type="submit" name="mahasiswa" value="1" class="btn btn-success d-flex ml-auto mt-4">Update</button>
                                     </form>
                                 </div>
                             </div>

                         </div>

                     </div>
                 </div>
             </div>

             <!-- /page content -->

             <!-- footer content -->
             <?php $this->load->view('admin/template/footer'); ?>
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

     <!-- bootstrap-progressbar -->
     <script src="<?= base_url('assets/admin/') ?>vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
     <!-- iCheck -->
     <script src="<?= base_url('assets/admin/') ?>vendors/iCheck/icheck.min.js"></script>
     <!-- bootstrap-daterangepicker -->
     <script src="<?= base_url('assets/admin/') ?>vendors/moment/min/moment.min.js"></script>
     <script src="<?= base_url('assets/admin/') ?>vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
     <!-- bootstrap-wysiwyg -->
     <script src="<?= base_url('assets/admin/') ?>vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
     <script src="<?= base_url('assets/admin/') ?>vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
     <script src="<?= base_url('assets/admin/') ?>vendors/google-code-prettify/src/prettify.js"></script>
     <!-- jQuery Tags Input -->
     <script src="<?= base_url('assets/admin/') ?>vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
     <!-- Switchery -->
     <script src="<?= base_url('assets/admin/') ?>vendors/switchery/dist/switchery.min.js"></script>
     <!-- Select2 -->
     <script src="<?= base_url('assets/admin/') ?>vendors/select2/dist/js/select2.full.min.js"></script>
     <!-- Parsley -->
     <script src="<?= base_url('assets/admin/') ?>vendors/parsleyjs/dist/parsley.min.js"></script>
     <!-- Autosize -->
     <script src="<?= base_url('assets/admin/') ?>vendors/autosize/dist/autosize.min.js"></script>
     <!-- jQuery autocomplete -->
     <script src="<?= base_url('assets/admin/') ?>vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
     <!-- starrr -->
     <script src="<?= base_url('assets/admin/') ?>vendors/starrr/dist/starrr.js"></script>

     <!-- Custom Theme Scripts -->
     <script src="<?= base_url('assets/admin/') ?>build/js/custom.min.js"></script>

 </body>

 </html>