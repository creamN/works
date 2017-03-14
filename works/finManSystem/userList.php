<?php
require_once "include.php";
checkAdmin();
$sql="select * from user";
$query=mysql_query($sql);
$rowsCount=mysql_num_rows($query);
$rows=fetchAll($sql);
if(!$rows){
	alertMes("没有会员！","backstage.php");
}
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
				<th width="12%">编号</th>
				<th width="15%">会员账号名</th>
				<th width="15%">会员姓名</th>
				<th width="25%">会员余额</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
			<!--这里的id和for里面的c1 需要循环出来-->
		    <?php
		        for($i=0;$i<$rowsCount;$i++){
		        	?>
		        	    <tr>
		        	    	<td><?php echo $i+1;?></td>
		        	    	<td><?php echo mysql_result($query,$i,'username');?></td>
		        	    	<td><?php echo mysql_result($query,$i,'name');?></td>
		        	    	<td><?php echo mysql_result($query,$i,'yuE');?></td>
		        	    	<td>
		        	    		<input type="button" value="详情" class="btn"  onclick="userDetail(<?php echo mysql_result($query,$i,'id');?>)">
		        	    		<?php
		        	    		    if(mysql_result($query,$i,'ischeck')==="YES"){
		        	    		    	?>
		        	    		    	    <input type="button" value="充值" class="btn"  onclick="charge(<?php echo mysql_result($query,$i,'id');?>)">
		        	    		    	<?php
		        	    		    }else{
		        	    		    	?>
		        	    		    	    <input type="button" value="审核" class="btn"  onclick="userCheck(<?php echo mysql_result($query,$i,'id');?>)">
		        	    		    	<?php		        	    		    	
		        	    		    }
		        	    		?>		        	    		
		        	    	</td>
		        	    </tr>
		        	<?php
		        }
			?>
		</tbody>
	</table>
</div>
</body>
<script type="text/javascript">
	function userDetail(id){
		window.location="userDetail.php?id="+id;		
	}
	function charge(id){
		window.location="charge.php?id="+id;
	}
	function userCheck(id){
		window.location="doAdminAction.php?act=userCheck&id="+id;
	}	
</script>
</html>