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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--     CSS     -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>customcss/login.css">


    <style>
        /* .row>* {
            border: solid 1px;
        } */
    </style>



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
                        Welcome to the Public Complaints Website</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Content -->

    <div class="container-fluid mb-5 ">
        <div class="row mx-4 shadow-lg rounded">
            <div class="col-12 text-center py-5" id="box">
                <div class="container py-5">
                    <h2 class="">“Berani LAPOR! Untuk Pelayanan Publik yang Lebih Baik”</h2>

                    <div class="row py-5">
                        <div class="col-3">
                            <h1><i class="fa fa-edit" style="font-size:70px;color:#9c27b0"></i></h1>
                            Laporkan keluhan atau aspirasi anda dengan jelas dan lengkap
                        </div>
                        <div class="col-3">
                            <h1><i class="fa fa-comments" style="font-size:70px;color:#9c27b0"></i></h1>
                            Dalam 5 hari, instansi akan menindaklanjuti dan membalas laporan Anda
                        </div>
                        <div class="col-3">
                            <h1><i class="fa fa-share" style="font-size:60px;color:#9c27b0"></i></h1>
                            Dalam 3 hari, laporan Anda akan diverifikasi dan diteruskan kepada instansi berwenang
                        </div>
                        <div class="col-3">
                            <h1><i class="fa fa-check" style="font-size:70px;color:#9c27b0"></i></h1>
                            Laporan Anda akan terus ditindaklanjuti hingga terselesaikan
                        </div>
                    </div>
                    <div class="row">
                        <video class="mx-auto" style="width: 600px;" controls>
                            <source src="<?= base_url() ?>assets/video/lapor.mp4" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5 mb-5" style="background-color: #9c27b0;">
        <h3 class="text-center">TOTAL REPORTS NOW</h3>
        <h1 class="text-center">asd</h1>
    </div>
    <!-- <div class="row">
        <div class="col-1 bg-primary">
            <p>1</p>
        </div>
        <div class="col-1 bg-primary">
            <p>1</p>
        </div>
        <div class="col-1 bg-primary">
            <p>1</p>
        </div>
        <div class="col-1 bg-primary">
            <p>1</p>
        </div>
        <div class="col-1 bg-primary">
            <p>1</p>
        </div>
        <div class="col-1 bg-primary">
            <p>1</p>
        </div>
        <div class="col-1 bg-primary">
            <p>1</p>
        </div>
        <div class="col-1 bg-primary">
            <p>1</p>
        </div>
        <div class="col-1 bg-primary">
            <p>1</p>
        </div>
        <div class="col-1 bg-primary">
            <p>1</p>
        </div>
        <div class="col-1 bg-primary">
            <p>1</p>
        </div>
        <div class="col-1 bg-primary">
            <p>1</p>
        </div>
    </div> -->
    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-4 offset-1 ">
                <small>Developed by</small><br>
                <i class="fa fa-user pt-2" style="font-size:50px;color:#9c27b0" data-toggle="tooltip" title="Saddam Dermawan" id='tolme'></i>
            </div>
            <div class="col-4 offset-2 ">
                <small class="m-5">want to know about me?</small> <br>
                <a href="https://github.com/saddam-der" target="_blank"><i class="fa fa-github pr-2 pt-2" style="font-size:50px;color:#9c27b0" data-toggle="tooltip" title="saddam-der" id='tolgit'></i></a>
                <a href="https://github.com/saddam-der" target="_blank"><i class="fa fa-facebook-square" style="font-size:50px;color:#9c27b0" data-toggle="tooltip" title="saddam dermawan" id='tolface'></i></a>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5">
        <div class="row text-center">
            <div class="col-12"> &copy; DMARE</div>
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
                                        <p class="text-center"> <a data-toggle="modal" href="#modalforgot" class="hide-modal" style="color:#9c27b0">Forgot Password</a></p>
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

    <div class="modal" id="modalforgot">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content" style="background-color: #e5e5e5;">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="container">
                        <div class="row p-4">
                            <div class="col-12">
                                <div class="card-body">
                                    <h5 class="card-title text-center">Forgot Password</h5>
                                    <hr>
                                    <form class="form-signin" action="<?= base_url('auth/forgotpassword') ?>" method="post">
                                        <div class="form-label-group">
                                            <input type="text" name="email" id="formail" class="form-control" placeholder="Email" require>
                                            <label for="formail">Email</label>
                                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <button class="btn btn-lg btn-block text-uppercase" type="submit" style="background-color: #9c27b0;">Reset Password</button>
                                    </form>
                                    <hr>
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

    $("#modalforgot").on('show.bs.modal', function() {
        $("#modalogin").modal("hide");
    });

    $(document).ready(function() {
        $(window).scroll(function() {
            var scroll = $(window).scrollTop();
            //>=, not <=
            if (scroll >= 600) {
                //clearHeader, not clearheader - caps H
                $(".navbar").addClass("bgnav");
            } else {
                $(".navbar").removeClass("bgnav");
            }
        }); //missing );
        // document ready  
    });

    $(document).ready(function() {
        $('#tolme').tooltip();
        $('#tolgit').tooltip();
        $('#tolface').tooltip();
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