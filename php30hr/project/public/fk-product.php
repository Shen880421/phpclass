<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1); //顯示錯誤訊息
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../inc/twig.inc.php'; //載入twig 功能
require_once __DIR__ . '/../inc/db.inc.php';//載入db 功能

//主要PHP程式區

//用來判斷要用什麼版型渲染的變數
$mode="";
if (isset($_GET['mode']) && $_GET['mode'] != ""){
    $mode = $_GET['mode'];
}

switch($mode){
    case 'lists':
        //顯示產品列表
        $sql = "select * from products order by id desc limit 0, 12; ";
        $stmt = $pdo->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $data['products'] = $result;
        debug_print($data, false, false);
        $tmplFile = "product_list.html.twig";
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
        //命名一個變數取得$_SESSION['cart']['items'] 方便使用
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
        
        debug_print($data, false, false);
        
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
        $tmplFile = "partials/backend/product-list.twig";
        break;
}

//組合要傳給模版的資料陣列
$data['useracc'] = $_SESSION['backend_login_acc'];

//呼叫twig渲染html碼
echo $twig->render($tmplFile, $data);