<?php
require_once "include.php";
checkLogined();
$username=$_SESSION['username'];
$rows=mysql_fetch_array(mysql_query("select * from user where username='$username'"));
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>余额</title>
    <link type="text/css" rel="stylesheet" href="css/reset.css">
    <link type="text/css" rel="stylesheet" href="css/mainContent.css">
</head>
<body>
<div class="content">
    <div class="title">
        <h2>余额</h2>
    </div>
    <div class="yuE">
    	<!--<form name="form" method="post" action="">-->
            <ul class="charge">
    	        <li class="sum">
    		        <p>
    		        	<span>当前余额：</span><em>￥<?php echo $rows['yuE'];?></em>
    		        </p>
    	        </li>
                <!--<li class="figure">
        	        <label for="money">充值金额：</label>
                    <input id="money" name="money"/>元
                </li>    
                <li class="charge_btn">
                	<button class="submit" type="submit">充&nbsp;&nbsp;值</button>
                </li>-->
            </ul>    		
    	<!--</form>-->
    </div> 
</div>	
</body>
</html>