<?php

//SESSIONをスタートさせる。
session_start();

$sid = session_id();
echo $sid;

// Sessionを使うと、ファイル間のやりとりが簡単に
$_SESSION['name'] = 'john';
$_SESSION['age'] = 12;


?>