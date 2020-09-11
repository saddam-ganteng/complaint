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
                        <div class="col-md-10 offset-1">
                            <?= $this->session->flashdata('message'); ?>
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">Add Officer</h4>
                                    <p class="card-category">Officer Form Profile</p>
                                </div>
                                <div class="card-body">
                                    <form action="<?= base_url('admin/insert_officer') ?>" method="POST">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Name</label>
                                                    <input type="text" name="nameoff" class="form-control">
                                                    <?= form_error('nameoff', '<small class="text-danger">', '</small>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Password</label>
                                                    <input type="password" name="passwordoff" class="form-control">
                                                    <?= form_error('passwordoff', '<small class="text-danger">', '</small>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="inputState">Level</label>
                                                <select name="leveloff" id="inputState" class="form-control">
                                                    <option hidden selected>Choose</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="petugas">Officer</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Email</label>
                                                    <input type="text" name="emailoff" class="form-control">
                                                    <?= form_error('emailoff', '<small class="text-danger ">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Phone Number</label>
                                                    <input type="text" name="telpoff" class="form-control">
                                                    <?= form_error('telpoff', '<small class="text-danger ">', '</small>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary pull-right mt-4 ml-2">Add Officer</button>
                                    </form>
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