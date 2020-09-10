<div class="sidebar" data-color="purple" data-background-color="white" data-image="<?= base_url() ?>assets/material/img/sidebar-1.jpg">
  <div class="logo"><a href="#" class="simple-text logo-normal">
      Dreamapps
    </a></div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item ">
        <a class="nav-link" href="<?= base_url('admin') ?>">
          <i class="material-icons">dashboard</i>
          <p>Dashboard</p>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="<?= base_url('admin/profile') ?>">
          <i class="material-icons">person</i>
          <p>User Profile</p>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="<?= base_url('admin/table') ?>">
          <i class="material-icons">groups</i>
          <p>User List</p>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="<?= base_url('admin/caselist') ?>">
          <i class="material-icons">library_books</i>
          <p>Case List</p>
        </a>
      </li>
      <?php if ($user['level'] == "admin") { ?>
        <li class="nav-item ">
          <a class="nav-link" href="<?= base_url('admin/caselist') ?>">
            <i class="material-icons">group_add</i>
            <p>Add Offcer</p>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="<?= base_url('admin/table_petugas') ?>">
            <i class="material-icons">group</i>
            <p>Offcer List</p>
          </a>
        </li>
      <?php } ?>
      <!-- <li class="nav-item active-pro ">
            <a class="nav-link" href="./upgrade.html">
              <i class="material-icons">unarchive</i>
              <p></p>
            </a>
          </li> -->
    </ul>
  </div>
</div>