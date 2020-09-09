<!DOCTYPE html>
<html lang="en">

<head>
    <!-- head -->
    <?php $this->load->view("admin/template/head.php") ?>
    <!-- head -->
</head>

<body>

    <div class="wrapper ">
        <!-- sidebar -->
        <?php $this->load->view("admin/template/sidebar.php") ?>
        <!-- sidebar -->
        <div class="main-panel">
            <!-- Navbar -->
            <?php $this->load->view("admin/template/navbar.php") ?>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <div class="nav-tabs-navigation">
                                        <div class="nav-tabs-wrapper">
                                            <ul class="nav nav-tabs" data-tabs="tabs">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="<?= base_url('admin/caselist') ?>">Back</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link active" href="#pendingtab" data-toggle="tab">Detail</a>
                                                </li>
                                                <li class="nav-item ml-auto">
                                                    <?php foreach ($perid as $i) {
                                                        if ($i->status == 'proses') { ?>
                                                            <a name="" id="" class="btn btn-primary float-right" href="<?= site_url('admin/complate_case?link_id=' . $i->id_pengaduan . ''); ?>" role="button"><i class="material-icons">check</i></a>
                                                        <?php } else if ($i->status == 'selesai') { ?>
                                                            <p><?= $i->tgl_selesai ?></p>
                                                    <?php }
                                                    } ?>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content ">
                                        <div class="tab-pane active" id="pendingtab">
                                            <?php foreach ($perid as $i) { ?>
                                                <p class="pt-1 text-muted">Tracking ID : #<?= $i->id_pengaduan ?> </p>
                                                <p class="pt-1 text-muted">Date : <?= $i->tgl_pengaduan ?> </p>
                                                <h2 class="pt-3"><?= $i->judul ?></h2>
                                                <p class="pt-2"><?= $i->isi_laporan ?></p>
                                                <?php if ($i->foto) { ?>
                                                    <img class="img rounded" width="300px" src="<?= base_url('assets/img/report/') . $i->foto ?>">
                                                <?php } ?>
                                            <?php } ?>
                                            <hr>
                                            <?php $id_pengaduan =  $id_pengaduan;
                                            $query = $this->db->query("SELECT * FROM tanggapan WHERE id_pengaduan = '$id_pengaduan'");
                                            foreach ($query->result() as $utama) : ?>
                                                <div class="d-flex bd-highlight" style="background-color: white;">
                                                    <div class="p-2 w-100 bd-highlight">
                                                        <p><strong> <?= $utama->nama ?> </strong></p>
                                                        <p><?= $utama->tanggapan ?></p>
                                                    </div>
                                                    <div class="p-2 flex-shrink-1 bd-highlight">
                                                        <p class="text-center"><small><?= $utama->tgl_tanggapan ?></small></p>
                                                    </div>
                                                </div>
                                                <hr>
                                            <?php endforeach; ?>
                                            <?php if ($i->status == 'proses') { ?>
                                                <form class="mb-5" method="POST" action="<?= base_url('admin/komen_admin') ?>">
                                                    <div>
                                                        <input type="hidden" value="<?= $id_pengaduan ?>" name="id">
                                                        <input type="hidden" value="<?= $user['level'] ?>" name="levelkomen">
                                                        <input type="hidden" value="<?= $user['nama'] ?>" name="nama">
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea class="form-control" id="isikomen" rows="3" name="isikomen" placeholder="Your Comment..." style="resize: none;"></textarea>
                                                    </div>
                                                    <button type="submit" class="btn" btn-lg btn-block" style="background-color: #9c27b0;">Comment</button>
                                                </form>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- footer -->
            <?php $this->load->view("admin/template/footer.php") ?>
            <!-- footer -->
        </div>
    </div>

    <!--   Core JS Files   -->
    <script src="<?php echo site_url() . 'assets/material/js/core/jquery.min.js' ?>"></script>
    <script src="<?php echo site_url() . 'assets/material/js/core/popper.min.js' ?>"></script>
    <script src="<?php echo site_url() . 'assets/material/js/core/bootstrap-material-design.min.js' ?>"></script>
    <script src="<?php echo site_url() . 'assets/material/js/plugins/perfect-scrollbar.jquery.min.js' ?>"></script>
    <!--   Core JS Files   -->

    <script src="<?php echo site_url() . 'assets/material/js/plugins/chartist.min.js' ?>"></script>
    <script src="<?php echo site_url() . 'assets/material/js/plugins/nouislider.min.js' ?>"></script>
    <script src="<?php echo site_url() . 'assets\material\js\material-dashboard.js' ?>" type="text/javascript"></script>









    <script>
        $(document).ready(function() {



        });
    </script>
</body>

</html>