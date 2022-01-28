<?php
require_once('login_db.php');
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->conn_error) die("ERROR!");

$userName = $_COOKIE["user"];
$tagName = $_GET["tagName"];
$tagColor = $_GET["tagColor"];
$insert = "INSERT INTO usertags VALUES ('$userName', '$tagName', '$tagColor')";
$InsertResult = $conn->query($insert);
if (!$InsertResult) echo ("Error description: " . $conn->error);
else echo "<script>alert('新增標籤成功'); location.href = 'setting.php'</script>";
?>