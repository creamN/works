<?php
require_once "include.php";
checkLogined();
$id=$_REQUEST['id'];
$sql="select * from `order` where `id`='$id'";
$query=mysql_query($sql);
$rows=mysql_fetch_array($query);
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>订单详情</title>
    <link type="text/css" rel="stylesheet" href="css/reset.css">
    <link type="text/css" rel="stylesheet" href="css/mainContent.css">
</head>
<body>
<div class="content">
    <div class="title">
        <h2>订单详情</h2>
    </div>
    <div class="order_detail">
    	<table class="table" cellpadding="0" cellspacing="0">
    		<tr>
    			<th width="20%">订单号</th>
    			<td width="60%"><?php echo $rows['id']?></td>
    		</tr>
    		<tr>
    			<th>产品编号</th>
    			<td><?php echo $rows['pNumber'];?></td>
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
    			<td><?php echo $rows['pRate'];;?></td>
    		</tr>
    		<tr>
    			<th>投入金额</th>
    			<td><?php echo $rows['pCount'];?></td>
    		</tr>
    		<tr>
    			<th>投资时间</th>
    			<td><?php echo $rows['addTime'];?></td>
    		</tr>
    		<?php
    		    if($rows['isExpire']==="YES"){
    		    	?>
    		    	    <tr>
    		    	    	<th>订单状态</th>
    		    	    	<td><?php echo "计息结束";?></td>
    		    	    </tr>
    		    	    <tr>
    		    	    	<th>卖出时间</th>
    		    	    	<td><?php echo $rows['soldTime'];?></td>
    		    	    </tr>      		    	    
    		    	    <tr>
    		    	    	<th>已获收益</th>
    		    	    	<td><?php echo $rows['earn'];?></td>
    		    	    </tr>    		    	    
    		    	<?php
    		    }else{
    		    	?>
    		    	    <tr>
    		    	    	<th>订单状态</th>
    		    	    	<td><?php echo "计息中";?></td>
    		    	    </tr>    		    	    
    		    	    <tr>
    		    	    	<th>可获收益</th>
    		    	    	<td>
    		    	    		<?php
    		    	    		    $addTime=strtotime($rows['addTime']);
    		    	    		    $days=round((time()-$addTime)/3600/24);
    		    	    		    $earn=round($rows['pCount']*$rows['pRate']*$days/365,2);
    		    	    		    echo $earn;
    		    	    		?>
    		    	    	</td>
    		    	    </tr>    		    	    
    		    	<?php    		    	
    		    }
    		?>
    	</table>
    </div>
</div>
</body>
</html>