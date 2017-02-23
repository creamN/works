<?php
require_once "include.php";
checkAdmin();
$sql="select * from chargeList";
$query=mysql_query($sql);
$rowCount=mysql_num_rows($query);
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>会员列表</title>
<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/backstage.css">
</head>
<body>
<div class="details">
	<!--表格-->
	<table class="table" cellspacing="0" cellpadding="0">
		<thead>
			<tr>
				<th width="13%">编号</th>
				<th width="17%">会员账号</th>
				<th width="17%">充值金额</th>
				<th width="17%">充值人员</th>
				<th>充值时间</th>
			</tr>
		</thead>
		<tbody>
			<?php
			    if($rowCount===0){
			        ?>
			            <tr><td colspan="5" style="text-align:center;">没有充值记录</td></tr>
			        <?php
			    }else{
			    	for($i=0;$i<$rowCount;$i++){
			    		?>
			    		    <tr align="center">
			    		    	<td><?php echo $i+1;?></td>
			    		    	<td><?php echo mysql_result($query, $i,"user");?></td>
			    		    	<td><?php echo mysql_result($query, $i,"money");?></td>
			    		    	<td><?php echo mysql_result($query, $i,"adder");?></td>
			    		    	<td><?php echo mysql_result($query, $i,"addTime");?></td>
			    		    </tr>
			    		<?php
			    	}
			    }
			?>
		</tbody>
	</table>
	<p class="noteNum">共<em><?php echo $rowCount; ?></em>条记录</P>	
</div>
</body>
</html>