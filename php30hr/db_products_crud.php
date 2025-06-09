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
