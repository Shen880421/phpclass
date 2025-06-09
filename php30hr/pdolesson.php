<?php
$host = 'localhost';        // 資料庫主機名，XAMPP 預設為 localhost
$dbName = 'my_ecommerce';   // 你的資料庫名稱 (來自練習 1 的要求)
$username = 'my_ecdbo';      // 資料庫使用者名稱，XAMPP 預設為 root
$password = '-ji43R!L[T@!Q4m0';             // 資料庫密碼，XAMPP 預設為空
$charset = 'utf8mb4';       // 字元集，建議使用 utf8mb4 支援更多字元，如 Emoji
// DSN (Data Source Name)
$dsn = "mysql:host={$host};dbname={$dbName};charset={$charset}";

// PDO 連接選項
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // 錯誤模式：拋出異常 (建議，有利於開發時發現問題)
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,     // 預設抓取模式：關聯陣列 (以欄位名稱作為鍵)
    PDO::ATTR_EMULATE_PREPARES   => false,                 // 關閉模擬預處理 (PHP 8.3 預設為 false，提高安全性與效能)
];

try {
    $pdo = new PDO($dsn, $username, $password, $options);
    echo "資料庫連接成功！<br>";
} catch (PDOException $e) {
    // 連接失敗時捕獲異常並輸出錯誤訊息
    // 在實際專案中，不應該直接將詳細錯誤訊息顯示給使用者，應記錄到日誌檔，並給予使用者友善提示
    die("資料庫連接失敗: " . $e->getMessage());
}
?>
<?php
// (接續上面的 PDO 連接程式碼)
try {
    // 查詢所有產品，並依照 id 降序排列
    $stmt = $pdo->query("SELECT id, name, price, stock, description FROM products ORDER BY id DESC");

    echo "<h2>產品列表 (所有產品)</h2>";
    // 檢查是否有結果
    if ($stmt->rowCount() > 0) {
        echo "<table border='1' style='width:100%; border-collapse: collapse;'>";
        echo "<thead><tr>";
        echo "<th style='padding: 8px; border: 1px solid #ddd;'>ID</th>";
        echo "<th style='padding: 8px; border: 1px solid #ddd;'>名稱</th>";
        echo "<th style='padding: 8px; border: 1px solid #ddd;'>價格</th>";
        echo "<th style='padding: 8px; border: 1px solid #ddd;'>庫存</th>";
        echo "<th style='padding: 8px; border: 1px solid #ddd;'>描述</th>";
        echo "</tr></thead><tbody>";

        // 使用 fetch() 逐行獲取結果，預設為 PDO::FETCH_ASSOC (關聯陣列)
        while ($row = $stmt->fetch()) {
            echo "<tr>";
            echo "<td style='padding: 8px; border: 1px solid #ddd;'>" . htmlspecialchars($row['id']) . "</td>";
            echo "<td style='padding: 8px; border: 1px solid #ddd;'>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td style='padding: 8px; border: 1px solid #ddd;'>" . number_format($row['price'], 2) . "</td>"; // 格式化價格
            echo "<td style='padding: 8px; border: 1px solid #ddd;'>" . htmlspecialchars($row['stock']) . "</td>";
            // 簡化描述，只顯示前 50 個字元
            echo "<td style='padding: 8px; border: 1px solid #ddd;'>" . htmlspecialchars(mb_substr($row['description'] ?? '', 0, 50)) . (mb_strlen($row['description'] ?? '') > 50 ? '...' : '') . "</td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "目前沒有找到任何產品。";
    }
} catch (PDOException $e) {
    die("查詢失敗: " . $e->getMessage());
}
?>