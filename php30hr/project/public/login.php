<?php
require_once "../inc/db.inc.php";
//
//$_SERVER是全域變數, 使用陣列存取不同的伺服器參數
$message = "";
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    //如果這個頁面的呼叫方式是使用http post 的話
    //var_dump($_POST);
    $acc = $_POST["account"];
    $pwd = $_POST["passwd"];
    
    if (filter_var($acc, FILTER_VALIDATE_EMAIL)) {
        //echo "合法 Email";
        if ( $acc == "admin@demo.com" &&  $pwd == "test1234"){
            $message = "登入成功";
        } 
    } else {
        $message .= "帳號電郵格式錯誤";
    }


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-1 col-md-4 offset-md-4 my-5">
                <h4>產尖電商後台</h4>
                <div class="card shadow-sm">
                    <div class="card-header text-white bg-primary ">登入系統</div>
                    <div class="card-body">
                        <?php if($message != "") {?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?php echo $message;?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php }?>
                        <form method="post" action="">
                            <div class="mb-3">
                                <label for="foraccount" class="form-label">登入帳號</label>
                                <input type="text" class="form-control" name ="account" id="account" placeholder="請輸入email格式的帳號" required>
                            </div>
                            <div class="mb-3">
                                <label for="forpasswd" class="form-label">登入密碼</label>
                                <input type="password" class="form-control" id="passwd" name="passwd" placeholder="請輸入密碼" required>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">登入</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>