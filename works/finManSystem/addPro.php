<?php
require_once "include.php";
checkAdmin();
$query=mysql_query("select id,cate from category");
$rowsCount=mysql_num_rows($query);
if($rowsCount===0){
	alertMes("请先添加产品分类","addCate.php");
}
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>添加产品</title>
    <link type="text/css" rel="stylesheet" href="css/reset.css">
    <link type="text/css" rel="stylesheet" href="css/backContent.css">
</head>
<body>
<div class="content">
    <div class="title">
        <h2>添加产品</h2>
    </div>   
    <div class="add">
    	<form action="doAdminAction.php?act=addPro" method="post" enctype="multipart/form-data">
    	    <table class="table" cellpadding="0" cellspacing="0">
    		    <tr>
    		    	<th>产品编号</th>
    		    	<td><input class="proTxt" type="text" name="pNumber"/></td>
    		    </tr>
    		    <tr>
    		    	<th>产品名称</th>
    		    	<td><input class="proTxt" type="text" name="pName"/></td>
    		    </tr>
    		    <tr>
    		    	<th>产品类别</th>
    		    	<td>
    		    		<select name="pCate">
    		    			<?php
    		    			    for($i=0;$i<$rowsCount;$i++){
    		    			    	?>
    		    			    	    <option value="<?php echo mysql_result($query,$i,'cate');?>"><?php echo mysql_result($query,$i,'cate');?></option>
    		    			    	<?php
    		    			    }
    		    			?>
    		    		</select>
    		    	</td>
    		    </tr>   
    		    <tr>
    		    	<th>产品利率</th>
    		    	<td><input class="proTxt" type="text" name="pRate"/></td>
    		    </tr>  
    		    <tr>
    		    	<th>产品库存</th>
    		    	<td><input class="proTxt" type="text" name="Ptotal"/></td>
    		    </tr>
    		    <tr>
    		    	<th>产品介绍</th>
    		    	<td><textarea rows="6" cols="50" name="pDesc"></textarea></td>
    		    </tr>   
    		    <tr>
    			    <th>图像</th>
    			    <td><input type="file" name="file"/></td>
    		    </tr>  
    		    <tr>
    		    	<th>上架与否</th>
    		    	<td>
    		    		<input type="radio" name="isShow" value="YES" checked="checked"/>是
    		    		<input type="radio" name="isShow" value="NO"/>否
    		    	</td>
    		    </tr>
                <tr>
                    <th style="text-align:center" colspan="2"><button type="submit" class="submit">立即添加</button></th>
                </tr> 		  		 		    		  		 		
    	    </table>
        </form>
    </div>   
</div>
</body>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
    //提交按钮点击事件
    $(".submit").click(function(){
        if($(".table input").val()===""||$(".table textarea").val()===""){
            alert("请填写完整！");
            return false;
        }
    });
});
</script>
</html>