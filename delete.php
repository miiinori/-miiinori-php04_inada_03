<?php
//1. POSTデータ取得
session_start();
require_once('funcs.php');
loginCheck();
// ↑この3行はログインしている人にしかみられないサイト

//1.funcと接続、POSTデータ取得
$pdo = db_conn();
$id = $_GET['id']; //?id~**を受け取る

//2. DB接続します
require_once('funcs.php');
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare('DELETE FROM gs_bm_table WHERE id = :id;');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status === false) {
    sql_error($stmt);
} else {
    redirect('select.php');
}
