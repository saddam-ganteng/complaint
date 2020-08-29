<?php

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=$title.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>
<?php echo "tanggal : " . date('d-m-y'); ?>
<table class="table table-bordered" width="100%" cellspacing="0" border="1">
	<thead class="thead-dark">
		<tr class="text-center">
			<th>nik</th>
			<th>nama</th>
			<th>telp</th>
			<th>email</th>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach ($user as $u) : ?>
			<tr>
				<td><?= $u->nik ?></td>
				<td><?= $u->nama ?></td>
				<td><?= $u->telp ?></td>
				<td><?= $u->email ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>