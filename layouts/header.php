<?php
$info = $_SESSION['data'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Hệ thống tài nguyên dùng chung</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link href="<?php echo URL.'/styles/' ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo URL.'/styles/' ?>css/mdb.min.css" rel="stylesheet">
    <link href="<?php echo URL.'/styles/' ?>css/style.min.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo URL.'/styles/' ?>js/jquery-3.4.1.min.js"></script>
    <link rel="shortcut icon" href="<?php echo URL.'/styles/' ?>img/logo1.png" type="image/x-icon"/>
    <script>
    var baseUrl = '<?php echo URL ?>';
    </script>
</head>
<body class="grey lighten-3">
    <header>
        <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
            <div class="container-fluid">
                <a class="navbar-brand waves-effect" href="<?php echo URL ?>">
                    <strong class="blue-text">EDU</strong>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link waves-effect" href="<?php echo URL ?>">Tài nguyên</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="http://quanly.edu.vn" target="_blank">Quản lý giáo dục</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="#">Giới thiệu</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav nav-flex-icons">
                        <li class="nav-item">
                            <a href="javascript:void(0)" class="nav-link border border-light rounded waves-effect">
                                <i class="fab fa-github-alt mr-2"></i><?php echo $info[0]['fullname'] ?>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="sidebar-fixed position-fixed">
            <a class="logo-wrapper waves-effect">
                <img src="<?php echo URL.'/styles/img/logo_c.png' ?>" class="img-fluid" alt="">
            </a>
            <div class="list-group list-group-flush">
                <a href="<?php echo URL ?>" class="list-group-item active waves-effect">
                    <i class="fas fa-chart-pie mr-3"></i>Bảng điều khiển
                </a>
                <?php
                if($_SESSION['type'] == 0){
                ?>
                <a href="javascript:void(0)" class="list-group-item list-group-item-action waves-effect">
                    <i class="fab fa-dropbox mr-3"></i>Học bài
                </a>
                <a href="javascript:void(0)" class="list-group-item list-group-item-action waves-effect">
                    <i class="fab fa-laravel mr-3"></i>Kiểm tra
                </a>
                <a href="javascript:void(0)" class="list-group-item list-group-item-action waves-effect">
                    <i class="fab fa-readme mr-3"></i>Kết quả học tập
                </a>
                <a href="javascript:void(0)" class="list-group-item list-group-item-action waves-effect">
                    <i class="fas fa-user mr-3"></i>Tài khoản
                </a>
                <?php
                }else{
                ?>
                <a href="javascript:void(0)" class="list-group-item list-group-item-action waves-effect"
                onclick="window.location.href='<?php echo URL.'/index/logout' ?>'">
                    <i class="fas fa-power-off mr-3"></i>Đăng xuất
                </a>
                <?php
                }
                ?>
            </div>
        </div>
    </header>
