// 自己練
<?php
require_once("db_inc.php");
$data =
    [
        [
            'newname' => "samsung z fold",
            'newprice' => "50000",
            'newstock' => 2000,
            'newdescription' => "新手機",
            //'newid' => 4
        ],
        [
            'newname' => "samsung x fold",
            'newprice' => "30000",
            'newstock' => 2000,
            'newdescription' => "新手機2",
            //'newid' => 5
        ]
    ];
$newname1 = "samsung h fold";
$newprice1 = "70000";
$newstock1 = 2000;
$newdescription1 = "新手機3";
//$newid1 = 4;

// 練習INSERT
try {
    foreach ($data as $row) {
        $sql = "INSERT INTO products (name, price, stock, description) VALUE (?, ?, ?, ?);";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(
            [
                $row['newname'],
                $row['newprice'],
                $row['newstock'],
                $row['newdescription']
            ]
        );
    }
    echo "insert" . $pdo->lastInsertId() . "<br>";
} catch (PDOException $e) {
    die("失敗: " . $e->getMessage() . "<br>");
}
// 練習UPDATE
// try {
//     $stmt = $pdo->prepare("UPDATE products set name = ?, price = ?, stock = ?, description = ? WHERE id = ?");
//     $stmt -> execute([$newname1, $newprice1, $newstock1, $newdescription1, $newid1]);
//     echo $stmt->rowCount();
// } catch (PDOException $e) {
//     die("失敗: " . $e->getMessage() . "<br>");
// }
// 練習DELETE
// try {
//     $stmt = $pdo -> prepare("DELETE FROM products WHERE id = ?");
//     $stmt -> execute([$newid1]);
// }catch (PDOException $e) {
//     die("失敗". $e -> getMessage(). "<br>");
// }
?>
// 老師
<?php
require_once("db.inc.php");//載入指定檔案
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
    <?php
        //crud 操作練習
        //insert
        try{
            echo "<h3>新增資料的情境</h3>";
            //id, name, price, stock, description
            $data =[
                ['name'=>"測試產品1", 'price'=> 368, 'stock'=>50, 'description'=>'測試產品1描述'],
                ['name'=>"測試產品2", 'price'=> 868, 'stock'=>30, 'description'=>'測試產品2描述']
            ];
            $insertCount = 0;
            foreach($data as $row){
                $sql = "insert into products (name, price, stock, description) 
                values (:name, :price, :stock, :description);";
                $stmt = $pdo->prepare($sql);
                var_dump($row);
                $stmt->execute($row);
                $insertCount++;
                echo "已新增產品:ID為 ". $pdo->lastInsertId()."<br>";
            }
            echo "<p style='color:green'>成功新增 ".$insertCount."筆產品資料</p>";
        }catch (PDOException $e) {
            echo $e->getMessage() . "<br>";
        }
        //select
        try{
            echo "<h3>查詢資料的情境</h3>";
            //如何拿到資料集資料總筆數
            $sql = "select count(1) as cc from products ";
            $stmt = $pdo->query($sql);
            $result = $stmt->fetch();
            //var_dump($result);
            //分頁設定
            if(isset($_GET['page']) && $_GET['page'] !=''){
                $page = $_GET['page'];
            } else {
                $page = 0;
            }
            //$page = 2;
            $rows_per_page = 10;//每頁幾筆資料
            $skip_rows = $page * $rows_per_page; //跳過幾筆
            $total_pages = ceil($result['cc'] / $rows_per_page);//總頁數
            echo "總筆數" . $result['cc']. ", 共" . $total_pages. "頁";
            echo "<br>";
            $sql = "select id, name, price, stock, description from products limit {$skip_rows}, {$rows_per_page};";
            $stmt = $pdo->query($sql);
            echo $stmt->rowCount();
            if ($stmt->rowCount() > 0){
                while($row = $stmt->fetch()){
                    echo "<div>id: {$row['id']}, name: {$row['name']}</div>";
                }
            } else {
                echo "沒有任何資料";
            }
        }catch (PDOException $e) {
            echo $e->getMessage() . "<br>";
        }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>

<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="unit02_ex.php?page=<?php echo $page-1?>">Previous</a></li>
    <?php
        //如果頁碼選擇區設定為只能顯示5頁的情況下, 執行頁碼的生成判斷
        $pag_per_pages = 5;//頁碼選擇區數量
        if($total_pages > 5 ){
            //篩選頁碼呈現
            $prevPage = $page-1;
            $nextPage = $page+1;
            $prevPage2 = $page-2;
            $nextPage2 = $page+2; 
            echo "<li class='page-item'><a class='page-link' href='unit02_ex.php?page={$prevPage2}'>{$prevPage2}</a></li>";
            echo "<li class='page-item'><a class='page-link' href='unit02_ex.php?page={$prevPage}'>{$prevPage}</a></li>";
            echo "<li class='page-item'><a class='page-link active' href='unit02_ex.php?page={$page}'>{$page}</a></li>";
            echo "<li class='page-item'><a class='page-link' href='unit02_ex.php?page={$nextPage}'>
            {$nextPage}</a></li>";
            echo "<li class='page-item'><a class='page-link' href='unit02_ex.php?page={$nextPage2}'>{$nextPage2}</a></li>";
        } else {
            for($i=1 ; $i <= $total_pages; $i++){
                echo "<li class='page-item'><a class='page-link' href='unit02_ex.php?page={$i}'>{$i}</a></li>";
                //echo "<a href='unit02_ex.php?page={$i}'>{$i}</a>";
            }
        }

        
        ?>
    <li class="page-item"><a class="page-link" href="unit02_ex.php?page=<?php echo $page+1?>">Next</a></li>
  </ul>
</nav>

</body>
</html>

