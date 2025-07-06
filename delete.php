<?php
require_once('funcs.php');

// 1.GETデータ取得
$id = $_GET['id'];


// 2.DB接続
$pdo = db_conn();


// 3.SQL（データ削除）
$stmt = $pdo->prepare('DELETE FROM targetSchool_table 
    WHERE 
        id = :id
    '
);

$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute(); //実行

// 4.エラー処理・リダイレクト
if ($status === false) {
    errorHandle($stmt);
} else {
    redirect("select.php");
}
