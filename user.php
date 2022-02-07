<?php
// 0. SESSION開始！！
session_start();

//１．関数群の読み込み
require_once('funcs.php');
loginCheck();


?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/main.css" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
    <title>ユーザー登録</title>
</head>

<body>
    <header>
    <nav>
    <ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="index.php">ブックマーク登録</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="select.php">ブックマーク一覧</a>
        <li class="nav-item">
        <a class="nav-link" href="user_select.php">ユーザー一覧</a>
        <li class="nav-item">
        <a class="nav-link" href="logout.php">ログアウト</a>
    </ul>
    </nav>
    </header>

    <form name="form1" action="user_act.php" method="post">
    <div class="mb-3">
        <label for="exampleInputName" class="form-label">名前</label>
        <input type="text" class="form-control" id="exampleInputName" aria-describedby="name" name="name">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail" class="form-label">メールアドレス</label>
        <input type="email" class="form-control" id="exampleInputEmail" name="lid">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword" class="form-label">仮パスワード</label>
        <input type="password" class="form-control" id="exampleInputPassword" name="lpw">
    </div>
    <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="kanri_flg[]" value='1'>
    <label class="form-check-label" for="exampleCheck1">管理者</label>
    </div>
    <button type="submit" class="btn btn-primary">登録</button>
    </form>


</body>

</html>
