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
                         <div class="col-md-4 col-sm-4 col-xs-12">
                             </br>
                             <div class="x_content">
                                 <div class="form-group">
                                     <select name="user" class="form-control" onchange="location = this.value;">
                                         <option value="<?= base_url('admin/user/index/admin') ?>" <?= $user == 'admin' ? 'selected' : '' ?>>Admin</option>
                                         <option value="<?= base_url('admin/user/index/dosen') ?>" <?= $user == 'dosen' ? 'selected' : '' ?>>Dosen</option>
                                         <option value="<?= base_url('admin/user/index/mahasiswa') ?>" <?= $user == 'mahasiswa' ? 'selected' : '' ?>>Mahasiswa</option>
                                     </select>
                                 </div>
                                 <?php if ($user == 'dosen') : ?>

                                     <form action="" method="post" enctype="multipart/form-data">
                                         <div class="form-group">
                                             <label>NIDN <span class="required">*</span></label>
                                             <input type="text" class="form-control" name="nidn" required>
                                         </div>
                                         <div class="form-group">
                                             <label>Nama</label>
                                             <input type="text" class="form-control" name="nama" required>
                                         </div>
                                         <div class="form-group">
                                             <label>Role</label>
                                             <div class="radio">
                                                 <input type="radio" class="flat" name="level" value="1" checked> TU
                                             </div>
                                             <div class="radio">
                                                 <input type="radio" class="flat" name="level" value="1"> Dekan
                                             </div>
                                         </div>
                                         <div class="form-group">
                                             <label>Password <span class="required">*</span></label>
                                             <input type="password" class="form-control" name="password" required>
                                             <p class="help-block">isikan password untuk pengguna.</p>
                                         </div>
                                         <div class="form-group">
                                             <label>Confirm Password <span class="required">*</span></label>
                                             <input type="password" class="form-control" name="password_confirm" required>
                                             <p class="help-block">silahkan ulangi password pengguna.</p>
                                         </div>

                                         <div class="ln_solid"></div>
                                         <div class="form-group">
                                             <button type="submit" value="1" name="dosen" class="btn btn-success">Tambah User Dosen</button>
                                         </div>
                                     </form>
                                 <?php elseif ($user == 'mahasiswa') : ?>
                                     <form action="" method="post" enctype="multipart/form-data">
                                         <div class="form-group">
                                             <label>NIM <span class="required">*</span></label>
                                             <input type="text" class="form-control" name="nim" required>
                                             <p class="help-block">digunakan untuk login pengguna.</p>
                                         </div>
                                         <div class="form-group">
                                             <label>Nama <span class="required">*</span></label>
                                             <input type="text" class="form-control" name="nama" required>
                                             <p class="help-block">Nama pertama pengguna.</p>
                                         </div>
                                         <div class="form-group">
                                             <label>Password <span class="required">*</span></label>
                                             <input type="password" class="form-control" name="password" required>
                                             <p class="help-block">isikan password untuk pengguna.</p>
                                         </div>
                                         <div class="form-group">
                                             <label>Confirm Password <span class="required">*</span></label>
                                             <input type="password" class="form-control" name="password_confirm" required>
                                             <p class="help-block">silahkan ulangi password pengguna.</p>
                                         </div>

                                         <div class="ln_solid"></div>
                                         <div class="form-group">
                                             <button type="submit" value="1" name="mahasiswa" class="btn btn-success">Tambah User Mahasiswa</button>
                                         </div>
                                     </form>
                                 <?php else : ?>
                                     <form action="" method="post" enctype="multipart/form-data">
                                         <div class="form-group">
                                             <label>Username <span class="required">*</span></label>
                                             <input type="text" class="form-control" name="username" required>
                                             <p class="help-block">Nama pertama pengguna.</p>
                                         </div>
                                         <div class="form-group">
                                             <label>Password <span class="required">*</span></label>
                                             <input type="password" class="form-control" name="password" required>
                                             <p class="help-block">isikan password untuk pengguna.</p>
                                         </div>
                                         <div class="form-group">
                                             <label>Confirm Password <span class="required">*</span></label>
                                             <input type="password" class="form-control" name="password_confirm" required>
                                             <p class="help-block">silahkan ulangi password pengguna.</p>
                                         </div>

                                         <div class="ln_solid"></div>
                                         <div class="form-group">
                                             <button type="submit" value="1" name="admin" class="btn btn-success">Tambah User Admin</button>
                                         </div>
                                     </form>

                                 <?php endif; ?>

                             </div>


                         </div>

                         <div class="col-md-8 col-sm-8 col-xs-12">

                             <div class="x_panel">
                                 <div class="x_content">
                                     <table class="table">
                                         <thead>
                                             <tr>
                                                 <th>Group</th>
                                                 <th>Username</th>
                                                 <th>Nama</th>
                                                 <th>Email</th>
                                                 <th class="text-center">Status</th>
                                                 <th class="text-center">Setting</th>
                                             </tr>
                                         </thead>
                                         <tbody id="tbodySearch">
                                             <tr>
                                                 <td>1</td>
                                                 <td>2</td>
                                                 <td>3</td>
                                                 <td>4</td>
                                                 <td>5</td>
                                                 <td>6</td>
                                             </tr>
                                         </tbody>
                                     </table>
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
     <script src="<?= base_url('assets/admin/') ?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
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