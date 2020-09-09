<!DOCTYPE html>
<html lang="en">

<head>
    <!-- head -->
    <?php $this->load->view("rakyat/template/header.php") ?>
    <!-- head -->
</head>

<body id="body" style="height:800px;">

    <?php $this->load->view("rakyat/template/navbar.php") ?>
    <!-- <div class="container">
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
    </div> -->

    <div class="container" style="margin-top: 100px;">
        <div class="row ">
            <div class="col-10 offset-1 bg-light shadow-lg">
                <nav class="pt-4">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Pending</a>
                        <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Proses</a>
                        <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">complete</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active overflow-auto" style="height:390px;" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <table class="table table-hover" width="100%">
                            <thead style="font-weight: bold;">
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th style="max-width:400px;">Subject</th>
                                    <th style="max-width:150px;">Category</th>

                                    <th style="max-width:150px;">Date</th>
                                    <th width="130px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pengaduan as $p) {
                                    if ($p['status'] == "pending") { ?>
                                        <tr class="text-center">
                                            <td><?= $p['id_pengaduan'] ?></td>
                                            <td><?= $p['judul'] ?></td>
                                            <td><?= $p['kategori'] ?></td>

                                            <td><?= $p['tgl_pengaduan'] ?></td>
                                            <td> <a name="" id="" class="btn btn-primary" href="<?= site_url('rakyat/detail_case?link_id=' . $p['id_pengaduan'] . ''); ?>" role="button">Detail</a> </td>
                                        </tr>
                                <?php }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade overflow-auto" style="height:390px;" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <table class="table table-hover" width="100%">
                            <thead style="font-weight: bold;">
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th style="max-width:400px;">Subject</th>
                                    <th style="max-width:150px;">Category</th>

                                    <th style="max-width:150px;">Date</th>
                                    <th width="130px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pengaduan as $p) {
                                    if ($p['status'] == "proses") { ?>
                                        <tr class="text-center">
                                            <td><?= $p['id_pengaduan'] ?></td>
                                            <td><?= $p['judul'] ?></td>
                                            <td><?= $p['kategori'] ?></td>

                                            <td><?= $p['tgl_pengaduan'] ?></td>
                                            <td> <a name="" id="" class="btn btn-primary" href="<?= site_url('rakyat/detail_case?link_id=' . $p['id_pengaduan'] . ''); ?>" role="button">Detail</a> </td>
                                        </tr>
                                <?php }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade overflow-auto" style="height:390px;" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <table class="table table-hover" width="100%">
                            <thead style="font-weight: bold;">
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th style="max-width:400px;">Subject</th>
                                    <th style="max-width:150px;">Category</th>

                                    <th style="max-width:150px;">Date</th>
                                    <th width="130px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pengaduan as $p) {
                                    if ($p['status'] == "selesai") { ?>
                                        <tr class="text-center">
                                            <td><?= $p['id_pengaduan'] ?></td>
                                            <td><?= $p['judul'] ?></td>
                                            <td><?= $p['kategori'] ?></td>

                                            <td><?= $p['tgl_pengaduan'] ?></td>
                                            <td> <a name="" id="" class="btn btn-primary" href="<?= site_url('rakyat/detail_case?link_id=' . $p['id_pengaduan'] . ''); ?>" role="button">Detail</a> </td>
                                        </tr>
                                <?php }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="container-fluid pt-5" style="background-color: #F7F8F9; margin-top:300px;">
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
            $(document).ready(function() {
                $('#tolme').tooltip();
                $('#tolgit').tooltip();
                $('#tolface').tooltip();
            });

            $(window).scroll(function() {
                var scroll = $(window).scrollTop();
                //>=, not <=
                if (scroll > 80) {
                    //clearHeader, not clearheader - caps H
                    $(".navbar").css('background', 'white');
                    $(".navbar").addClass('shadow-lg')
                } else {
                    $(".navbar").css('background', 'transparent');
                }
            }); //missing );


        });
    </script>
</body>

</html>