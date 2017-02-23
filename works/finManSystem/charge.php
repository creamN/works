<?php
require_once "include.php";
checkAdmin();
$id=$_REQUEST['id'];
$sql="select * from user where id='$id'";
$query=mysql_query($sql);
$row=mysql_fetch_array($query);
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>余额充值</title>
    <link type="text/css" rel="stylesheet" href="css/reset.css">
    <link type="text/css" rel="stylesheet" href="css/backContent.css">
</head>
<body>
<div class="content">
    <div class="title">
        <h2>余额充值</h2>
    </div>
    <form action="doAdminAction.php?act=doCharge&id=<?php echo $row['id'];?>" method="post">
        <ul class="charge">
            <li class="sum">
                <span>当前余额</span>
                <em>￥<?php echo $row['yuE'];?></em>
            </li>
            <li class="figure">
                <label for="money">充值金额</label>
                <input id="money" name="money"/>元
            </li>
            <li class="charge_btn"><button class="submit" type="submit">充&nbsp;&nbsp;值</button></li>
        </ul>
    </form>
</div>
<body>
</html>