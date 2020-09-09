<!DOCTYPE html>
<html lang="en">

<head>
    <!-- head -->
    <?php $this->load->view("rakyat/template/header.php") ?>
    <!-- head -->
</head>

<body id="body" style="height:2000px;">

    <?php $this->load->view("rakyat/template/navbar.php") ?>


    <div class="container h-25 ">
        <div class="row h-100 align-items-center">
            <div class="col-6 offset-3 text-center ">
                <h3 class="text-light">
                    Aspirations and Complaints Online Service</h3>
            </div>
        </div>
    </div>
    <div class="container mt-5 ">
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
        <div class="row">
            <div class="col-8 offset-2 bg-light shadow-lg">
                <p class="p-2"><i class="fa fa-info-circle mr-2"></i>Be responsible for what you report</p>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-8 offset-2 bg-light p-3 shadow-lg">
                <nav class="nav-justified ">
                    <div class="nav nav-tabs " id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active text-dark" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Complaint</a>
                        <a class="nav-item nav-link text-dark" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Aspirations</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">

                    <!-- FORM Complaints  -->
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <hr>
                        <form action="<?= base_url('rakyat/insertreport'); ?>" enctype="multipart/form-data" method="POST">
                            <input type="hidden" class="form-control " id="typecom" name="typecom" value="complaints">
                            <div class="form-group my-5">
                                <input type="text" class="form-control mt-5" id="title" name="titlecom" placeholder="Type your title*">
                                <?= form_error('titlecom', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group my-5">
                                <textarea class="form-control" name="contentcom" id="contentcom" rows="5" placeholder="Type the contents of your report*" style="resize: none;"></textarea>
                                <?= form_error('contentcom', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group my-4">
                                <input type="text" class="form-control" id="towncom" name="towncom" placeholder="Type your home town*">
                                <?= form_error('towncom', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group my-4">
                                <select name="catecom" class="custom-select">
                                    <option hidden selected>Open this select Category</option>
                                    <option value="health">Health</option>
                                    <option value="education">Education</option>
                                    <option value="tourism">Tourism</option>
                                    <option value="electricity">Electricity</option>
                                    <option value="security">Security</option>
                                </select>
                                <?= form_error('catecom', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="fotocom" name="fotocom" multiple>
                                            <label class="custom-file-label" for="fotocom">Choose file</label>
                                            <small id="fotocom" class="form-text text-muted">Jika Ada, jika tidak ada tidak usah</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mt-5">
                                        <button type="submit" class="btn btn-primary float-right mt-5">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- FORM Complaints  -->

                    <!-- FORM Aspirations  -->
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <hr>
                        <form action="<?= base_url(''); ?>" enctype="multipart/form-data" method="POST">
                            <input type="hidden" class="form-control " id="typecom" name="typecom" value="complaints">
                            <div class="form-group my-5">

                                <input type="text" class="form-control mt-5" id="title" name="titlecom" placeholder="Type your title*">
                                <?= form_error('titlecom', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group my-5">

                                <textarea class="form-control" name="contentcom" id="contentcom" rows="5" placeholder="Type the contents of your report*" style="resize: none;"></textarea>
                            </div>
                            <div class="form-group my-4">

                                <input type="text" class="form-control" id="towncom" name="towncom" placeholder="Type your home town*">
                                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                            </div>
                            <div class="form-group my-4">
                                <select name="catecom" class="custom-select">
                                    <option hidden selected>Open this select Category</option>
                                    <option value="health">Health</option>
                                    <option value="education">Education</option>
                                    <option value="tourism">Tourism</option>
                                    <option value="electricity">Electricity</option>
                                    <option value="security">Security</option>
                                </select>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="fotocom" name="fotocom">
                                            <label class="custom-file-label" for="fotocom">Choose file</label>
                                            <small id="fotocom" class="form-text text-muted">Jika Ada, jika tidak ada tidak usah</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mt-5">
                                        <button type="submit" class="btn btn-primary float-right mt-5">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- FORM Aspirations  -->
                </div>
            </div>
        </div>
        <div class="row py-5 my-5 text-center">
            <div class="col-3">
                <h1><i class="fa fa-edit" style="font-size:60px;color:#9c27b0"></i></h1>
                Laporkan keluhan atau aspirasi anda dengan jelas dan lengkap
            </div>
            <div class="col-3">
                <h1><i class="fa fa-share" style="font-size:60px;color:#9c27b0"></i></h1>
                Dalam 3 hari, laporan Anda akan diverifikasi dan diteruskan kepada instansi berwenang
            </div>
            <div class="col-3">
                <h1><i class="fa fa-comments" style="font-size:60px;color:#9c27b0"></i></h1>
                Dalam 5 hari, instansi akan menindaklanjuti dan membalas laporan Anda
            </div>
            <div class="col-3">
                <h1><i class="fa fa-check" style="font-size:60px;color:#9c27b0"></i></h1>
                Laporan Anda akan terus ditindaklanjuti hingga terselesaikan
            </div>
        </div>
    </div>

    <div class="container-fluid py-5 mt-5" style="background-color: #9c27b0;">
        <h3 class="text-center">TOTAL REPORTS NOW</h3>
        <h1 class="text-center">12</h1>
    </div>

    <div class="container-fluid pt-5" style="background-color: #F7F8F9;">
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

    <div class="container-fluid py-5" style="background-color: #F7F8F9;">
        <div class="row text-center">
            <div class="col-12"> &copy; DMARE</div>
        </div>
    </div>






    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $(window).scroll(function() {
                var scroll = $(window).scrollTop();
                //>=, not <=
                if (scroll > 490) {
                    //clearHeader, not clearheader - caps H
                    $(".navbar").css('background', 'white');
                } else {
                    $(".navbar").css('background', 'transparent');
                }
            }); //missing );

            $('.custom-file-input').on('change', function() {
                let fileName = $(this).val().split('\\').pop();
                $(this).next('.custom-file-label').addClass("selected").html(fileName);
            });

            $('#datepicker').datepicker({
                uiLibrary: 'bootstrap4'
            });
        });

        $(document).ready(function() {
            $('#tolme').tooltip();
            $('#tolgit').tooltip();
            $('#tolface').tooltip();
        });
    </script>
</body>

</html>