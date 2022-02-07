<?php

//最初にSESSIONを開始！！ココ大事！！
session_start();

//POST値を受け取る
$name = $_POST['name'];
$lid = $_POST['lid'];
$lpw = $_POST['lpw'];
// $value = $_POST['kanri_flg[]']; //これが違うんだと思う
if (isset($_POST['kanri_flg'])) {
    $kanri_flg = 1;
} else {
    $kanri_flg = 0;
}


//1.  DB接続します
require_once('funcs.php');
$pdo = db_conn();

//2. データ登録SQL作成
// gs_user_tableに、IDとWPがあるか確認する。
$stmt = $pdo->prepare('INSERT INTO gs_user_table(name,lid,lpw,kanri_flg)VALUES(:name,:lid,:lpw,:kanri_flg);');
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
$stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_INT);

$status = $stmt->execute();

//3. SQL実行時にエラーがある場合STOP
if($status === false){
    sql_error($stmt);
}

//4. 抽出データ数を取得
$val = $stmt->fetch();


//管理者フラグにチェックがついていたら1と入るようにする
//これが違うんだと思う
// if( isset( $_POST['kanri_flg'] )) {
//     echo'1';
// }else{
//     echo'0';
// }


//if(password_verify($lpw, $val['lpw'])){ //* PasswordがHash化の場合はこっちのIFを使う
if( $val['id'] != ''){
    //Login成功時 該当レコードがあればSESSIONに値を代入
    $_SESSION['chk_ssid'] = session_id();
    $_SESSION['kanri_flg'] = $val['kanri_flg'];
    $_SESSION['name'] = $val['name'];

    header('Location: user_select.php');
}else{
    //Login失敗時(Logout経由)
    header('Location: user.php');
}

exit();
