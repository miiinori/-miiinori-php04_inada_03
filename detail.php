<?php
session_start();
require_once('funcs.php');
loginCheck();


$pdo = db_conn();
$id = $_GET['id']; //?id~**を受け取る


//２．データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM gs_bm_table WHERE id=:id;');
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
    <title>データ更新</title>
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
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">ブックマーク一覧</a></div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <form method="POST" action="update.php">
        <div class="jumbotron">
            <fieldset>
                <legend>ブックマーク編集</legend>
                <form>
                    <div class="mb-3">
                        <label for="exampleInputBookname" class="form-label">書籍名</label>
                        <input type="text" class="form-control" id="exampleInputBookname" name="bookname" value="<?= $row['bookname'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputUrl" class="form-label">URL</label>
                        <input type="text" class="form-control" id="exampleInputUrl" name="url" value="<?= $row['url'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputComment" class="form-label">コメント</label>
                        <input type="text" class="form-control" id="exampleInputComment" name="comment" value="<?= $row['comment'] ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">登録</button>
                    <input type="hidden" name="id" value="<?= $id ?>">
                </form>
            </fieldset>
        </div>
    </form>


    <!-- Main[End] -->


</body>

</html>
