<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Tautkan file print.css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/print.css') ?>">

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">




</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('home') ?>">

                <div class="sidebar-brand-text mx-1">NAMA TOKO</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= (isset($home)) ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('home') ?>">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Manajemen Stock
            </div>


            <!-- Nav Item - Pages Collapse Menu -->
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item <?= (isset($master)) ? '' : '' ?>">
                <a class="nav-link" href="<?= base_url('barang') ?>">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Ketersediaan Stock</span>
                </a>

                <!-- Barang Masuk -->
                <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Input Barang Masuk</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <b>
                            <a class="collapse-item" href="<?= base_url('barangmasuk'); ?>">Barang Masuk</a>
                            <a class="collapse-item" href="<?= base_url('riwayatmasuk'); ?>">Riwayat Barang Masuk</a>
                            <a class="collapse-item" href="<?= base_url('history'); ?>">Riwayat Pembaruan</a>

                        </b>
                    </div>
                </div>

                <!-- Barang Keluar -->
                <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Input Barang Keluar</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <b>
                            <a class="collapse-item" href="<?= base_url('barangkeluar'); ?>">Barang Keluar</a>
                            <a class="collapse-item" href="<?= base_url('riwayatkeluar'); ?>">Riwayat Barang Keluar</a>
                        </b>
                    </div>
                </div>
                <?php if ($this->session->userdata('role_id') == 1) : ?>
                    <!-- Menu List Pengguna -->
                    <a class="nav-link" href="<?= base_url('pengguna') ?>">
                        <i class="fas fa-fw fa-users"></i>
                        <span>List Pengguna</span>
                    </a>
                <?php endif; ?>

                <!-- Nav Item - Utilities Collapse Menu -->
                <!-- Divider -->

            </li>





            <!-- Heading -->


            <!-- Nav Item - Pages Collapse Menu -->


            <!-- Nav Item - Charts -->


            <!-- Nav Item - Tables -->


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->


                        <!-- Dropdown - Messages -->


                        <!-- Nav Item - Alerts -->

                        <!-- Dropdown - Alerts -->


                        <!-- Nav Item - Messages -->


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $this->session->userdata('nama_lengkap'); ?></span>
                                <img class="img-profile rounded-circle" src="<?= base_url(); ?>assets/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="login" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <?php if (isset($konten)) echo $konten; ?>
                <div class="container-fluid">
                    <!-- Page Heading -->


                    <!-- Your Page Content -->
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Content Goes Here -->
                            <?php if (isset($master)) {
                                echo $master; // Pastikan variabel $master digunakan dengan benar
                            } ?> <!-- This should display your v_barang.php content -->
                        </div>
                    </div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Analisa dan Perancangan Sistem Informasi 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Load CSS untuk Select2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <!-- Load jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Load JavaScript untuk Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>





    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url(); ?>assets/js/demo/datatables-demo.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 5000);
    </script>

    <script>
        <?php if ($this->session->flashdata('sweet_error')) : ?>
            swal({
                icon: 'error',
                title: 'Oops...!!!',
                text: '<?php echo $this->session->flashdata('sweet_error'); ?>',
                timer: 3000,
                buttons: false
            });
        <?php endif; ?>

        <?php if ($this->session->flashdata('sweet_success')) : ?>
            swal({
                title: "Success!",
                text: "<?php echo $this->session->flashdata('sweet_success'); ?>",
                icon: "success",
                timer: 3000,
                buttons: false
            });
        <?php endif; ?>
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.btn-print').on('click', function() {
                window.print();
            });
        });
    </script>
</body>

</html>