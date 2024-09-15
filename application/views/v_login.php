<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url();?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <style>
        body {
        background-image: url("##");
        background-position:  center ; 
        }
    </style>

    <!-- Custom styles for this template-->
    <link href="<?= base_url();?>assets/css/sb-admin-2.min.css" rel="stylesheet">
    
</head>

<body>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-11 col-lg-12 col-md-12">

                <div class="o-hidden border-0  my-5">
                    <div class="card-body p-0">
                        
                        <!-- Nested Row within Card Body -->
                        <div class="row justify-content-center">
                        <img class="img-profile " >
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                         <h1 class="h3 text-white-900 mb-3 " style="color:white;">Selamat Datang</h1>
                                        <h1 class="h3 text-white-900 mb-3 " style="color:white;">SOFTWARE INVENTORY</h1>
                                    </div>
                                    <form class="user" action="<?=base_url();?>login/validasi" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" name="username" aria-describedby="username"
                                                placeholder="username....">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password" 
                                                id="exampleInputPassword" placeholder="password....">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                                        <a href="<?= base_url('register') ?>" class="btn btn-primary btn-user btn-block"> Register</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?=base_url(); ?>assets/jquery/jquery.min.js"></script>
    <script src="<?= base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 5000);
    </script>

    <script>
    <?php if ($this->session->flashdata('sweet_error')): ?>
    swal({
        icon: 'error',
        title: 'Oops...',
        text: '<?php echo $this->session->flashdata('sweet_error'); ?>',
        timer: 3000,
        buttons: false
    });
    <?php endif;?>

    <?php if ($this->session->flashdata('sweet_success')): ?>
    swal({
        title: "Success!",
        text: "<?php echo $this->session->flashdata('sweet_success'); ?>",
        icon: "success",
        timer: 3000,
        buttons: false
    });
    <?php endif;?>
    </script>

</body>

</html>