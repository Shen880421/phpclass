<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1); //顯示錯誤訊息
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../inc/twig.inc.php'; //載入twig 功能
require_once __DIR__ . '/../inc/db.inc.php';//載入db 功能

//主要PHP程式區
//判斷後台是否有登入
if (isset($_SESSION['backend_login_flag']) && $_SESSION['backend_login_flag'] == true) {
    //如果有登入的話$_SESSION['backend_login_flag'] 為 true 
} else {
    header("location: login-v2.php?message=nologin");
}
//用來判斷要用什麼版型渲染的變數
$mode="";
if (isset($_GET['mode']) && $_GET['mode'] != ""){
    $mode = $_GET['mode'];
}

function viewcart($pdo) {
    $cartItems = $_SESSION['cart']['items'] ?? [];
    $data['items'] = [];//要傳進去版型的變數
    $data["total"] = 0;//要傳進去版型的變數
    foreach ($cartItems as $pid => $val) {
        //$pid 會取得購物車中存放的pid 內容 , $val 則是映射到 數量
        $stmt = $pdo->prepare("select * from products where id = ?");
        $stmt->execute([$pid]);//執行語法
        //方法一, 只回傳資料表欄位
        //$data['items'][] = $stmt->fetch(); // 取得資料集
        //方法2: 客制化回傳的資料集
        $result = $stmt->fetch();
        $data['items'][] = [
            "id"       => $pid,
            "price"    => $result['price'],
            "name"     => $result['name'],
            "cover"    => $result['cover'],
            "quan"     => $val,
            "subtotal" => $result['price'] * $val
        ];
        $data["total"] += $result['price'] * $val;//計算購物車總金額
    }
    return $data;
}
function productListDefault($pdo){
    $sql = "select count(*) as cc from products ";
    $stmt = $pdo->query($sql);
    $result = $stmt->fetch();
    //分頁設定
    if(isset($_GET['page']) && $_GET['page'] !=''){
        $page = $_GET['page'];
    } else {
        $page = 0;
    }
    //$page = 2;
    $rows_per_page = 8;//每頁幾筆資料
    $skip = $page * $rows_per_page; //跳過幾筆
    $total_pages = ceil($result['cc'] / $rows_per_page);//總頁數
    $stmt = $pdo->prepare("select * from products order by id desc limit :skip, :rowsperpage");
    $stmt->bindParam(':skip', $skip, PDO::PARAM_INT);
    $stmt->bindParam(':rowsperpage', $rows_per_page, PDO::PARAM_INT);
    //$stmt->execute([":skip"=>$skip, ":rowsperpage"=>$rows_per_page]);
    $stmt->execute();
    $data['prevpage'] = ($page - 1 > 0) ? $page - 1: 0;
    $data['nextpage'] = $page + 1;
    //方法1
    $data["results"] = [];
    // while($row = $stmt->fetch()){
    //     $data["results"][] = $row;
    // }
    //方法2

    $rowCount = $stmt->rowCount();
    for ($i = 0 ; $i<$rowCount ; $i++){
        $row = $stmt->fetch();
        $data["results"][$i] = $row;
    }

    //取得購物車內容
    //命名一個變數取得$_SESSION['cart']['items'] 方便使用
    $cartItems = $_SESSION['cart']['items'] ?? [];
    $data['items'] = [];//要傳進去版型的變數
    $data["total"] = 0;//要傳進去版型的變數
    //var_dump($cartItems);
    if(count($cartItems)> 0 ){
        foreach ($cartItems as $pid => $val) {
            //$pid 會取得購物車中存放的pid 內容 , $val 則是映射到 數量
            $stmt = $pdo->prepare("select * from products where id = ?");
            $stmt->execute([$pid]);//執行語法
            //方法一, 只回傳資料表欄位
            //$data['items'][] = $stmt->fetch(); // 取得資料集
            //方法2: 客制化回傳的資料集
            $result = $stmt->fetch();
            
            $data['items'][] = [
                "id"       => $pid,
                "price"    => $result['price'],
                "name"     => $result['name'],
                "cover"    => $result['cover'],
                "quan"     => $val,
                "subtotal" => $result['price'] * $val
            ];
            $data["total"] += $result['price'] * $val;//計算購物車總金額
        }
    }
    return $data;
}
switch($mode){
    case 'add':
        $tmplFile = "partials/backend/product-add.twig";
        break;
    case 'insertdata':
        try{
            $stmt = $pdo->prepare("insert into products (`name`, `price`, `stock`, `description`) 
            values (:pname, :pprice, :pstock , :pdesc)");
            $stmt->execute(
                [
                    ":pname"  => $_POST['pname'],
                    ":pprice" => $_POST['pprice'],
                    ":pstock" => $_POST['pstock'],
                    ":pdesc"  => $_POST['pdesc']
                    ]
            );

            $data["message"] = "新增產品 ID " . $pdo->lastInsertId() . " 的資訊成功！影響了 " . $stmt->rowCount() . " 行。<br>";
            $data["alert_type"] = "alert-success";
        } catch (PDOException $e){
            $data["message"] = $e->getMessage();
            $data["alert_type"] = "alert-waring";
        }
        
        $tmplFile = "partials/backend/message.twig";
        break;
    case 'edit':
        $pid = $_GET['pid'];
        $stmt = $pdo->prepare("select * from products where id = :pid");//:
        $stmt->execute([":pid"=>$pid]);
        $data['result'] = $stmt->fetch();
        $tmplFile = "partials/backend/product-edit.twig";
        break;
    case 'savedata':
        //die(var_dump($_POST));
        $stmt = $pdo->prepare("update products set name = :pname, price = :pprice, 
        stock = :pstock , description = :pdesc, cover = :pcover where id = :pid");
        //上傳檔案的目的地 構成 主要是伺服器中提供給網頁伺服器上傳檔案的資料夾位置.
        $filepath = __DIR__ . "/uploads/";
        //$filename = $filepath . $_FILES['cover']['name'];
        $dstfilename = time()."-".$_FILES['cover']['name'];
        $filename = $filepath . $dstfilename;//簡單處理檔名重覆情況
        $cover = move_uploaded_file($_FILES['cover']['tmp_name'], $filename );
        //die("cover:". $cover);
        $cover = ($cover)? $dstfilename:'';
        $stmt->execute(
            [
                ":pname"  => $_POST['pname'],
                ":pprice" => $_POST['pprice'],
                ":pstock" => $_POST['pstock'],
                ":pdesc"  => $_POST['pdesc'],
                ":pcover" => $cover,
                ":pid"    => $_POST['pid'],
                ]
        );
        
        //echo "更新產品 ID " . $_POST['pid'] . " 的資訊成功！影響了 " . $stmt->rowCount() . " 行。<br>";
        //die();
        $data["message"] = "更新產品 ID " . $_POST['pid'] . " 的資訊成功！影響了 " . $stmt->rowCount() . " 行。<br>";
        $data["alert_type"] = "alert-success";
        $tmplFile = "partials/backend/message.twig";
        break;
    case 'deldata':
        $stmt = $pdo->prepare("delete from products where id = :pid");
        $stmt->execute(
            [":pid"    => $_GET['pid']]
        );
        $data["message"] = "已刪除產品 ID " . $_GET['pid'] . " 的資訊 ";
        $data["alert_type"] = "alert-success";
        $tmplFile = "partials/backend/message.twig";
        break;
    case 'additem':
        $pid = $_GET['pid']; 
        $quan = $_GET['quan'];
        echo "<script>console.log(" . json_encode($_SESSION) . ");</script>";
        $_SESSION['cart']['items'][$pid] += $quan;
        $data = viewcart($pdo);
        $tmplFile = "partials/backend/cart-view.twig";
        break;
    case 'additem2':
        $pid = $_GET['pid']; 
        $quan = $_GET['quan'];
        echo "<script>console.log(" . json_encode($_SESSION) . ");</script>";
        $_SESSION['cart']['items'][$pid] += $quan;
        $data = productListDefault($pdo);
        $tmplFile = "partials/backend/product-list.twig";
        break;
    case 'reduceitem':
        $pid = $_GET['pid']; 
        $quan = $_GET['quan'];
        echo "<script>console.log(" . json_encode($_SESSION) . ");</script>";
        $_SESSION['cart']['items'][$pid] -= $quan;
        $data = viewcart($pdo);
        $tmplFile = "partials/backend/cart-view.twig";
        break;
    case 'reduceitem2':
        $pid = $_GET['pid']; 
        $quan = $_GET['quan'];
        echo "<script>console.log(" . json_encode($_SESSION) . ");</script>";
        $_SESSION['cart']['items'][$pid] -= $quan;
        $data = productListDefault($pdo);
        $tmplFile = "partials/backend/product-list.twig";
        break;
    case 'add2cart':
        //處理放到session
        if(!isset($_SESSION['cart'])){
            //如果cart session 沒有被初始化過的話
            $_SESSION['cart']=[];
        }
        $pid = $_GET['pid']; 
        $quan = $_GET['quan'];
        if (!isset($_SESSION['cart']['items'][$pid])) {
            //如果指定品項還未放到購物車中, 則設定數量
            $_SESSION['cart']['items'][$pid] = $quan;
        } else {
            //如果指定品項還已放到購物車中, 則數量增加
            $_SESSION['cart']['items'][$pid] += $quan;
        }

        header("content-type: application/json");
        echo json_encode([
            "status"  => 'success',
            "message" => "產品已放入購物車",
            "pid"     => $_GET['pid'],
            "quan"    => $_GET['quan'],
            "cart"    => $_SESSION['cart']
        ]);
        exit();
        break;
    case 'removeitem':
        $pid = $_GET['pid']; 
        unset($_SESSION['cart']['items'][$pid]);
        $data["message"] = "該品項已移除";
        $data["alert_type"] = "alert-info";
        $tmplFile = "partials/backend/message.twig";
        break;
    case 'viewcart':
        $data = viewcart($pdo);
        // //命名一個變數取得$_SESSION['cart']['items'] 方便使用
        // $cartItems = $_SESSION['cart']['items'] ?? [];
        // $data['items'] = [];//要傳進去版型的變數
        // $data["total"] = 0;//要傳進去版型的變數
        // foreach ($cartItems as $pid => $val) {
        //     //$pid 會取得購物車中存放的pid 內容 , $val 則是映射到 數量
        //     $stmt = $pdo->prepare("select * from products where id = ?");
        //     $stmt->execute([$pid]);//執行語法
        //     //方法一, 只回傳資料表欄位
        //     //$data['items'][] = $stmt->fetch(); // 取得資料集
        //     //方法2: 客制化回傳的資料集
        //     $result = $stmt->fetch();
        //     $data['items'][] = [
        //         "id"       => $pid,
        //         "price"    => $result['price'],
        //         "name"     => $result['name'],
        //         "cover"    => $result['cover'],
        //         "quan"     => $val,
        //         "subtotal" => $result['price'] * $val
        //     ];
        //     $data["total"] += $result['price'] * $val;//計算購物車總金額
        // }
        
        // debug_print($data, false, false);
        
        $tmplFile = "partials/cart-view.twig";
        break;
    case 'clearcart':
        unset($_SESSION['cart']);
        $data["message"] = "購物車已清空";
        $data["alert_type"] = "alert-info";
        $tmplFile = "partials/backend/message.twig";
        break;
    case 'apiGetCart':
        //命名一個變數取得$_SESSION['cart']['items'] 方便使用
        $cartItems = $_SESSION['cart']['items'] ?? [];
        $data['items'] = [];//要傳進去版型的變數
        $data["total"] = 0;//要傳進去版型的變數
        foreach ($cartItems as $pid => $val) {
            //$pid 會取得購物車中存放的pid 內容 , $val 則是映射到 數量
            $stmt = $pdo->prepare("select * from products where id = ?");
            $stmt->execute([$pid]);//執行語法
            //方法2: 客制化回傳的資料集
            $result = $stmt->fetch();
            $data['items'][] = [
                "id"       => $pid,
                "price"    => $result['price'],
                "name"     => $result['name'],
                "cover"    => $result['cover'],
                "quan"     => $val,
                "subtotal" => $result['price'] * $val
            ];
            $data["total"] += $result['price'] * $val;//計算購物車總金額
        }
        
        //$tmplFile = "partials/cart-live.twig";
        //echo $twig->render($tmplFile, $data);
        header("content-type: application/json");
        echo json_encode($data);
        exit();

        break;
    default:
        $data = productListDefault($pdo);
        // $sql = "select count(*) as cc from products ";
        // $stmt = $pdo->query($sql);
        // $result = $stmt->fetch();
        // //分頁設定
        // if(isset($_GET['page']) && $_GET['page'] !=''){
        //     $page = $_GET['page'];
        // } else {
        //     $page = 0;
        // }
        // //$page = 2;
        // $rows_per_page = 8;//每頁幾筆資料
        // $skip = $page * $rows_per_page; //跳過幾筆
        // $total_pages = ceil($result['cc'] / $rows_per_page);//總頁數
        // $stmt = $pdo->prepare("select * from products order by id desc limit :skip, :rowsperpage");
        // $stmt->bindParam(':skip', $skip, PDO::PARAM_INT);
        // $stmt->bindParam(':rowsperpage', $rows_per_page, PDO::PARAM_INT);
        // //$stmt->execute([":skip"=>$skip, ":rowsperpage"=>$rows_per_page]);
        // $stmt->execute();
        // $data['prevpage'] = ($page - 1 > 0) ? $page - 1: 0;
        // $data['nextpage'] = $page + 1;
        // //方法1
        // $data["results"] = [];
        // // while($row = $stmt->fetch()){
        // //     $data["results"][] = $row;
        // // }
        // //方法2

        // $rowCount = $stmt->rowCount();
        // for ($i = 0 ; $i<$rowCount ; $i++){
        //     $row = $stmt->fetch();
        //     $data["results"][$i] = $row;
        // }

        // //取得購物車內容
        // //命名一個變數取得$_SESSION['cart']['items'] 方便使用
        // $cartItems = $_SESSION['cart']['items'] ?? [];
        // $data['items'] = [];//要傳進去版型的變數
        // $data["total"] = 0;//要傳進去版型的變數
        // //var_dump($cartItems);
        // if(count($cartItems)> 0 ){
        //     foreach ($cartItems as $pid => $val) {
        //         //$pid 會取得購物車中存放的pid 內容 , $val 則是映射到 數量
        //         $stmt = $pdo->prepare("select * from products where id = ?");
        //         $stmt->execute([$pid]);//執行語法
        //         //方法一, 只回傳資料表欄位
        //         //$data['items'][] = $stmt->fetch(); // 取得資料集
        //         //方法2: 客制化回傳的資料集
        //         $result = $stmt->fetch();
                
        //         $data['items'][] = [
        //             "id"       => $pid,
        //             "price"    => $result['price'],
        //             "name"     => $result['name'],
        //             "cover"    => $result['cover'],
        //             "quan"     => $val,
        //             "subtotal" => $result['price'] * $val
        //         ];
        //         $data["total"] += $result['price'] * $val;//計算購物車總金額
        //     }
        // }
        $tmplFile = "partials/backend/product-list.twig";
        break;
}

//組合要傳給模版的資料陣列
$data['useracc'] = $_SESSION['backend_login_acc'];

//呼叫twig渲染html碼
echo $twig->render($tmplFile, $data);