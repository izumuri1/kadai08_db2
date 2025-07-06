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


// 2.DB接続
// ◆funcs.php
$pdo = db_conn();

// 3.SQL（データ登録）
$stmt = $pdo -> prepare('
    INSERT INTO targetschool_table
        (examStartTime, examEndTime, schoolName, subject, hensa, station, walk, interest, 
        favorite, application, applicationFee, entrance, entranceFee) 
    VALUES
        (:examStartTime, :examEndTime, :schoolName, :subject, :hensa, :station, :walk, :interest, 
        :favorite, :application, :applicationFee, :entrance, :entranceFee)
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
$status = $stmt->execute();

// 4.エラー処理・リダイレクト
if ($status === false) {
    // ◆funcs.php
    errorHandle($stmt);
} else {
    // ◆funcs.php
    redirect('index.php');
}
