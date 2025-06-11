<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../inc/twig.inc.php';
require_once __DIR__ . '/../inc/db.inc.php';

//PHP
//判斷後台是否登入
if (isset($_SESSION['backend_login_flag']) && $_SESSION['backend_login_flag'] == true) {
    //如果有登入的話
} else {
    header("location:loginv2.php?message=nologin");
}

// 組合要傳給模板的資料陣列
$data['useracc'] = $_SESSION['backend_login_acc'];

echo $twig->render('dashboard.twig',$data);
