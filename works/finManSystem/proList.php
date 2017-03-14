<?php
require_once "include.php";
checkAdmin();
$sql="select * from product";
$query=mysql_query($sql);
$rowCount=mysql_num_rows($query);
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>后台产品列表</title>
<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/backstage.css">
</head>
<body>
<div class="details">
	<!--表格-->
	<table class="table" cellspacing="0" cellpadding="0">
		<thead>
			<tr>
				<th width="7%">编号</th>
				<th width="13%">产品编号</th>
				<th width="13%">产品名称</th>
				<th width="13%">是否在售</th>
				<th width="23%">发布时间</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
			<?php
			    if($rowCount===0){
			        ?>
			            <tr align="center"><td colspan="6">暂无产品</td></tr>
			        <?php
			    }else{
			    	for($i=0;$i<$rowCount;$i++){
			    		?>
			    		    <tr align="center">
			    		    	<td><?php echo $i+1;?></td>
			    		    	<td><?php echo mysql_result($query, $i,"pNumber");?></td>
			    		    	<td><?php echo mysql_result($query, $i,"pName");?></td>			    		    	
			    		    	<td>
			    		    		<?php 
			    		    		    if(mysql_result($query,$i,'isShow')==="YES"){
			    		    		    	echo "在售中";
			    		    		    }else{
			    		    		    	echo "已下架";
			    		    		    }
			    		    		?>
			    		    	</td>
			    		    	<td><?php echo mysql_result($query, $i,"addTime");?></td>
			    		    	<td>
			    		    	    <input type="button" value="修改" class="btn"  onclick="proAlter(<?php echo mysql_result($query, $i,"id");?>)">
			    		    	    <input type="button" value="删除" class="btn"  onclick="proDel(<?php echo mysql_result($query, $i,"id");?>)">
			    		    	</td>			    		    	
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
<script type="text/javascript">
	//修改产品信息
	function proAlter(id){
		window.location="proAlter.php?id="+id;
	}
    //删除产品
	function proDel(id){
		window.location="doAdminAction.php?act=proDel&id="+id;
	}
</script>
</html>