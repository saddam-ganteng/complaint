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
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header card-header-primary card-header-icon">
									<div class="card-icon">
										<i class="fa fa-user-circle"></i>
									</div>
									<p class="card-category">User</p>
									<h3 class="card-title">
										<?= $total_user; ?>
										<!-- <small>GB</small> -->
									</h3>
								</div>
								<div class="card-footer">
									<div class="stats">
										<i class="material-icons text-danger">warning</i>
										<a href="javascript:;">Get More Space...</a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header card-header-info card-header-icon">
									<div class="card-icon">
										<i class="fa fa-list"></i>
									</div>
									<p class="card-category">TOTAL CASE</p>
									<h3 class="card-title"><?= $total_kasus; ?></h3>
								</div>
								<div class="card-footer">
									<div class="stats">
										<i class="material-icons">date_range</i> Last 24 Hours
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header card-header-warning card-header-icon">
									<div class="card-icon">
										<i class="material-icons">update</i>
									</div>
									<p class="card-category">CASE IN PROSES</p>
									<h3 class="card-title"><?= $total_proses->status; ?></h3>
								</div>
								<div class="card-footer">
									<div class="stats">
										<i class="material-icons">local_offer</i> Tracked from Github
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header card-header-success card-header-icon">
									<div class="card-icon">
										<i class="fa fa-check-square"></i>
									</div>
									<p class="card-category">CASE COMPLETED</p>
									<h3 class="card-title"><?= $total_selesai->status; ?></h3>
								</div>
								<div class="card-footer">
									<div class="stats">
										<i class="material-icons">update</i> Just Updated
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- chart -->
					<div class="row">
						<div class="col-md-8">
							<div class="card card-chart">
								<div class="card-header card-header-success">
									<div class="bar-chart-container">
										<canvas id="myChart"></canvas>
									</div>
								</div>
								<div class="card-body">
									<h4 class="card-title">Daily Month</h4>
									<p class="card-category">
										Data Rakyat Membuat Laporan Per Bulan
									</p>
								</div>
								<div class="card-footer">
									<div class="stats">

									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- chart -->
					<div class="row">
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
		//START CHART JS
		$(function() {
			//get the bar chart canvas
			var cData = JSON.parse(`<?php echo $chart_data; ?>`);
			var ctx = $("#myChart");
			//bar chart data
			var data = {
				labels: cData.label,
				datasets: [{
					label: 'Rakyat Membuat Laporan ',
					data: cData.data,
					borderColor: '#93C3D2',
				}]
			};

			//create bar Chart class object
			var chart1 = new Chart(ctx, {
				type: "line",
				data: data,
				options: {
					legend: {
						display: false,
					},
					scales: {
						xAxes: [{
							stacked: true
						}],
						yAxes: [{
							stacked: true,
							beginAtZero: true
						}]
					}
				}
			});
		});
		//END CHART JS
	</script>
	<script>

	</script>
</body>

</html>