<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./icon.ico" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <title>Pomododo</title>
    <script src="countdown.js"></script>
    <script src="jquery.js"></script>
    <script>
    </script>
    <style>
        #header {
            background-color: rgb(34, 104, 81);
            line-height: 75px;
        }

        #content {
            padding-bottom: 50px;
        }

        .function {
            float: right;
            width: 35px;

            margin-top: 20px;
            margin-bottom: 20px;
            margin-left: 10px;
            margin-right: 10px;

            filter: invert(98%) sepia(2%) saturate(7%) hue-rotate(333deg) brightness(102%) contrast(102%);
        }

        .footer {
            height: 30px;
            /*設定footer本身高度*/
            background-color: #D0D0D0;
        }
    </style>
</head>

<body>
    <div id='header'>
        <a href="index.php" id="index">
            <img src="Title.png" style="width: 175px">
        </a>
        <a href="setting.php" id="setting">
            <img src="https://i.imgur.com/Ioo3dtm.png" class="function" alt="Icon made by flaticon.com">
        </a>
        <a href="" id="statistics">
            <img src="https://i.imgur.com/DaOsVdI.png" class="function" alt="Icon made by flaticon.com">
        </a>
        <a href="login.html" id="login">
            <img src="https://i.imgur.com/2t7CeLu.png" class="function" alt="Icon made by flaticon.com">
        </a>
    </div>

    <center>
        <div class="wrapper">
            <div id='content'>
                <div class="alert alert-info" role="alert" id="greet">
                    早安 <?php if ($_COOKIE["user"]) echo $_COOKIE["user"];
                        else echo "未登入的使用者"; ?>，一起努力吧。
                </div>
                <div style="margin: 40px">
                    <font style="margin-top: 90px; margin-bottom: 150px; font-size: 125px; font-family: monospace; " id="min">25</font>
                    <font style="margin-top: 90px; margin-bottom: 150px; font-size: 125px; font-family: monospace; ">:</font>
                    <font style="margin-top: 90px; margin-bottom: 150px; font-size: 125px; font-family: monospace; " id="sec">00</font><br>
                </div>

                <div id="beforeCounting">
                    <button type="button" id="time" onclick="setTimespan()" class="btn btn-success" style="margin-bottom: 30px; margin-right: 20px; margin-left: 20px; width: 200px; height: 60px; font-size: 30px;">
                        設定時間
                    </button>
                    <!--標籤做到一半 下次再說
                <div class="dropdown">
                    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton1" style = "width: 200px; height: 60px; font-size: 30px;" data-bs-toggle="dropdown" aria-expanded="false">
                        設定標籤
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <?php
                        /*for ($i = 0; $i < $row; ++$i) {
                            $row = $QueryResult->fetch_array(MYSQLI_NUM);
                            echo '<li><a class="dropdown-item">' . $row[1] .'&nbsp;<span style = "color:'.$row[2].'">●</span></li>';
                        }*/
                        ?>
                    </ul>-->


                    <!--<button type="button" id = "tag" onclick="setTag()" class="btn btn-success" style = "margin-bottom: 30px; margin-right: 20px; margin-left: 20px; width: 200px; height: 60px;  font-size: 30px;">
                    設定標籤
                </button><br>-->
                    <button type="button" id="start" onclick="startCountdown()" class="btn btn-success" style="margin-bottom: 30px; width: 200px; height: 60px; font-size: 30px;">
                        開始!
                    </button><br>
                    <button type="button" class="btn btn-success" style="width: 200px; height: 60px; font-size: 30px;" onclick="test()">
                        測試
                    </button>
                </div>

                <div hidden id="Counting">
                    <button type="button" id="pause" onclick="pause()" class="btn btn-success" style="margin-bottom: 30px; margin-right: 20px; margin-left: 20px; width: 200px; height: 60px;  font-size: 30px;">
                        暫停
                    </button>
                    <button type="button" id="stop" onclick="end()" class="btn btn-success" style="margin-bottom: 30px; margin-right: 20px; margin-left: 20px; width: 200px; height: 60px;  font-size: 30px;">
                        停止
                    </button>
                </div>

                <div hidden id="afterCounting">
                    <button type="button" id="rest" onclick="" class="btn btn-info" style="margin-bottom: 30px; margin-right: 20px; margin-left: 20px; width: 200px; height: 60px;  font-size: 30px;">
                        休息
                    </button>
                    <button type="button" id="save" onclick="" class="btn btn-info" style="margin-bottom: 30px; margin-right: 20px; margin-left: 20px; width: 200px; height: 60px;  font-size: 30px;">
                        儲存
                    </button>
                    <p>本次專注時長：<span id="focusMin">0</span> 分 <span id="focusSec">0</span> 秒</p>
                </div>
                <!--<button id = "notify">press me!</button>-->
                <audio src="" id="end"></audio>
            </div>
        </div>
    </center>
    <footer class="footer">

        <span style="margin: 10px">credit by cy0802 & corn syrup.</span>

    </footer>
</body>

</html>

<?php
require_once('login_db.php');
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->conn_error) die("ERROR!");

//標籤
$userName = $_COOKIE["user"];
$query = "SELECT * FROM usertags WHERE userName = '$userName'";
$QueryResult = $conn->query($query);
if (!$QueryResult)  echo ("Error description: " . $conn->error);
$row = $QueryResult->num_rows;

if (is_array($_GET) && count($_GET) > 0) {
    $startTime = $_GET['startTime'];
    $focusMillisec = $_GET['timeSpan'];
    $tag = $_GET['tag'];
    //echo $tag;

    if (isset($_COOKIE['user'])) {
        $endTime = $startTime + $focusMillisec;
        $user = $_COOKIE["user"];
        if (isset($_GET["tag"]))
            $insertTimeData = "INSERT INTO time VALUES (NULL, '$user', '$startTime', '$endTime', '$focusMillisec', '$tag')";
        else
            $insertTimeData = "INSERT INTO time VALUES (NULL, '$user', '$startTime', '$endTime', '$focusMillisec', NULL)";
        $conn->set_charset("utf-8");
        $result = $conn->query($insertTimeData);
        if (!$result) {
            echo "error description:" . $conn->error;
        }
    }
} else {
    //echo "Haven't finished<br>";
}
?>