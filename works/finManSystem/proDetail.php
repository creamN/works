//弃用
<?php
require_once "include.php";
checkAdmin();
$id=$_REQUEST['id'];
$sql="select * from product where id='$id'";
$query=mysql_query($sql);
$rows=mysql_fetch_array($query);
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>后台产品详情</title>
    <link type="text/css" rel="stylesheet" href="css/reset.css">
    <link type="text/css" rel="stylesheet" href="css/backContent.css">
</head>
<body>
<div class="content">
    <div class="title">
        <h2>产品详情</h2>
    </div>
    <div class="userDetail">
    	<table class="table" cellpadding="0" cellspacing="0">
    		<tr>
    			<th>产品编号</th>
    			<td><?php echo $rows['pNumber'];?></td>
    			<td rowspan="10"><!--<img src="<?php echo $rows['pPhoto'];?>" alt="用户头像"/>--></td>
    		</tr>
    		<tr>
    			<th>产品名称</th>
    			<td><?php echo $rows['pName'];?></td>
    		</tr>
    		<tr>
    			<th>产品类别</th>
    			<td><?php echo $rows['pCate'];?></td>
    		</tr>
    		<tr>
    			<th>产品利率</th>
    			<td><?php echo $rows['pRate']*100;?>%</td>
    		</tr>
    		<tr>
    			<th>产品销量</th>
    			<td><?php echo $rows['sales'];?></td>
    		</tr>
    		<tr>
    			<th>产品总量</th>
    			<td><?php echo $rows['Ptotal'];?></td>
    		</tr>
    		<tr>
    			<th>产品余量</th>
    			<td><?php echo $rows['Premain'];?></td>
    		</tr>
    		<tr>
    			<th>产品简介</th>
    			<td><?php echo $rows['pDesc'];?></td>
    		</tr>
    		<tr>
    			<th>发布人</th>
    			<td><?php echo $rows['publisher'];?></td>
    		</tr>
    		<tr>
    			<th>发布时间</th>
    			<td><?php echo $rows['addTime'];?></td>
    		</tr>
    	</table>
    </div>
</div>
</body>
</html>