<!-- modal logout -->
<div class="modal fade" id="modalogout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Logout</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Are you sure to Logout?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<a class="btn btn-primary" href="<?= site_url('auth/logout') ?>">Logout</a>
			</div>
		</div>
	</div>
</div>

<footer class="footer">
	<div class="container-fluid">
		<div class="copyright float-right">
			&copy;
			<script>
				document.write(new Date().getFullYear())
			</script>, made with by dmare
		</div>
	</div>
</footer>