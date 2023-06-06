<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="http://localhost:1220/../plugins/images/uin-logo.png">
    <title>SPK-Pengadaan-Buku</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url('/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- animation CSS -->
    <link href="<?= base_url('/css/animate.css') ?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= base_url('/css/style.css') ?>" rel="stylesheet">
    <!-- color CSS -->
    <link href="<?= base_url('/css/colors/default.css') ?>" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <style>
        .new-login-register .lg-info-panel {
            background: url(http://localhost:1220/../plugins/images/login-register.jpg) center center/cover no-repeat !important;
            width: 500px;
            height: 100%;
            position: fixed;
        }
    </style>

</head>

<body>
    <section id="wrapper" class="new-login-register">
        <div class="lg-info-panel">
            <div class="inner-panel">
                <a href="javascript:void(0)" class="p-20 di"><img src="/../plugins/images/uin-logo.png"></a>
                <div class="lg-content">
                    <h2>SELAMAT DATANG DI SISTEM REKOMENDASI PENGADAAN BUKU PERPSUTAKAAN UIN SUSKA RIAU</h2>
                </div>
            </div>
        </div>
        <div class="new-login-box">
            <div class="white-box">
                <h3 class="box-title m-b-0">Sign In to Admin</h3>
                <small>Silahkan login</small>
                <form class="form-horizontal new-lg-form" id="loginform" action="login/auth_" method="POST">
                    <?php if (session()->getFlashdata('msg')) : ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                    <?php endif; ?>
                    <div class="form-group  m-t-20">
                        <div class="col-xs-12">
                            <label>Username</label>
                            <input class="form-control" type="text" required="" placeholder="Username" id="username" name="username">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <label>Password</label>
                            <input class="form-control" type="password" required="" placeholder="Password" id="password" name="password">
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </section>
    <!-- jQuery -->
    <script src="<?= base_url(); ?>/../plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url(); ?>/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="<?= base_url(); ?>/../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>

    <!--slimscroll JavaScript -->
    <script src="<?= base_url(); ?>/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?= base_url(); ?>/js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?= base_url(); ?>/js/custom.min.js"></script>
    <!--Style Switcher -->
    <script src="<?= base_url(); ?>/../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>