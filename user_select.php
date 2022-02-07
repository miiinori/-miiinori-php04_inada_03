<?php
// 0. SESSION開始！！
session_start();

//１．関数群の読み込み
require_once('funcs.php');
loginCheck();

//２．データ登録SQL作成
$pdo = db_conn();
$stmt = $pdo->prepare('SELECT * FROM gs_user_table');
$status = $stmt->execute();

//３．データ表示
$view = '';
if ($status == false) {
    sql_error($stmt);
} else {
    while ($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= '<p>';
        $view .= '<a href="user_detail.php?id=' . $r["id"] . '">';
        $view .= h($r['id']) . " " . h($r['name']) . " " . h($r['lid']). " " . h($r['lpw']). " " . h($r['kanri_flg']);
        $view .= '</a>';
        $view .= "　";
        $view .= '<a class="btn btn-danger" href="user_delete.php?id=' . $r['id'] . '">';
        $view .= '[<i class="glyphicon glyphicon-remove"></i>削除]';
        $view .= '</a>';
        $view .= '</p>';
    }
}
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ブックマーク表示</title>
    <link rel="stylesheet" href="css/range.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body id="main">
    <!-- Head[Start] -->
<header>
<nav>
    <ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="index.php">ブックマーク登録</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="select.php">ブックマーク一覧</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="user.php">ユーザー登録</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="user_select.php">ユーザー一覧</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="logout.php">ログアウト</a>
    </li>
    </ul>
    </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <div>
        <div class="container jumbotron"><?= $view ?></div>
    </div>
    <!-- Main[End] -->

</body>

</html>
