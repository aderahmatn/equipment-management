<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Ching Luh - Equipment Management of Maintenance Machine</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/img/theme/favicon-chingluh.png">
    <!-- Template CSS  -->
    <link rel="stylesheet" href="<?= base_url() . 'assets/css/style-login.css' ?>">
    <link rel="stylesheet" href="<?= base_url() . 'assets/css/style-3-login.css' ?>">
    <!-- Sweetalert -->
    <link rel="stylesheet" href="<?= base_url() . 'assets/plugins/sweetalert2/dark.css' ?>">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?= base_url() . 'assets/plugins/toastr/toastr.min.css' ?>">
</head>

<body>
    <!-- Preloader -->
    <div class="preloader text-center">
        <div class="loader"></div>
    </div>
    <header class="main-header ">
        <div class="container text-center">
            <a href="" class="logo">
                <img src="<?= base_url() . 'assets/img/theme/logo-chingluh.png' ?>" alt="UltraForm">
            </a>
        </div>
    </header>
    <main class="position-relative">
        <div class="container">
            <div class="form-cover form-cover-login">
                <div class="card">
                    <div class="card-heading login d-lg-table-cell d-none">
                        <h3 class="text-white">Welcome back!</h3>
                        <span>Please enter your account details and login to access your dashboard page.</span>
                    </div>
                    <div class="card-body p-80">
                        <div class="form-group form-alert-success">
                            <span>You are done. Thanks.</span>
                        </div>
                        <div class="mb-50">
                            <h1>Login Account</h1>
                        </div>
                        <form method="POST" action="<?= base_url('auth/process_login') ?>">
                            <div class="form-group">
                                <div class="form-file-with-icon field-required">
                                    <input class="form-control not-empty" name="nik" id="nik" type="text" placeholder="Enter your NIK" autocomplete="off">
                                    <i class="far fa-user"></i>
                                    <div class="form-validate-icons">
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group uf-password">
                                <div class="form-file-with-icon field-required">
                                    <input class="form-control not-empty" name="password" id="password" type="password" placeholder="Enter your Password" autocomplete="off">
                                    <i class="far fa-lock"></i>
                                    <div class="form-validate-icons">
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group uf-captcha form-group-captchar">
                                <div class="form-file-with-icon field-required">
                                    <input type="text" class="form-control not-empty" name="uf-captcha" id="txtInput" placeholder="Security code" autocomplete="off">
                                    <span id="txtCaptchaSpan"></span>
                                    <input type="hidden" id="txtCaptcha">
                                    <div class="form-validate-icons">
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-bottom">
                                    <div>
                                        <p class="mb-0 font-md">
                                            <a href="#">Forgot password?</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn text-white" type="submit" id="btn-submit" disabled>Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="text-center pt-50 pb-50 mt-50 font-md">
        <div class="container">
            <span>Copyright © 2021 Equipment Management - Powered by <a href="www.gisaka.net">Gisaka</a> Designed by <a href="https://www.spruko.com/">Spruko</a>. All rights reserved.</span>
        </div>
    </footer>
    <!-- Vendor JS-->
    <script src="<?= base_url() . 'assets/js/vendor/modernizr-3.5.0.min.js' ?>"></script>
    <script src="<?= base_url() . 'assets/js/vendor/jquery-3.5.1.min.js' ?>"></script>
    <script src="<?= base_url() . 'assets/js/vendor/bootstrap.bundle.min.js' ?>"></script>
    <script src="<?= base_url() . 'assets/js/vendor/moment.min.js' ?>"></script>
    <script src="<?= base_url() . 'assets/js/vendor/daterangepicker.js' ?>"></script>
    <script src="<?= base_url() . 'assets/js/vendor/custom.select.plugin.js' ?>"></script>
    <!-- Template  JS -->
    <script src="<?= base_url() . 'assets/js/main.js' ?>"></script>
    <script src="<?= base_url() . 'assets/js/ultraform.validator.js' ?>"></script>

    <!-- Sweetalert -->
    <script src="<?= base_url() . 'assets/plugins/sweetalert2/sweetalert2.min.js' ?>"></script>
    <!-- Toastr -->
    <script src="<?= base_url() . 'assets/plugins/toastr/toastr.min.js' ?>"></script>
</body>

</html>
<script type="text/javascript">
    $(function() {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000
        });
        <?php if ($this->session->flashdata('success')) { ?>
            Toast.fire({
                icon: 'success',
                title: '<?= $this->session->flashdata('success'); ?>'
            });
        <?php } else if ($this->session->flashdata('error')) {  ?>
            Toast.fire({
                icon: 'error',
                title: '<?= $this->session->flashdata('error'); ?>'
            });
        <?php } else if ($this->session->flashdata('warning')) {  ?>
            Toast.fire({
                icon: 'warning',
                title: '<?= $this->session->flashdata('warning'); ?>'
            });
        <?php } else if ($this->session->flashdata('info')) {  ?>
            Toast.fire({
                icon: 'info',
                title: '<?= $this->session->flashdata('info'); ?>'
            });
        <?php } ?>
    });
</script>