<?php

require_once('login_db.php');
$conn = new mysqli($hn, $un, $pw, $db);
if($conn->conn_error) die("ERROR!");
//else echo "success!";

$acc = $_POST["account"];
$pwd = $_POST["password"];
//echo $acc.'<br>';
//echo $pwd;
$check = "SELECT * FROM userInfo WHERE user = '$acc' AND password = '$pwd'";
$result = $conn->query($check);
$rows = $result->num_rows;
if(!$result) echo $conn->error;
if($rows == 0){
    //echo 'fail';
    echo "<script>alert('此資料不存在'); location.href='login.html';</script>";
}else{
    setcookie('user', $acc, time()+28800, index.php);
    echo "<script>alert('登入成功'); location.href='index.php';</script>";
    //echo 'success';
}
/*$insert = "INSERT INTO userInfo VALUES (NULL, '$acc', '$pwd')";
$result = $conn->query($insert);
if($result)
    echo 'success';
else
    echo $conn->error;
 */

?>
