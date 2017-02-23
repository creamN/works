<?php
require_once "include.php";
checkAdmin();
$id=$_REQUEST['id'];
$sql="select * from user where id='$id'";
$query=mysql_query($sql);
$rows=mysql_fetch_array($query);
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>会员详情</title>
    <link type="text/css" rel="stylesheet" href="css/reset.css">
    <link type="text/css" rel="stylesheet" href="css/backContent.css">
</head>
<body>
<div class="content">
    <div class="title">
        <h2>会员详情</h2>
    </div>
    <div class="userDetail">
    	<table class="table" cellpadding="0" cellspacing="0">
    		<tr>
    			<th>用户名</th>
    			<td><?php echo $rows['username'];?></td>
    		</tr>
    		<tr>
    			<th>真是姓名</th>
    			<td><?php echo $rows['name'];?></td>
    		</tr>
    		<tr>
    			<th>性别</th>
    			<td><?php echo $rows['sex'];?></td>
    		</tr>   
    		<tr>
    			<th>联系方式</th>
    			<td><?php echo $rows['phone'];?></td>
    		</tr>  
    		<tr>
    			<th>邮件</th>
    			<td><?php echo $rows['email'];?></td>
    		</tr>
    		<tr>
    			<th>住址</th>
    			<td><?php echo $rows['address'];?></td>
    		</tr>   
    		<tr>
    			<th>余额</th>
    			<td><?php echo $rows['yuE'];?></td>
    		</tr>  
    		<tr>
    			<th>注册时间</th>
    			<td><?php echo $rows['addTime'];?></td>
    		</tr>
    	</table>
    </div>
</div>
</body>
</html>