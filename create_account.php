<?php
require_once('login_db.php');
$conn = new mysqli($hn, $un, $pw, $db);
if($conn->conn_error) die("ERROR!");

$acc = $_POST["account"];
$pwd = $_POST["password"];
$pwd2 = $_POST["password2"];
if($pwd != $pwd2){
    echo "<script>alert('密碼輸入錯誤'); location.href='create_account.html';</script>";
    return;
}

$insert = "INSERT INTO userInfo VALUES (NULL, '$acc', '$pwd')";
$result = $conn->query($insert);
if($result){
    setcookie('user', $acc, time()+3600, index.php);
    echo "<script>alert('創建資料成功'); location.href='index.php';</script>";
}
else
    echo $conn->error;
?>
