<?php
require_once "include.php";
$query=mysql_query("select * from admin");
$rowsCount=mysql_num_rows($query);
if($rowsCount===0){
	alertMes("没有管理员，请添加！","addAdmin.php");
}
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>管理员列表</title>
<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/backstage.css">
</head>
<body>
<div class="details">
	<!--表格-->
	<table class="table" cellspacing="0" cellpadding="0">
		<thead>
			<tr>
				<th width="15%">编号</th>
				<th width="25%">管理员名称</th>
				<th width="30%">管理员权限</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
		    <?php
		    	for($i=0;$i<$rowsCount;$i++){
		    	    ?>
		    		    <tr>
		    		    	<td><?php echo $i+1;?></td>
		    		    	<td><?php echo mysql_result($query,$i,'adminName');?></td>
				            <td>
					            <?php 
					                if(mysql_result($query,$i,'isSuper')=="YES"){
					                    echo "超级管理员";
					                }else{
					                    echo "普通管理员";
					                }
					            ?>
				            </td>
				            <td style="text-align:center;"><input type="button" value="删除" class="btn"  onclick="delAdmin(<?php echo $i;?>)"></td>
		    	    	</tr>
		    	    <?php
		    	}
		      			
		    ?>
		</tbody>
	</table>
</div>
</body>
<script type="text/javascript">
	function addAdmin(){
		window.location="addAdmin.php";	
	}
	function delAdmin(id){
			if(window.confirm("您确定要删除吗？删除之后不可以恢复哦！！！")){
				window.location="doAdminAction.php?act=delAdmin&id="+id;
			}
	}
</script>
</html>