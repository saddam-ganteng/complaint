<nav class="navbar navbar-expand navbar-dark sticky-top shadow-lg"> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
    <div class="container">
        <div class="collapse navbar-collapse " id="navbarsExample02">
            <ul class="navbar-nav mr-auto">
                <a class="navbar-brand pl-4 text-dark">Dreamapps</a>
            </ul>
            <div class="dropdown text-dark">
                <a class="nav-link dropdown-toggle text-light text-dark" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="<?= base_url('assets/img/profile/') . $user['foto'] ?>"" width=" 40" height="40" class="rounded-circle mr-3"> <?= $user['nama'] ?>
                </a>

                <div class="dropdown-menu dropdown-menu-center" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item text-dark" href="#">My Profile</a>
                    <hr>
                    <a class="dropdown-item text-dark" href="<?= base_url('rakyat') ?>">Dashboard</a>
                    <a class="dropdown-item text-dark" href="<?= base_url('rakyat/my_case') ?>">My Case</a>
                    <hr>
                    <a class="dropdown-item text-dark" href="<?= base_url('auth/logout') ?>">Log Out</a>
                </div>
            </div>
        </div>
    </div>
</nav>