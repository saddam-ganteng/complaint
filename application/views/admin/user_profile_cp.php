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
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">Edit Password</h4>
                                    <p class="card-category">Complete your profile</p>
                                    <?= $this->session->flashdata('message'); ?>
                                </div>
                                <div class="card-body">
                                    <form action="<?= base_url('admin/editpassword') ?>" method="POST">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Current Password</label>
                                                    <input type="password" name="oldpass" class="form-control">
                                                    <?= form_error('oldpass', '<small class="text-danger">', '</small>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">New Password</label>
                                                    <input type="password" name="newpass1" class="form-control">
                                                    <?= form_error('newpass1', '<small class="text-danger">', '</small>'); ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Repeat Password</label>
                                                    <input type="password" name="newpass2" class="form-control">
                                                    <?= form_error('newpass2', '<small class="text-danger">', '</small>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary pull-right">Change Password</button>
                                    </form>

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-profile">
                                <div class="card-avatar">
                                    <img class="img " src="<?= base_url('assets/img/profile/') . $user['foto'] ?>" />
                                </div>
                                <div class="card-body">
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
    <script src="<?php echo site_url() . 'assets/material/js/material-dashboard.js' ?>" type="text/javascript"></script>



    <script>

    </script>
</body>

</html>