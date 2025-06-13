<?php
session_start();
require_once __DIR__ . '/../inc/db.inc.php'; //載入db 功能
use Ecpay\Sdk\Factories\Factory;
use Ecpay\Sdk\Services\UrlService;

require __DIR__ . '/../../vendor/autoload.php';

$factory = new Factory([
    'hashKey' => 'pwFHCqoQZGmho4w6',
    'hashIv'  => 'EkRm7iFT261dpevs',
]);
$autoSubmitFormService = $factory->create('AutoSubmitFormWithCmvService');
$oid = 'ALO' . time();
$cartitems = $_SESSION['cart']['items'] ?? []; //如果有值就用那個值，沒有的話就空陣列
$data['items'] = []; //要傳進去版型的變數
$data["total"] = 0;
foreach ($cartitems as $pid => $val) {
    $stmt = $pdo->prepare("select * from products where id = ?"); //pid會取得購物車中存放的pid內容，$val則是映射到數量
    $stmt->execute([$pid]); //執行語法
    $result =  $stmt->fetch(); //取得資料集
    $data['items'][] = [
        "id" => $pid,
        "price" => $result['price'],
        "name" => $result['name'],
        "cover" => $result['cover'],
        "quan" => $val,
        "subtotal" => $result['price'] * $val
    ];
    $data["total"] += $result['price'] * $val; //計算購物車總金額
}
$input = [
    'MerchantID'        => '3002607',
    'MerchantTradeNo'   => $oid,
    'MerchantTradeDate' => date('Y/m/d H:i:s'),
    'PaymentType'       => 'aio',
    'TotalAmount'       => $data["total"],
    'TradeDesc'         => UrlService::ecpayUrlEncode('Wannabakery'),
    'ItemName'          => '烘焙食品',
    'ChoosePayment'     => 'Credit',
    'EncryptType'       => 1,

    // 請參考 example/Payment/GetCheckoutResponse.php 範例開發
    'ReturnURL'         => 'https://rnbmb-61-66-147-97.a.free.pinggy.link/phpclass/php30hr/project/public/ecpay-return.php',
    'OrderResultURL'    => 'https://rnbmb-61-66-147-97.a.free.pinggy.link/phpclass/php30hr/project/public/ecpay-return.php',
];
$action = 'https://payment-stage.ecpay.com.tw/Cashier/AioCheckOut/V5';



//寫入訂單主表
$odData = [
    "oid" => $oid,
    "total" => $data["total"],
    "pay_type" => 'creditcard',
    "pay_status" => '等待支付',
    "ostatus" => '處理中'
];
try {
    $stmt = $pdo->prepare("insert into orders (`oid`,`total`, `pay_type`, `pay_status`, `ostatus`) 
    values (:oid, :total, :pay_type, :pay_status, :ostatus)");
    $stmt->execute($odData);
} catch (PDOException $e) {
    echo $e->getMessage();
}

//結束寫入訂單主表
echo $autoSubmitFormService->generate($input, $action);
