<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ登録</title>
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
        <a class="nav-link active" aria-current="page" href="select.php">データ一覧</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="login.php">ログイン</a>
    </li>
    </ul>
    </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <form method="POST" action="insert.php">
        <div class="jumbotron">
            <fieldset>
                <legend>ブックマーク登録</legend>
                <form>
                    <div class="mb-3">
                        <label for="exampleInputBookname" class="form-label">書籍名</label>
                        <input type="text" class="form-control" id="exampleInputBookname" name="bookname">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputUrl" class="form-label">URL</label>
                        <input type="text" class="form-control" id="exampleInputUrl" name="url">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputComment" class="form-label">コメント</label>
                        <input type="text" class="form-control" id="exampleInputComment" name="comment">
                    </div>
                    <!-- <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1" name="kanri">管理者</label>
                    </div> -->
                    <button type="submit" class="btn btn-primary">登録</button>
                </form>
            </fieldset>
        </div>
    </form>






    <!-- Main[End] -->
</body>

</html>
