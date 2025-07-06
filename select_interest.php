<?php
require_once('funcs.php');

// index.phpのリンクから遷移してくる 

// 1.DB接続
// ◆funcs.php
$pdo = db_conn();

// 2.SQL（データ選択）
// SELECT文の中で受験日時で昇順並び替え
$stmt = $pdo -> prepare('
    SELECT * FROM targetschool_table ORDER BY interest DESC
    ');
$status = $stmt->execute();

// 3.データ表示
$view = '';
if ($status === false) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        //GETデータ送信リンク作成
        $view .= '<p>';
        $examTime = new DateTime(h($result['examStartTime']));
        $formattedTime = $examTime->format('Y-m-d H:i');
        
        // リンクをクリックするとGET送信される➡detail.php
        $view .= '<a href="detail.php?id='.h($result['id']).'">';
        $view .= h($result['id']) . ' : ' . $formattedTime . ' : ' . h($result['station']). ' : ' . h($result['schoolName']). ' : ' . h($result['subject']). ' : ' . h($result['interest']);
        $view .= '</a>';

        // リンクをクリックするとGET送信される➡delete.php
        $view .= '<a href="delete.php?id='.h($result['id']).'">';
        $view .= '　[削除]';
        $view .= '</a>';
        
        $view .= '</p>';
    }
}

?>

<!-- ★★★$viewをHTML上に表示 -->
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>どうする中学受験</title>
    <link href="css/style.css" rel="stylesheet">
</head>

<body id="main">
    <!-- Head[Start] -->
    <header>
        <nav>
            <div>
                <div>
                    <a href="index.php">志望校登録へ戻る</a>
                </div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <div>
        <div>
            <a href="detail.php"></a>
            <?= $view ?>
        </div>
    </div>
    <!-- Main[End] -->

</body>

</html>