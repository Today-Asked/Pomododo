<?php
require_once('login_db.php');
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->conn_error) die("ERROR!");

//標籤列表
$userName = $_COOKIE["user"];
$query = "SELECT * FROM usertags WHERE userName = '$userName'";
$QueryResult = $conn->query($query);
if (!$QueryResult)  echo ("Error description: " . $conn->error);
$row = $QueryResult->num_rows;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./icon.ico" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <title>設定</title>
    <script src="jquery.js"></script>
    <script>
    </script>
    <style>
        #header {
            background-color: rgb(34, 104, 81);
            line-height: 75px;
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
    </style>
</head>

<body>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">設置新標籤</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="setTag.php" method="GET">
                        <div class="mb-3">
                            <label for="account" class="form-label">標籤名稱</label>
                            <input type="text" class="form-control" name="tagName" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">標籤顏色</label>
                            <select class="form-select" aria-label="Default select example" name="tagColor">
                                <option selected>選擇顏色</option>
                                <option value="#F08080" style="color: #F08080">珊瑚色</option>
                                <option value="#FF8033" style="color: #FF8033">熱帶橙</option>
                                <option value="#DAA520" style="color: #DAA520">金菊色</option>
                                <option value="#73E68C" style="color: #73E68C">青瓷綠</option>
                                <option value="#2E8B57" style="color: #2E8B57">海綠色</option>
                                <option value="#87CEFA" style="color: #87CEFA">淺天藍</option>
                                <option value="#004D99" style="color: #004D99">礦藍色</option>
                                <option value="#6633CC" style="color: #6633CC">紫水晶</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary">儲存</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id='header'>
        <a href="index.php" id="index">
            <img src="Title.png" style="width: 175px">
        </a>
        <a href="" id="settings">
            <img src="https://i.imgur.com/Ioo3dtm.png" class="function" alt="Icon made by flaticon.com">
        </a>
        <a href="" id="statistics">
            <img src="https://i.imgur.com/DaOsVdI.png" class="function" alt="Icon made by flaticon.com">
        </a>
        <a href="login.html" id="login">
            <img src="https://i.imgur.com/2t7CeLu.png" class="function" alt="Icon made by flaticon.com">
        </a>
    </div>
    <div style="margin-left: 35%; margin-right: 35%; margin-top: 50px">
        <h2>標籤設定</h2>
        <?php
        if (!$_COOKIE["user"]) echo "請先登入以使用標籤功能喔~<br>";
        else {
            if ($row == 0) echo "還沒有設置標籤<br>";
            else {
                echo '<ul class="list-group">';
                for ($i = 0; $i < $row; ++$i) {
                    $row = $QueryResult->fetch_array(MYSQLI_NUM);
                    echo '<li class="list-group-item">' . $row[1] .'&nbsp;<span style = "color:'.$row[2].'">●</span></li>';
                }
                echo '</ul>';
            }
            echo '<br><button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            設置新標籤
                          </button>';
        }
        ?>
    </div>
</body>

</html>