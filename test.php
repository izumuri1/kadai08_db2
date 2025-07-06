<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

echo "PHP動作確認OK<br>";

// DB接続テスト
require_once('funcs.php');

try {
    $pdo = db_conn();
    echo "DB接続成功<br>";
    
    // テーブル存在確認
    $stmt = $pdo->prepare('SHOW TABLES');
    $stmt->execute();
    $tables = $stmt->fetchAll();
    echo "テーブル一覧：<br>";
    foreach($tables as $table) {
        print_r($table);
        echo "<br>";
    }
    
} catch (Exception $e) {
    echo "エラー: " . $e->getMessage();
}
?>