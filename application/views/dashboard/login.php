<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--     Bootstrap     -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>bootstrap/css-bootstrap/bootstrap.min.css">

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <!--     CSS     -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>customcss/login.css">


    <style>

    </style>

    background-color: #9c27b0;

    <title> <?= $title; ?> </title>
</head>

<body>
    <nav class="navbar navbar-expand navbar-dark  fixed-top"> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse" id="navbarsExample02">
            <ul class="navbar-nav mr-auto">
                <a class="navbar-brand pl-4">Dreamapps</a>
            </ul>

            <a href="#" class="btn btn-outline mr-2 text-light" data-toggle="modal" data-target="#modalogin">Login</a>
            <a href="#" class="btn btn-outline text-light" data-toggle="modal" data-target="#modalregis">Register</a>
        </div>
    </nav>



    <!-- Full Page Image Header with Vertically Centered Content -->

    <div class="masthead darken-pseudo darken-with-text">
        <div class="container h-100 ">
            <div class="row h-100 align-items-center">
                <div class="col-6 offset-3 text-center ">
                    <?= $this->session->flashdata('message'); ?>
                    <h1 class="text-light">
                        Selamat Datang di Website Pengaduan Masyarakat</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Content -->

    <div class="container-fluid">
        <div class="row mx-4">
            <div class="col-12 text-center py-5" id="box">
                <div class="container py-5">
                    <h2 class="">Let&apos;s talk product</h2>
                    <h5 class="">This is the paragraph where you can write more details about your product. Keep you
                        user engaged by providing meaningful information. Remember that by this time, the user is curious,
                        otherwise he wouldn&apos;t scroll to get here. Add a button if you want the user to see more.</h5>
                </div>
            </div>
        </div>
    </div>


    <div class="modal" id="modalogin">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content" style="background-color: #e5e5e5;">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="container">
                        <div class="row p-4">
                            <div class="col-6"> <br>
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/bb/Lambang_Kota_Depok.png/463px-Lambang_Kota_Depok.png" class="mx-auto d-block" alt="" width="75%">
                            </div>
                            <div class="col-6 ">
                                <div class="">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">Login</h5>
                                        <hr>
                                        <form class="form-signin" action="<?= base_url('auth/login_rakyat') ?>" method="post">
                                            <div class="form-label-group">
                                                <input type="text" name="emaila" id="inputEmail" class="form-control" placeholder="Email" require>
                                                <label for="inputEmail">Email</label>
                                                <?= form_error('emaila', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>

                                            <div class="form-label-group">
                                                <input type="password" name="passworda" id="inputPassword" class="form-control" placeholder="password" require>
                                                <label for="inputPassword">Password</label>
                                                <?= form_error('passworda', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                            <button class="btn btn-lg btn-block text-uppercase" type="submit" style="background-color: #9c27b0;">Login</button>
                                        </form>
                                        <hr>
                                        <p class="text-center"> don't have an account? <br> <a data-toggle="modal" href="#modalregis" class="hide-modal" style="color:#9c27b0">register here</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="modalregis">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content" style="background-color: #e5e5e5;">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="container">
                        <div class="row">
                            <div class="col-6 offset-3 ">
                                <div class=" my-5">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">Register</h5>
                                        <hr>
                                        <form class="form-signin" action="<?= base_url('auth/register_rakyat'); ?>" method="POST">
                                            <div class="form-label-group">
                                                <input type="text" name="name" id="inputnama" class="form-control" placeholder="nama" value="<?= set_value('name'); ?>">
                                                <label for="inputnama">Name</label>
                                                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>

                                            <div class="form-label-group">
                                                <input type="password" name="password" id="inputpassword" class="form-control" placeholder="password" value="<?= set_value('password'); ?>">
                                                <label for="inputpassword">Password</label>
                                                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>

                                            <div class="form-label-group">
                                                <input type="email" name="email" id="inputEmaill" class="form-control" placeholder="Email" value="<?= set_value('email'); ?>">
                                                <label for="inputEmaill">Email address</label>
                                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>

                                            <div class="form-label-group">
                                                <input type="text" name="nik" pattern="[0-9]{16}" id="inputNIK" class="form-control" placeholder="NIK" value="<?= set_value('nik'); ?>">
                                                <label for="inputNIK">ID Card Number</label>
                                                <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                            <hr>
                                            <button class="btn btn-lg  btn-block text-uppercase" style="background-color: #9c27b0;" type="submit">Register</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>


<script>
    $("#modalregis").on('show.bs.modal', function() {
        $("#modalogin").modal("hide");
    });


    $(document).ready(function() {
        $("#show_hide_password a").on('click', function(event) {
            event.preventDefault();
            if ($('#show_hide_password input').attr("type") == "text") {
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass("fa-eye-slash");
                $('#show_hide_password i').removeClass("fa-eye");
            } else if ($('#show_hide_password input').attr("type") == "password") {
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass("fa-eye-slash");
                $('#show_hide_password i').addClass("fa-eye");
            }
        });
    });
</script>

</html>