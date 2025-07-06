<?php
require_once('funcs.php');

// 1.POST取得
$examStartTime = $_POST['examStartTime'];
$examEndTime = $_POST['examEndTime'];
$schoolName = $_POST['schoolName'];
$subject = $_POST['subject'];
$hensa = $_POST['hensa'];
$station = $_POST['station'];
$walk = $_POST['walk'];
$interest = $_POST['interest'];
$favorite = $_POST['favorite'];
$application = $_POST['application'];
$applicationFee = $_POST['applicationFee'];
$entrance = $_POST['entrance'];
$entranceFee = $_POST['entranceFee'];
$id = $_POST['id'];


// 2.DB接続
// ◆funcs.php
$pdo = db_conn();

// 3.SQL（データ更新）
$stmt = $pdo -> prepare('UPDATE targetSchool_table
    SET
        examStartTime = :examStartTime,
        examEndTime = :examEndTime,
        schoolName =  :schoolName,
        subject = :subject,
        hensa = :hensa,
        station = :station,
        walk = :walk,
        interest = :interest,
        favorite = :favorite,
        application = :application,
        applicationFee = :applicationFee,
        entrance = :entrance,
        entranceFee = :entranceFee,
        -- ★★★★★重要！！idも忘れない
        id = :id
    WHERE id = :id
    ');

$stmt->bindValue(':examStartTime', $examStartTime, PDO::PARAM_STR);
$stmt->bindValue(':examEndTime', $examEndTime, PDO::PARAM_STR);
$stmt->bindValue(':schoolName', $schoolName, PDO::PARAM_STR);
$stmt->bindValue(':subject', $subject, PDO::PARAM_STR);
$stmt->bindValue(':hensa', $hensa, PDO::PARAM_INT);
$stmt->bindValue(':station', $station, PDO::PARAM_STR);
$stmt->bindValue(':walk', $walk, PDO::PARAM_INT);
$stmt->bindValue(':interest', $interest, PDO::PARAM_INT);
$stmt->bindValue(':favorite', $favorite, PDO::PARAM_STR);
$stmt->bindValue(':application', $application, PDO::PARAM_STR);
$stmt->bindValue(':applicationFee', $applicationFee, PDO::PARAM_INT);
$stmt->bindValue(':entrance', $entrance, PDO::PARAM_STR);
$stmt->bindValue(':entranceFee', $entranceFee, PDO::PARAM_INT);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

// 4.エラー処理・リダイレクト
if ($status === false) {
    // ◆funcs.php
    errorHandle($stmt);
} else {
    // ◆funcs.php
    redirect('select.php');
}