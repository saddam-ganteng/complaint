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
                                                    <a class="nav-link active" href="#pendingtab" data-toggle="tab">Pending</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#prosestab" data-toggle="tab">Proses</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#complatetab" data-toggle="tab">Complate</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content text-center">
                                        <div class="tab-pane active table-responsive" id="pendingtab" style="height: 450px;">
                                            <table class="table ">
                                                <thead>
                                                    <tr>
                                                        <th style="max-width:50px;" class="text-center">ID</th>
                                                        <th style="max-width:100px;">Subject</th>
                                                        <th style="max-width:100px;">Date</th>
                                                        <th style="max-width:100px;">Type</th>
                                                        <th style="max-width:100px;">Category</th>
                                                        <th style="max-width:100px;" class="text-right pr-4">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($pengaduan as $p) {
                                                        if ($p->status == "pending") { ?>
                                                            <tr class="text-center">
                                                                <td><?= $p->id_pengaduan ?></td>
                                                                <td><?= $p->judul ?></td>
                                                                <td><?= $p->tgl_pengaduan ?></td>
                                                                <td><?= $p->jenis ?></td>
                                                                <td><?= $p->kategori ?></td>
                                                                <td> <a name="" id="" class="btn btn-primary float-right" href="<?= site_url('admin/pending_case?link_id=' . $p->id_pengaduan . ''); ?>" role="button"><i class="material-icons">check</i></a> </td>
                                                            </tr>
                                                    <?php }
                                                    } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane  table-responsive" id="prosestab" style="height: 450px;">
                                            <table class="table ">
                                                <thead>
                                                    <tr>
                                                        <th style="max-width:50px;" class="text-center">ID</th>
                                                        <th style="width:300px;">Subject</th>
                                                        <th style="max-width:100px;">Date</th>
                                                        <th style="max-width:100px;">Type</th>
                                                        <th style="max-width:100px;">Category</th>
                                                        <th style="max-width:100px;" class="text-right pr-4">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($pengaduan as $p) {
                                                        if ($p->status == "proses") { ?>
                                                            <tr class="text-center">
                                                                <td><?= $p->id_pengaduan ?></td>
                                                                <td><?= $p->judul ?></td>
                                                                <td><?= $p->tgl_pengaduan ?></td>
                                                                <td><?= $p->jenis ?></td>
                                                                <td><?= $p->kategori ?></td>
                                                                <td> <a name="" id="" class="btn btn-primary float-right" href="<?= site_url('admin/detail_case?link_id=' . $p->id_pengaduan . ''); ?>" role="button">Detail</a> </td>
                                                            </tr>
                                                    <?php }
                                                    } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane  table-responsive" id="complatetab" style="height: 450px;">
                                            <table class="table ">
                                                <thead>
                                                    <tr>
                                                        <th style="max-width:50px;" class="text-center">ID</th>
                                                        <th style="width:300px;">Subject</th>
                                                        <th style="max-width:100px;">Date</th>
                                                        <th style="max-width:100px;">Type</th>
                                                        <th style="max-width:100px;">Category</th>
                                                        <th style="max-width:100px;" class="text-right pr-4">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($pengaduan as $p) {
                                                        if ($p->status == "selesai") { ?>
                                                            <tr class="text-center">
                                                                <td><?= $p->id_pengaduan ?></td>
                                                                <td><?= $p->judul ?></td>
                                                                <td><?= $p->tgl_pengaduan ?></td>
                                                                <td><?= $p->jenis ?></td>
                                                                <td><?= $p->kategori ?></td>
                                                                <td> <a name="" id="" class="btn btn-primary float-right" href="<?= site_url('admin/detail_case?link_id=' . $p->id_pengaduan . ''); ?>" role="button">Detail</a> </td>
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