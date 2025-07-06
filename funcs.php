<?php

/////////////////////////////////////////////
// DB接続
/////////////////////////////////////////////
function db_conn(){
    // configを呼び出すおまじない

    // ★本番用：絶対パス表示
    // $config = require('/home/izumuri/.php.config/db_config.php');

    // ★ローカルホスト用：相対パス表示
    $config = require(__DIR__ . '/config/db_config.php');
    
    try {$pdo = new PDO(
            "mysql:dbname={$config['db']}; charset={$config['charset']}; host={$config['host']}",
            $config['user'], 
            $config['pass']        );
        return $pdo;
    } catch (PDOException $e) {
        exit('DB Connection Error:' . $e->getMessage());
    }
}


/////////////////////////////////////////////
// SQL実行時のエラー処理
/////////////////////////////////////////////
function errorHandle($stmt){
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
}


/////////////////////////////////////////////
// SQL実行時のリダイレクト処理
/////////////////////////////////////////////
function redirect($file_name){
    header('Location: ' .$file_name);
    exit();
}


/////////////////////////////////////////////
// XSS対策
/////////////////////////////////////////////
function h($str){
    return htmlspecialchars($str, ENT_QUOTES);
}

