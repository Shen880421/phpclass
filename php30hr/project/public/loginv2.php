<?php
session_start();
require_once __DIR__ . '/../inc/db.inc.php';
// my_ecommerce_project/public/register.php
// 載入 Composer 的自動載入器。
// 由於這是應用程式的核心依賴，我們使用 require_once。
require_once __DIR__ . '/../vendor/autoload.php';

// 使用 use 關鍵字引入 Twig 相關的類別
// 這樣我們就可以直接使用 FilesystemLoader 和 Environment，而不是寫完整的 \Twig\Loader\FilesystemLoader
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

// 設定時區
date_default_timezone_set('Asia/Taipei');

// Twig 模板載入器：指定模板檔案位於專案根目錄下的 templates 資料夾
$loader = new FilesystemLoader(__DIR__ . '/../templates');

// Twig 環境設定
$twig = new Environment($loader, [
    'cache' => __DIR__ . '/../cache', // 模板緩存路徑，開發時可以設為 false，上線後建議啟用
    'debug' => true,                  // 開啟除錯模式，有利於開發
]);

// 載入 Twig 除錯擴展 (只有在 debug 為 true 時才啟用)
// 這裡也可以使用 use Twig\Extension\DebugExtension; 然後直接用 new DebugExtension()
if ($twig->isDebug()) {
    $twig->addExtension(new \Twig\Extension\DebugExtension());
}

// ... 接下來是 PHP 處理邏輯 ...
//$_SERVER是全域變數, 使用陣列存取不同的伺服器參數
$message = "";
$alert_type = "";
if (isset($_GET['message']) && $_GET['message'] != "") {
    switch ($_GET['message']) {
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
    $acc = $_POST["account"];
    $pwd = $_POST["passwd"];

    if (filter_var($acc, FILTER_VALIDATE_EMAIL)) {
        $stmt = $pdo->prepare("select acc, pwd from admin_users where acc = :acc and pwd = :pwd");
        $result = $stmt->execute([
            ":acc" => $acc,
            ":pwd" => md5($pwd) //md5 加密使用者輸入的密碼後與資料表中的資料進行比對
        ]);
        if ($stmt->rowCount() == 1) {
            $_SESSION['backend_login_flag'] = true;
            $_SESSION['backend_login_acc'] = $acc;
            header("location:/project/public/dashboard.php");
        } else {
            $message .= "登入失敗!";
            $alert_type = "alert-danger";
        }
    } else {
        $message .= "帳號電郵格式錯誤!";
        $alert_type = "alert-warning";
    }
}

echo $twig->render(
    'login.twig',
    [
        "title" => "後台登入表單",
        "message" => "$message",
        "alert_type" => "$alert_type"
    ]
);
