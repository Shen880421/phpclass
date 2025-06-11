<?php
ini_set("output_buffering", 'off');
echo "session";
session_start();

//var_dump($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    printf("<div>%s, 歡迎登入!!<br> 今天的日期時間是:%s</div>", 
    $_SESSION['backend_login_acc'], date("Y-m-d H:i:s"));
    $str = sprintf("<div>%s, 歡迎登入!!<br> 今天的日期時間是:%s</div>", 
    $_SESSION['backend_login_acc'], date("Y-m-d H:i:s"));
    echo $str;
    var_dump($_SESSION);
    print_r($_SESSION);
    ?>
    <a href="logout.php">登出</a>
</body>
</html>
