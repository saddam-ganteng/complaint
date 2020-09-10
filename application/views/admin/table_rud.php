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
									<h4 class="card-title ">Tabel User </h4>
									<p class="card-category"> Ada <?php echo $total_user; ?> user</p>
								</div>
								<div class="col-12">
									<button type="submit" class="btn btn-primary pull-right ml-2"> <a href="<?php echo site_url('admin/print_pdf'); ?>" class="text-light">Print PDF</a> </button>

									<button type="submit" class="btn btn-primary pull-right"> <a href="<?php echo site_url('admin/xml'); ?>" class="text-light">Print XML</a> </button>
								</div>

								<div class="card-body">
									<div class="table-responsive ">
										<table class="table table-hover text-center" id="mytable">
											<thead class=" text-primary">
												<tr>
													<th>ID CARD NUMBER</th>
													<th>NAME</th>
													<th>NO MOBILE HANDPHONE</th>
													<th>EMAIL</th>
													<th>PHOTO</th>
													<th>ACTION</th>
												</tr>
											</thead>
											<tbody>

											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Modal Update Rakyat-->
			<form id="add-row-form" action="<?php echo site_url('admin/insertray'); ?>" method="post" enctype="multipart/form-data">
				<div class="modal fade" id="ModalInsert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title" id="myModalLabel">Insert User</h4>
							</div>
							<div class="modal-body">
								<div class="form-group form-file-upload form-file-multiple">
									<input type="file" multiple="" name="fotoa" class="inputFileHidden">
									<div class="input-group">
										<input type="text" class="form-control inputFileVisible" placeholder="Single File" />
										<span class="input-group-btn">
											<button type="button" class="btn btn-fab btn-round btn-primary">
												<i class="material-icons">attach_file</i>
											</button>
										</span>
									</div>
								</div>
								<div class="form-group">
									<input type="text" name="nik" class="form-control" placeholder="NIK">
								</div>
								<div class="form-group">
									<input type="text" name="nama" class="form-control" placeholder="Nama">
								</div>
								<div class="form-group">
									<input type="password" name="password" class="form-control" placeholder="Password">
								</div>
								<div class="form-group">
									<input type="text" name="telp" class="form-control" placeholder="Telp">
								</div>
								<div class="form-group">
									<input type="text" name="email" class="form-control" placeholder="Email" required>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-success">Submit</button>
							</div>
						</div>
					</div>
				</div>
			</form>
			<!--END Update Rakyat-->
			<!-- Modal Update Rakyat-->
			<form id="add-row-form" action="<?php echo site_url('admin/update'); ?>" method="post">
				<div class="modal fade" id="ModalUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title" id="myModalLabel">Update User</h4>
							</div>
							<div class="modal-body">
								<div class="form-group">
									<input type="text" name="nik" class="form-control" placeholder="NIK" readonly>
								</div>
								<div class="form-group">
									<input type="text" name="nama" class="form-control" placeholder="Nama">
								</div>
								<div class="form-group">
									<input type="text" name="telp" class="form-control" placeholder="Telp">
								</div>
								<div class="form-group">
									<input type="text" name="email" class="form-control" placeholder="EMail" required>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-success">Update</button>
							</div>
						</div>
					</div>
				</div>
			</form>
			<!--END Update Rakyat-->
			<!--MODAL HAPUS-->
			<form id="add-row-form" action="<?php echo site_url('admin/delete'); ?>" method="post">
				<div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title" id="myModalLabel">Delete User</h4>
							</div>
							<div class="modal-body">
								<input type="hidden" name="nik" class="form-control" required>
								<strong>Are you sure to delete this User?</strong>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
								<button type="submit" class="btn btn-success">Yes</button>
							</div>
						</div>
					</div>
				</div>
			</form>
			<!--END MODAL HAPUS-->

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



	<script src="<?php echo base_url() . 'assets/material/js/bootstrap.js' ?>"></script>
	<script src="<?php echo base_url() . 'assets/material/js/jquery.datatables.min.js' ?>"></script>




	<script>
		$(document).ready(function() {
			// Setup datatables
			var table = $("#mytable").dataTable({
				initComplete: function() {
					var api = this.api();
					$('#mytable_filter input')
						.off('.DT')
						.on('input.DT', function() {
							api.search(this.value).draw();
						});
				},

				ordering: false,
				paging: false,
				autoWidth: false,
				info: false,
				processing: true,
				serverSide: true,
				oLanguage: {
					sProcessing: "loading..."
				},
				ajax: {
					"url": "<?php echo site_url() . 'admin/get_rakyat_json' ?>",
					"type": "POST"
				},
				columns: [{
						"data": "nik"
					},
					{
						"data": "nama"
					},
					{
						"data": "telp"
					},
					{
						"data": "email"
					},
					{
						"data": "foto",
						"render": function(data) {

							return '<img src="<?php echo base_url('assets/img/profile/'); ?>' + data + '"style="height:100px;width:100px;" />';

						}
					},
					{
						"data": "view"
					}

				],



			});
			// end setup datatables
			// get Edit Records
			$('#mytable').on('click', '.edit_record', function() {
				var nik = $(this).data('nik');
				var nama = $(this).data('name');
				var telp = $(this).data('telp');
				var email = $(this).data('email');

				$('#ModalUpdate').modal('show');
				$('[name="nik"]').val(nik);
				$('[name="nama"]').val(nama);
				$('[name="telp"]').val(telp);
				$('[name="email"]').val(email);


			});


			// End Edit Records
			// get delete Records
			$('#mytable').on('click', '.delete_record', function() {
				var nik = $(this).data('nik');
				$('#ModalDelete').modal('show');
				$('[name="nik"]').val(nik);
			});
			// End delete Records

		});

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