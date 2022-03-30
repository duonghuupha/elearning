<?php
class Index extends Controller{
    function __construct(){
        parent::__construct();
    }

    function index(){
        Session::init();
        $logged = Session::get('MinhHue');
        if($logged == false){
            Session::destroy();
            header ('Location: '.URL.'/index/login');
            exit;
        }else{
            require('layouts/header.php');
            $this->view->render('index/index');
            require('layouts/footer.php');
        }
    }

    function login(){
        $truonghoc = $this->model->get_truonghoc();
        $this->view->truonghoc = $truonghoc;
        $this->view->render('index/login');
    }

    function do_login(){
        $username = base64_decode($_REQUEST['username']);
        $password = sha1(base64_decode($_REQUEST['password']));
        $is = $_REQUEST['is'];
        if($is == 0){
            $jsonObj['msg'] = "Hệ thống chưa hỗ trợ tài khoản ngoài";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $truonghocid = $_REQUEST['truonghocid'];
            if($this->model->check_login_s($username, $password, $truonghocid) > 0){
                Session::init();
                Session::set('MinhHue', true);
                $_SESSION['data'] = $this->model->get_data_s($username, $password, $truonghocid);
                $_SESSION['type'] = 1;
                $jsonObj['msg'] = "Đăng nhập thành công";
                $jsonObj['success'] = true;
                $this->view->jsonObj = json_encode($jsonObj);
            }else{
                $jsonObj['msg'] = "Thông tin đăng nhập không chính xác";
                $jsonObj['success'] = false;
                $this->view->jsonObj = json_encode($jsonObj);
            }
        }
        $this->view->render("index/do_login");
    }

    function logout(){
        session_start();
        session_destroy();
        header('Location: '.URL.'/index/login');
        exit;
    }

    function content(){
        $info = $_SESSION['data'];
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        if($info[0]['is_boss'] == 1){
            $jsonObj = $this->model->getFetObj($keyword, $info[0]['truonghoc_id'], $offset, $rows);
        }else{
            $jsonObj = $this->model->getFetObj_user($keyword, $info[0]['truonghoc_id'], $info[0]['id'], $offset, $rows);
        }
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render("index/content");
    }

    function detail(){
        require('layouts/header.php');

        $id = base64_decode($_REQUEST['id']);
        $jsonObj = $this->model->get_detail($id);
        $this->view->jsonObj = $jsonObj;

        $this->view->render('index/detail');
        require('layouts/footer.php');
    }
}
?>
