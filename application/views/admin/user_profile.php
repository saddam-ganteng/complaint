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
									<h4 class="card-title">Edit Profile</h4>
									<p class="card-category">Complete your profile</p>
									<?= $this->session->flashdata('message'); ?>
								</div>
								<div class="card-body">
									<?= form_open_multipart('admin/editprofile'); ?>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label class="bmd-label-floating">ID Petugas</label>
												<input type="text" name="id" class="form-control" disabled value="<?= $user['id'] ?>">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label class="bmd-label-floating">Name</label>
												<input type="text" name="name" class="form-control" value="<?= $user['nama'] ?>">
												<?= form_error('name', '<small class="text-danger">', '</small>'); ?>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label class="bmd-label-floating">Email</label>
												<input type="text" name="email" class="form-control" disabled value="<?= $user['email'] ?>">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="bmd-label-floating">Telp</label>
												<input type="text" name="telp" class="form-control" value="<?= $user['telp'] ?>">
												<?= form_error('telp', '<small class="text-danger ">', '</small>'); ?>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="bmd-label-floating">Level</label>
												<input type="text" class="form-control" disabled value="<?= $user['level'] ?>">
											</div>
										</div>
									</div>
									<button type="submit" class="btn btn-primary pull-right mt-4 ml-2">Update Profile</button>
									<a class="btn btn-primary pull-right mt-4" href="<?= base_url('admin/editpassword') ?>">Update Password</a>
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
									<div class="form-group form-file-upload form-file-multiple">
										<input type="file" multiple="" name="foto" class="inputFileHidden">
										<div class="input-group">
											<input type="text" class="form-control inputFileVisible" placeholder="Single File" />
											<span class="input-group-btn">
												<button type="button" class="btn btn-fab btn-round btn-primary">
													<i class="material-icons">attach_file</i>
												</button>
											</span>
										</div>
									</div>
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
		//// FileInput
		$('.form-file-simple .inputFileVisible').click(function() {
			$(this).siblings('.inputFileHidden').trigger('click');
		});

		$('.form-file-simple .inputFileHidden').change(function() {
			var filename = $(this).val().replace(/C:\\fakepath\\/i, '');
			$(this).siblings('.inputFileVisible').val(filename);
		});

		$('.form-file-multiple .inputFileVisible, .form-file-multiple .input-group-btn').click(function() {
			$(this).parent().parent().find('.inputFileHidden').trigger('click');
			$(this).parent().parent().addClass('is-focused');
		});

		$('.form-file-multiple .inputFileHidden').change(function() {
			var names = '';
			for (var i = 0; i < $(this).get(0).files.length; ++i) {
				if (i < $(this).get(0).files.length - 1) {
					names += $(this).get(0).files.item(i).name + ',';
				} else {
					names += $(this).get(0).files.item(i).name;
				}
			}
			$(this).siblings('.input-group').find('.inputFileVisible').val(names);
		});

		$('.form-file-multiple .btn').on('focus', function() {
			$(this).parent().siblings().trigger('focus');
		});

		$('.form-file-multiple .btn').on('focusout', function() {
			$(this).parent().siblings().trigger('focusout');
		});
	</script>
</body>

</html>