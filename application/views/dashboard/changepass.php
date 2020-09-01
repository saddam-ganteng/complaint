<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>customcss/login.css">
    <title>Hello, world!</title>
</head>

<body>
    <div class="masthead darken-pseudo darken-with-text">
        <div class="container h-100 ">
            <div class="row h-100 align-items-center">
                <div class="col-6 offset-3">
                    <div id="formpass" class="container formpass bg-dark rounded p-5">
                        <form class="form-signin" action="<?= base_url('auth/login_rakyat') ?>" method="post">
                            <div class="form-label-group">
                                <input type="password" name="newpass1" id="newpass1" class="form-control" placeholder="Email" require>
                                <label for="newpass1">Password</label>
                                <?= form_error('newpass1', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-label-group">
                                <input type="password" name="newpass2" id="newpass2" class="form-control" placeholder="password" require>
                                <label for="newpass2">Password</label>
                                <span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password float-right"></span>
                                <?= form_error('newpass2', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <button class="btn btn-lg btn-block text-uppercase" type="submit" style="background-color: #9c27b0;">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <script>
        $(document).on('click', '.toggle-password', function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input1 = $("#newpass1");
            var input2 = $("#newpass2");
            input1.attr('type') === 'password' ? input1.attr('type', 'text') : input1.attr('type', 'password')
            input2.attr('type') === 'password' ? input2.attr('type', 'text') : input2.attr('type', 'password')
        });
    </script>
</body>

</html>