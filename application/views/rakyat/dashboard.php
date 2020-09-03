<body id="body" style="height:2000px;">
    <div class="container h-25 ">
        <div class="row h-100 align-items-center">
            <div class="col-6 offset-3 text-center ">
                <?= $this->session->flashdata('message'); ?>
                <h3 class="text-light">
                    Aspirations and Complaints Online Service</h3>
            </div>
        </div>
    </div>
    <div class="container mt-5 ">
        <!-- <div class="row">
            <div class="col-1 bg-primary">
                <p>1</p>
            </div>
            <div class="col-1 bg-primary">
                <p>1</p>
            </div>
            <div class="col-1 bg-primary">
                <p>1</p>
            </div>
            <div class="col-1 bg-primary">
                <p>1</p>
            </div>
            <div class="col-1 bg-primary">
                <p>1</p>
            </div>
            <div class="col-1 bg-primary">
                <p>1</p>
            </div>
            <div class="col-1 bg-primary">
                <p>1</p>
            </div>
            <div class="col-1 bg-primary">
                <p>1</p>
            </div>
            <div class="col-1 bg-primary">
                <p>1</p>
            </div>
            <div class="col-1 bg-primary">
                <p>1</p>
            </div>
            <div class="col-1 bg-primary">
                <p>1</p>
            </div>
            <div class="col-1 bg-primary">
                <p>1</p>
            </div>
        </div> -->
        <div class="row">
            <div class="col-8 offset-2 bg-light shadow-lg">
                <p class="p-2"><i class="fa fa-info-circle mr-2"></i>Be responsible for what you report</p>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2 bg-light p-3 shadow-lg">
                <nav class="nav-justified ">
                    <div class="nav nav-tabs " id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active text-dark" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Complaint</a>
                        <a class="nav-item nav-link text-dark" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Aspirations</a>
                        <a class="nav-item nav-link text-dark disabled" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Coming soon</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <form action="<?= base_url('rakyat/insertreport'); ?>" enctype="multipart/form-data" method="POST">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="titlecom" placeholder="type your title*">
                                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>  style="background-color: blueviolet;" -->
                            </div>
                            <div class="form-group">
                                <label for="contentcom">Contents of the report</label>
                                <textarea class="form-control" name="contentcom" id="contentcom" rows="5" placeholder="type the contents of your report*" style="resize: none;"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="towncom">Home town</label>
                                <input type="text" class="form-control" id="towncom" name="towncom" placeholder="type your home town*">
                                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                            </div>
                            <div class="form-group">
                                <label for="cate">Category</label>
                                <select name="catecom" class="custom-select">
                                    <option hidden selected>Open this select Category</option>
                                    <option value="health">Health</option>
                                    <option value="education">Education</option>
                                    <option value="tourism">Tourism</option>
                                    <option value="electricity">Electricity</option>
                                    <option value="security">Security</option>
                                </select>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="file">File attachment</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="fotocom" name="fotocom">
                                            <label class="custom-file-label" for="fotocom">Choose file</label>
                                            <small id="fotocom" class="form-text text-muted">Jika Ada, jika tidak ada tidak usah</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary float-right mt-5">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <form>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="type your title*">
                                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>  style="background-color: blueviolet;" -->
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Contents of the report</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="type the contents of your report*" style="resize: none;"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="town">Home town</label>
                                <input type="text" class="form-control" id="town" name="town" placeholder="type your home town*">
                                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                            </div>
                            <div class="form-group">
                                <label for="cate">Category</label>
                                <select class="custom-select">
                                    <option hidden selected>Open this select Category</option>
                                    <option value="health">Health</option>
                                    <option value="education">Education</option>
                                    <option value="tourism">Tourism</option>
                                    <option value="electricity">Electricity</option>
                                    <option value="security">Security</option>
                                </select>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="file">File attachment</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="file">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                            <small id="emailHelp" class="form-text text-muted">Jika Ada, jika tidak ada tidak usah</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary float-right mt-5">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>






    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $(window).scroll(function() {
                var scroll = $(window).scrollTop();
                //>=, not <=
                if (scroll > 490) {
                    //clearHeader, not clearheader - caps H
                    $(".navbar").css('background', 'white');
                    $(".navbar").addClass('shadow-lg')
                } else {
                    $(".navbar").css('background', 'transparent');
                }
            }); //missing );

            $('.custom-file-input').on('change', function() {
                let fileName = $(this).val().split('\\').pop();
                $(this).next('.custom-file-label').addClass("selected").html(fileName);
            });

            $('#datepicker').datepicker({
                uiLibrary: 'bootstrap4'
            });
        });
    </script>
</body>

</html>