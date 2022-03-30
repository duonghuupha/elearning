<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Đăng nhập :: Hệ thống chia sẻ tài nguyên</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo URL.'/styles/login' ?>/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL.'/styles/login' ?>/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL.'/styles/login' ?>/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL.'/styles/login' ?>/css/colors.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL.'/styles/login' ?>/css/components.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL.'/styles/login' ?>/css/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL.'/styles/login' ?>/css/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL.'/styles/login' ?>/css/semi-dark-layout.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL.'/styles/login' ?>/css/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL.'/styles/login' ?>/css/form-validation.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL.'/styles/login' ?>/css/page-auth.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL.'/styles/login' ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo URL.'/styles/' ?>login/css/toastr.min.css"/>
    <script src="<?php echo URL.'/styles/' ?>login/js/jquery.min.js"></script>
    <link rel="shortcut icon" href="<?php echo URL.'/styles/' ?>img/logo1.png" type="image/x-icon"/>
    <script>
        var baseUrl = '<?php echo URL ?>';
    </script>
</head>
<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-v2">
                    <div class="auth-inner row m-0">
                        <a class="brand-logo" href="javascript:void(0);">
                            <h2 class="brand-text text-primary ml-1">PTSOFT</h2>
                        </a>
                        <div class="d-none d-lg-flex col-lg-7 align-items-center p-5">
                            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5">
                                <img class="img-fluid" src="<?php echo URL.'/styles/login' ?>/img/login-v2.svg" alt="Login V2" />
                            </div>
                        </div>
                        <div class="d-flex col-lg-5 align-items-center auth-bg px-2 p-lg-5">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                <h2 class="card-title font-weight-bold mb-1">Chào mừng đến với PTSOFT!</h2>
                                <form class="auth-login-form mt-2" method="POST" onsubmit="login()">
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" id="giao_vien" type="checkbox" onclick="change()"/>
                                            <label class="custom-control-label" for="giao_vien"> Sử dụng tài khoản giáo viên</label>
                                        </div>
                                    </div>
                                    <div class="form-group" id="school">
                                        <label class="form-label" for="login-email">Lựa chọn trường học</label>
                                        <select class="form-control" id="truonghoc_id">
                                            <?php
                                            foreach ($this->truonghoc as $row) {
                                            ?>
                                            <option value="<?php echo $row['id'] ?>"><?php echo $row['title'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="login-email" id="label_user">Email</label>
                                        <input class="form-control" id="username" type="text" name="username" aria-describedby="login-email" autofocus="" tabindex="1" />
                                    </div>
                                    <div class="form-group">
                                        <div class="d-flex justify-content-between">
                                            <label for="login-password">Mật khẩu</label>
                                            <a href="javascript:void(0)">
                                                <small>Quên mật khẩu?</small>
                                            </a>
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input class="form-control form-control-merge" id="password" type="password" name="password" aria-describedby="login-password" tabindex="2" />
                                            <div class="input-group-append">
                                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" id="remember-me" type="checkbox" tabindex="3" />
                                            <label class="custom-control-label" for="remember-me"> Ghi nhớ</label>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary btn-block" tabindex="4" onclick="login()">Đăng nhập</button>
                                </form>
                            </div>
                        </div>
                        <!-- /Login-->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo URL.'/styles/login' ?>/js/vendors.min.js"></script>
    <script src="<?php echo URL.'/styles/login' ?>/js/jquery.validate.min.js"></script>
    <script src="<?php echo URL.'/styles/login' ?>/js/app-menu.js"></script>
    <script src="<?php echo URL.'/styles/login' ?>/js/app.js"></script>
    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
    <script src="<?php echo URL.'/styles/' ?>login/js/toastr.min.js"></script>
    <script type="text/javascript" src="<?php echo URL.'/styles/login/' ?>js/script.js"></script>
</body>
</html>
