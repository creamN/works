<?php
require_once "include.php";
checkLogined();
$username=$_SESSION['username'];
$sql="select * from user where username='$username'";
$query=mysql_query($sql);
$rows=mysql_fetch_array($query);
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>充值</title>
<link type="text/css" rel="stylesheet" href="css/reset.css">
<link type="text/css" rel="stylesheet" href="css/mainCon.css">
</head>
<body>
<div class="content">
    <div class="title">
        <h2>提现</h2>
    </div>
    <form method="post">
      <ul class="draw">
          <li class="sum">
              <span>可提现：</span>
              <em>￥
				  <?php echo $rows['yuE'];?>
              </em>
          </li>
          <li class="figure">
            <label for="money">充值金额：</label>
            <input id="money" name="yuE"/>元
          </li>   
          <li class="draw_btn"><button class="submit" type="submit">充&nbsp;&nbsp;值</button></li>
      </ul>
    </form>
</div>
</body>
</html>