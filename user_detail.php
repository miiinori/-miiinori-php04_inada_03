<?php
session_start();
require_once('funcs.php');
loginCheck();


$pdo = db_conn();
$id = $_GET['id']; //?id~**を受け取る


//２．データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM gs_user_table WHERE id=:id;');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
if ($status == false) {
    sql_error($stmt);
} else {
    $row = $stmt->fetch();
}
?>



<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>ユーザーデータ更新</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>

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
    <form name="form1" action="user_update.php" method="post">
    <div class="mb-3">
        <label for="exampleInputName" class="form-label">名前</label>
        <input type="text" class="form-control" id="exampleInputName" aria-describedby="name" name="name" value="<?= $row['name'] ?>">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail" class="form-label">メールアドレス</label>
        <input type="email" class="form-control" id="exampleInputEmail" name="lid" value="<?= $row['lid'] ?>">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword" class="form-label">仮パスワード</label>
        <input type="password" class="form-control" id="exampleInputPassword" name="lpw" value="<?= $row['lpw'] ?>">
    </div>
    <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="kanri_flg" value="<?= $row['kanri_flg'] ?>">
    <label class="form-check-label" for="exampleCheck1">管理者</label>
    </div>
    <button type="submit" class="btn btn-primary">修正</button>
    <input type="hidden" name="id" value="<?= $id ?>">
    </form>

    <!-- Main[End] -->


</body>

</html>
