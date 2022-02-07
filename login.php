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
    <title>ログインページ</title>
</head>

<body>

    <header>
    <nav>
    <ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="select_nologin.php">ブックマーク一覧</a>
    </li>
    </ul>
    </nav>
    </header>
    <!-- lLOGINogin_act.php は認証処理用のPHPです。 -->
    <!-- <form name="form1" action="login_act.php" method="post">
        ID:<input type="text" name="lid" />
        PW:<input type="password" name="lpw" />
        <input type="submit" value="LOGIN" />
    </form> -->

    <form name="form1" action="login_act.php" method="post">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">ID</label>
        <input type="text" class="form-control" id="exampleInputLogin" aria-describedby="lid" name="lid">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="lpw">
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
    </form>


</body>

</html>
