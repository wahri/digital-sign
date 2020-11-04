 <?php $this->load->view('tatausaha/template/header') ?>

 <!-- Bootstrap -->
 <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
 <link href="<?= base_url('assets/admin/') ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
 <!-- Font Awesome -->
 <!-- <link href="<?= base_url('assets/admin/') ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet"> -->
 <script src="https://kit.fontawesome.com/865f9cf8f5.js" crossorigin="anonymous"></script>

 <!-- NProgress -->
 <link href="<?= base_url('assets/admin/') ?>vendors/nprogress/nprogress.css" rel="stylesheet">
 <!-- iCheck -->
 <link href="<?= base_url('assets/admin/') ?>vendors/iCheck/skins/flat/green.css" rel="stylesheet">
 <!-- bootstrap-progressbar -->
 <link href="<?= base_url('assets/admin/') ?>vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
 <!-- PNotify -->
 <link href="<?= base_url('assets/admin/') ?>vendors/pnotify/dist/pnotify.css" rel="stylesheet">
 <link href="<?= base_url('assets/admin/') ?>vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
 <link href="<?= base_url('assets/admin/') ?>vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">

 <!-- Datatables -->

 <link href="<?= base_url('assets/admin/') ?>vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
 <link href="<?= base_url('assets/admin/') ?>vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
 <link href="<?= base_url('assets/admin/') ?>vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
 <link href="<?= base_url('assets/admin/') ?>vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
 <link href="<?= base_url('assets/admin/') ?>vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

 <!-- Custom Theme Style -->
 <link href="<?= base_url('assets/admin/') ?>build/css/custom.min.css" rel="stylesheet">

 </head>

 <body class="nav-md">
     <div class="container body">
         <div class="main_container">
             <?php $this->load->view('dekan/template/sidebar'); ?>

             <!-- top navigation -->
             <?php $this->load->view('dekan/template/topbar'); ?>
             <!-- /top navigation -->

             <!-- page content -->
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
                                 </div>
                             <?php } ?>

                         </div>
                     </div>

                     <div class="row">
                         <div class="col-md-12 col-sm-12  ">
                             <div class="x_panel">
                                 <div class="x_title">
                                     <h2>Pengajuan surat mahasiswa</h2>
                                     <div class="clearfix"></div>
                                 </div>
                                 <div class="x_content">
                                     <div class="row">
                                         <div class="col-sm-12">
                                             <div class="card-box table-responsive">
                                                 <table id="tabel_pengajuan" class="table table-striped table-bordered">
                                                     <thead>
                                                         <tr>
                                                             <th>NIM</th>
                                                             <th>Nama</th>
                                                             <th>Tanggal Pengajuan</th>
                                                             <th class="text-center">Action</th>
                                                         </tr>
                                                     </thead>
                                                     <tbody>
                                                         <?php foreach ($tabel_pengajuan as $d) : ?>
                                                             <tr>
                                                                 <td class="align-middle"><?= $d['nim'] ?></td>
                                                                 <td class="align-middle"><?= $d['nama'] ?></td>
                                                                 <td class="align-middle"><?= date('d F Y', strtotime($d['tanggal_pengajuan'])) ?></td>
                                                                 <td width="10%" class="text-center">
                                                                     <button type="button" class="btn btn-app" data-toggle="modal" data-target="#modal<?= $d['nim'] ?>">
                                                                         <i class="fa fa-search-plus"></i>
                                                                         Check
                                                                     </button>

                                                                 </td>
                                                             </tr>
                                                             <div class="modal fade bs-example-modal-lg" id="modal<?= $d['nim'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                 <div class="modal-dialog modal-lg">
                                                                     <div class="modal-content">

                                                                         <div class="modal-header">
                                                                             <h4 class="modal-title" id="myModalLabel">Data Mahasiswa</h4>
                                                                             <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                                             </button>
                                                                         </div>
                                                                         <div class="modal-body">
                                                                             <h4>Permohonan pembuatan surat keterangan aktif kuliah</h4>
                                                                             <!-- <table>
                                                                                 <tr>
                                                                                     <th>NIM</th>
                                                                                     <td><?= $d['nim'] ?></td>
                                                                                 </tr>
                                                                                 <tr>
                                                                                     <th>Nama</th>
                                                                                     <td><?= $d['nama'] ?></td>
                                                                                 </tr>
                                                                                 <tr>
                                                                                     <th>Tempat, Tanggal Lahir</th>
                                                                                     <td><?= $d['tempat_lahir'] ?>, <?= $d['tanggal_lahir'] ?></td>
                                                                                 </tr>
                                                                                 <tr>
                                                                                     <th>Prodi</th>
                                                                                     <td><?= $d['prodi'] ?></td>
                                                                                 </tr>
                                                                             </table> -->
                                                                             <p>Oleh:</p>
                                                                             <p>NIM : <?= $d['nim'] ?></p>
                                                                             <p>Nama : <?= $d['nama'] ?></p>
                                                                             <p>Tempat, Tanggal Lahir : <?= $d['tempat_lahir'] ?>, <?= $d['tanggal_lahir'] ?></p>
                                                                             <p>Prodi : <?= $d['prodi'] ?></p>
                                                                         </div>
                                                                         <div class="modal-footer">
                                                                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                             <a href="<?= base_url('dekan/surat/setujui/') . $d['id_pengajuan'] . '/' . $d['nim'] ?>" class="btn btn-danger">Tolak</a>
                                                                             <a href="<?= base_url('dekan/surat/setujui/') . $d['id_pengajuan'] . '/' . $d['nim'] ?>" class="btn btn-primary">Setujui</a>
                                                                         </div>

                                                                     </div>
                                                                 </div>
                                                             </div>
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

                     <div class="row">
                         <div class="col-md-12 col-sm-12  ">
                             <div class="x_panel">
                                 <div class="x_title">
                                     <h2>Surat diterbitkan</h2>
                                     <div class="clearfix"></div>
                                 </div>
                                 <div class="x_content">
                                     <div class="row">
                                         <div class="col-sm-12">
                                             <div class="card-box table-responsive">
                                                 <table id="tabel_terbit" class="table table-striped table-bordered">
                                                     <thead>
                                                         <tr>
                                                             <th>NIM</th>
                                                             <th>Nama</th>
                                                             <th>Tanggal Pengajuan</th>
                                                             <th class="text-center">Action</th>
                                                         </tr>
                                                     </thead>
                                                     <tbody>
                                                         <?php foreach ($tabel_terbit as $d) : ?>
                                                             <tr>
                                                                 <td class="align-middle"><?= $d['nim'] ?></td>
                                                                 <td class="align-middle"><?= $d['nama'] ?></td>
                                                                 <td class="align-middle"><?= date('d F Y', strtotime($d['tanggal_disetujui'])) ?></td>
                                                                 <td width="10%" class="text-center">
                                                                     <a href="<?= base_url('assets/surat/' . $d['nama_surat']) ?>" class="btn btn-app" target="_blank">
                                                                         <i class="fa fa-search-plus"></i>
                                                                         Check
                                                                     </a>

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
             </div>
             <!-- /page content -->

             <!-- footer content -->
             <?php $this->load->view('dekan/template/footer'); ?>
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
     <!-- Datatables -->
     <script src="<?= base_url('assets/admin/') ?>vendors/datatables.net/js/jquery.dataTables.min.js"></script>
     <script src="<?= base_url('assets/admin/') ?>vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
     <script src="<?= base_url('assets/admin/') ?>vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
     <script src="<?= base_url('assets/admin/') ?>vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
     <script src="<?= base_url('assets/admin/') ?>vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
     <script src="<?= base_url('assets/admin/') ?>vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
     <script src="<?= base_url('assets/admin/') ?>vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
     <script src="<?= base_url('assets/admin/') ?>vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
     <script src="<?= base_url('assets/admin/') ?>vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
     <script src="<?= base_url('assets/admin/') ?>vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
     <script src="<?= base_url('assets/admin/') ?>vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
     <script src="<?= base_url('assets/admin/') ?>vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
     <script src="<?= base_url('assets/admin/') ?>vendors/jszip/dist/jszip.min.js"></script>
     <script src="<?= base_url('assets/admin/') ?>vendors/pdfmake/build/pdfmake.min.js"></script>
     <script src="<?= base_url('assets/admin/') ?>vendors/pdfmake/build/vfs_fonts.js"></script>
     <script>
         $('#tabel_pengajuan').DataTable()
         $('#tabel_menunggu').DataTable()
         $('#tabel_terbit').DataTable()
     </script>
     <!-- Custom Theme Scripts -->
     <script src="<?= base_url('assets/admin/') ?>build/js/custom.min.js"></script>

 </body>

 </html>