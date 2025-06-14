<?php
session_start();
require_once __DIR__ . '/../inc/db.inc.php';//載入db 功能
use Ecpay\Sdk\Factories\Factory;
use Ecpay\Sdk\Services\UrlService;

require_once __DIR__ . '/../vendor/autoload.php';

$factory = new Factory([
    'hashKey' => 'pwFHCqoQZGmho4w6',
    'hashIv'  => 'EkRm7iFT261dpevs',
]);
$autoSubmitFormService = $factory->create('AutoSubmitFormWithCmvService');
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.php?mode=lists");
    exit();
}
$oid = 'NNNN' . time();
//記算購物車總金額
    $cartItems = $_SESSION['cart']['items'] ?? [];
    $data['items'] = [];//要傳進去版型的變數
    $data["total"] = 0;//要傳進去版型的變數
    foreach ($cartItems as $pid => $val) {
        $stmt = $pdo->prepare("select * from products where id = ?");
        $stmt->execute([$pid]);//執行語法
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
//結束計算

$input = [
    'MerchantID'        => '3002607',
    'MerchantTradeNo'   => $oid,
    'MerchantTradeDate' => date('Y/m/d H:i:s'),
    'PaymentType'       => 'aio',
    'TotalAmount'       => $data["total"],
    'TradeDesc'         => UrlService::ecpayUrlEncode('產尖電商範例'),
    'ItemName'          => '3C商品',
    'ChoosePayment'     => 'Credit',
    'EncryptType'       => 1,

    // 請參考 example/Payment/GetCheckoutResponse.php 範例開發
    'ReturnURL'         => 'https://rnlpa-61-66-147-97.a.free.pinggy.link/php30hr/project/public/ecpay-return.php',
    'OrderResultURL'    => 'https://rnlpa-61-66-147-97.a.free.pinggy.link/php30hr/project/public/ecpay-return.php'
];
$action = 'https://payment-stage.ecpay.com.tw/Cashier/AioCheckOut/V5';


//寫入訂單主表
$odData = [
    "oid"        => $oid,
    "total"      => $data["total"],
    "pay_type"   => 'creditcard',
    "pay_status" => '等待支付',
    "ostatus"    => '處理中',
];
try{
    $stmt=$pdo->prepare("insert into orders (`oid`, `total`, `pay_type`, `pay_status`, `ostatus`) 
    values (:oid, :total, :pay_type, :pay_status, :ostatus)");
    $stmt->execute($odData);
} catch (PDOException $e) {
    echo $e->getMessage();
}

//結束寫入訂單主表
//寫入訂單明細表
foreach ($data['items'] as $item) {
    $odItemData = [
        "oid"      => $oid,
        "pid"      => $item['id'],
        "price"    => $item['price'],
        "amount"   => $item['quan'],
        "subtotal" => $item['subtotal'],
        "cname"    => $_POST["cname"] ?? "匿名",
        "cemail"   => $_POST["cemail"] ?? ""
    ];
    try{
        $stmt=$pdo->prepare("insert into orders_detail (`fk_oid`, `fk_pid`, `price`, `amount`, `subtotal`, `cname`, `cemail`) 
        values (:oid, :pid, :price, :quan, :subtotal, :cname, :cemail)");
        $stmt->bindParam(':oid', $odItemData['oid'], PDO::PARAM_STR);
        $stmt->bindParam(':pid', $odItemData['pid'], PDO::PARAM_INT);
        $stmt->bindParam(':price', $odItemData['price'], PDO::PARAM_INT);
        $stmt->bindParam(':quan', $odItemData['amount'], PDO::PARAM_INT);
        $stmt->bindParam(':subtotal', $odItemData['subtotal'], PDO::PARAM_INT);
        $stmt->bindParam(':cname', $odItemData['cname'], PDO::PARAM_STR);
        $stmt->bindParam(':cemail', $odItemData['cemail'], PDO::PARAM_STR);
        $stmt->execute();
        //$stmt->debugDumpParams();
    } catch (PDOException $e) {
        //$stmt->debugDumpParams();
        echo $e->getMessage();
    }
}
echo $autoSubmitFormService->generate($input, $action);