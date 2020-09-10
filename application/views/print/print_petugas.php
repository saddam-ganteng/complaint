<?php

// header("Content-type: application/octet-stream");

// header("Content-Disposition: attachment; filename=$title.xls");

// header("Pragma: no-cache");

// header("Expires: 0");

?>
<?php echo "Date : " . date('d-m-y'); ?>
<table width="100%" cellspacing="0" border="1" cellpadding="10">
    <thead>
        <tr style="text-align: center;">
            <th>Officer ID</th>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Photo</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($user as $u) : ?>
            <tr>
                <td><?= $u->id_petugas ?></td>
                <td><?= $u->nama ?></td>
                <td><?= $u->telp ?></td>
                <td><?= $u->email ?></td>
                <td height="110">
                    <center> <img src="<?= base_url('assets/img/profile/') . $u->foto ?>" alt="foto ini abis" height="100"></center>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>