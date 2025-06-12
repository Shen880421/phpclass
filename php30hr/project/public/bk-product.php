<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../inc/twig.inc.php'; //載入twig 功能
require_once __DIR__ . '/../inc/db.inc.php'; //載入db 功能

//主要PHP程式區
//判斷後台是否有登入
if (isset($_SESSION['backend_login_flag']) && $_SESSION['backend_login_flag'] == true) {
    //如果有登入的話$_SESSION['backend_login_flag'] 為 true 
} else {
    header("location: login-v2.php?message=nologin");
}
//用來判斷要用什麼版型渲染的變數
$mode = "";
if (isset($_GET['mode']) && $_GET['mode'] != "") {
    $mode = $_GET['mode'];
}

switch ($mode) {
    case 'edit':
        $pid = $_GET['pid'];
        $stmt = $pdo->prepare("select * from products where id = :pid");
        $stmt->execute([":pid" => $pid]);
        $data['result'] = $stmt->fetch();
        $tmplFile = "partials/backend/product-edit.twig";
        break;
    case 'savedata':
        $stmt = $pdo->prepare("update products set name=:pname, price=:pprice, stock=:pstock, description=:pdesc where id=:pid");
        $stmt->execute(
            [
                ":pname" => $_POST['pname'],
                ":pprice" => $_POST['pprice'],
                ":pstock" => $_POST['pstock'],
                ":pdesc" => $_POST['pdesc'],
                ":pid" => $_POST['pid'],
            ]
        );
        $data["message"]="更新產品ID ".$_POST['pid']."，成功更改{$stmt->rowCount()}筆資料";
        $data["alert_type"]="alert-success";
        $tmplFile = "partials\backend\message.twig";
        break;
    default:
        $stmt = $pdo->prepare("select * from products limit 8");
        $stmt->execute();
        $data["results"] = [];
        while ($row = $stmt->fetch()) {
            $data["results"][] = $row;
        }
        $tmplFile = "partials/backend/product-list.twig";
        break;
}

//組合要傳給模版的資料陣列
$data['useracc'] = $_SESSION['backend_login_acc'];

//呼叫twig渲染html碼
echo $twig->render($tmplFile, $data);
