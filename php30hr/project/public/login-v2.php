<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../inc/twig.inc.php'; //載入twig 功能
require_once __DIR__ . '/../inc/db.inc.php';//載入db 功能

// ... 接下來是 PHP 處理邏輯 ...
$message = "";
$alert_type = "";
if(isset($_GET['message']) &&  $_GET['message']!="") {
    switch($_GET['message']){
        case 'nologin':
            $message .= "進入後台需登入";
            $alert_type = "alert-warning";
            break;
        default:
            $message .= "";
            $alert_type = "alert-success";
            break;
    }
}
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    //如果這個頁面的呼叫方式是使用http post 的話
    //var_dump($_POST);
    $acc = $_POST["account"];
    $pwd = $_POST["passwd"];
    
    if (filter_var($acc, FILTER_VALIDATE_EMAIL)) {
        //echo "合法 Email";
        $stmt = $pdo->prepare("select acc, pwd from admin_users where acc = :acc and pwd = :pwd");
        $result = $stmt->execute([
            ":acc" => $acc,
            ":pwd" => md5($pwd) //md5 加密使用者輸入的密碼後與資料表中的資料進行比對
        ]);
        //die("test");
        if ($stmt->rowCount() == 1) {
            // $message .= "登入成功";
            // $alert_type = "alert-success";
            $_SESSION['backend_login_flag'] = true;
            $_SESSION['backend_login_acc'] = $acc;
            header("location: dashboard.php");
        } else {
            $message = "登入失敗";
            $alert_type = "alert-danger";
        }
        // if ( $acc == "admin@demo.com" &&  $pwd == "test1234"){
        //     $message = "登入成功";
        // } 
    } else {
        $message = "帳號電郵格式錯誤";
        $alert_type = "alert-warning";
    }


}

//echo $twig->render('demo.html.twig',["demo"=>"下課了"]);
echo $twig->render('login.twig', 
    [
        "title"=>"後台登入表單",
        "message"=> $message,
        "alert_type" => $alert_type
    ]
);
?>