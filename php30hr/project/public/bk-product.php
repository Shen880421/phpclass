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
        $stmt = $pdo->prepare("update products set name=:pname, price=:pprice, stock=:pstock, description=:pdesc, cover=:pcover where id=:pid");
        $filepath = __DIR__ . "/uploads/";
        $filename = $filepath . time()."-".$_FILES['cover']['name'];
        $cover = move_uploaded_file($_FILES['cover']['tmp_name'], $filename );
        $cover = ($cover)? $_FILES['cover']['name']:'';
        $stmt->execute(
            [
                ":pname" => $_POST['pname'],
                ":pprice" => $_POST['pprice'],
                ":pstock" => $_POST['pstock'],
                ":pdesc" => $_POST['pdesc'],
                ":pcover" => $cover,
                ":pid" => $_POST['pid'],
            ]
        );
        $data["message"] = "更新產品ID " . $_POST['pid'] . "，成功更改{$stmt->rowCount()}筆資料";
        $data["alert_type"] = "alert-success";
        $tmplFile = "partials\backend\message.twig";
        break;
    case 'deldata':
        $stmt = $pdo->prepare("delete from products where id = :pid");
        $stmt->execute(
            [
                ":pid" => $_GET['pid'],
            ]
        );
        $data["message"] = "刪除產品ID " . $_GET['pid'] . "，成功刪除{$stmt->rowCount()}筆資料";
        $data["alert_type"] = "alert-success";
        $tmplFile = "partials\backend\message.twig";
        break;
    case 'add':
        $tmplFile = "partials/backend/product-add.twig";
        break;
    case 'adddata':
        try {
            $stmt = $pdo->prepare("insert into products (`name`, `price`, `stock`, `description`) values (:pname, :pprice, :pstock, :pdesc)");
            $stmt->execute(
                [
                    ":pname" => $_POST['pname'],
                    ":pprice" => $_POST['pprice'],
                    ":pstock" => $_POST['pstock'],
                    ":pdesc" => $_POST['pdesc'],
                ]
            );
            $data["message"] = "增加產品ID " . $pdo->lastInsertId() . "，成功增加{$stmt->rowCount()}筆資料";
            $data["alert_type"] = "alert-success";
        } catch (PDOException $e) {
            $data["message"] = $e->getMessage();
            $data["alert_type"] = "alert-warning";
        }
        $tmplFile = "partials\backend\message.twig";
        break;
    default:
        $sql = "select count(1) as cc from products ";
        $stmt = $pdo->query($sql);
        $result = $stmt->fetch();
        //分頁設定
        if (isset($_GET['page']) && $_GET['page'] != '') {
            $page = $_GET['page'];
        } else {
            $page = 0;
        }
        $rowsperpage = 10; //每頁幾筆資料
        $skip = $page * $rowsperpage; //跳過幾筆
        $total_pages = ceil($result['cc'] / $rowsperpage); //總頁數

        $stmt = $pdo->prepare("select * from products order by id desc limit :skip, :rowsperpage");
        $stmt->bindParam(":skip",  $skip, PDO::PARAM_INT);
        $stmt->bindParam("rowsperpage", $rowsperpage, PDO::PARAM_INT);
        $stmt->execute();
        $data['prevpage'] = ($page - 1 > 0) ? $page - 1: 0;
        $data['nextpage'] = $page + 1;
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
