<!DOCTYPE html>
<html lang="en">

<head>
    <!-- head -->
    <?php $this->load->view("rakyat/template/header.php") ?>
    <!-- head -->
</head>

<body id="body" style="height:1000px;">

    <?php $this->load->view("rakyat/template/navbar.php") ?>


    <div class="container  pt-5">
        <div class="row h-100 align-items-center">
            <div class="col-10 offset-1 bg-light shadow-lg">
                <div class="d-flex bd-highlight">
                    <div class="p-2 flex-shrink-1 bd-highlight"><img src="<?= base_url('assets/img/profile/') . $user['foto'] ?>" width="55" height="55" class="rounded-circle m-4"></div>
                    <div class="p-2 w-100 bd-highlight mt-4">
                        <p> <a href="#"><?= $user['nama'] ?></a> <i class="fa fa-globe pl-4 text-muted"><small> Website </small></i> </p>
                        <?php foreach ($perid as $i) { ?>
                            <p class="pt-1 text-muted">Tracking ID : #<?= $i->id_pengaduan ?> </p>
                            <h2 class="pt-3"><?= $i->judul ?></h2>
                            <p class="pt-2"><?= $i->isi_laporan ?></p>

                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">

                                    <a class="nav-link" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fa fa-comments text-muted">
                                            Comments </i> </a>

                                    <a class="nav-link" id="nav-profile-tab" data-toggle="modal" data-target="#modalhapuscase" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="fa fa-trash text-muted">
                                            Delete Case </i> </a>

                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade " id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <p>ini comments</p>

                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
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
        </div>

    </div>



    <!-- <div class="container-fluid pt-5" style="background-color: #F7F8F9;">
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
    </div> -->

    <div class="container-fluid py-5" style="background-color: #F7F8F9;">
        <div class="row text-center">
            <div class="col-12"> &copy; DMARE</div>
        </div>
    </div>

    <!-- Modal HAPUS -->
    <div class="modal fade" id="modalhapuscase" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-4">
                    <h5>Are you sure to delete this</h5>
                </div>
                <div class="modal-footer pt-4">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
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
                    $(".navbar").addClass('shadow-lg')
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