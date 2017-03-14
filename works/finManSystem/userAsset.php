<?php
require_once "include.php";
checkLogined();
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>总资产</title>
<link type="text/css" rel="stylesheet" href="css/reset.css">
<link type="text/css" rel="stylesheet" href="css/mainCon.css">
</head>
<body>
<div class="content">
    <div class="title">
        <h2>资金总览</h2>
    </div>
    <ul class="asset">
        <li class="benefit">
            昨日收益
            <em></em>元
        </li>
        <li class="sum">
            <p>
                <span>可用余额：</span>
                <em class="big">￥&nbsp;
                    <?php
                        if($_SESSION['username']!==""){
                            $username=$_SESSION['username'];
                            $sql="select * from user where username='$username'";
                            $query=mysql_query($sql);     
                            $rows=mysql_fetch_array($query);
                            echo $rows['yuE']; 
                        }                 
                    ?>
                </em>
            </p>
            <p><span>投标/计息中：</span><em>￥&nbsp;1</em></p>
        </li>
    </ul>
</div>
</body>
</html>