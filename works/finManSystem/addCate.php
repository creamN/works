<?php
require_once "include.php";
checkAdmin();
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>添加分类</title>
    <link type="text/css" rel="stylesheet" href="css/reset.css">
    <link type="text/css" rel="stylesheet" href="css/backContent.css">
</head>
<body>
<div class="content">
    <div class="title">
        <h2>添加分类</h2>
    </div>
    <div class="addCate">
    	<form action="doAdminAction.php?act=addCate" method="post">
    	    <table class="table" cellpadding="0" cellspacing="0">
    		    <tr>
    		    	<th>分类名称</th>
    		    	<td><input class="cate" type="text" name="cate"/></td>
    		    </tr>
    		    <tr>
    		    	<th>分类简介</th>
    		    	<td><input class="cateDec" type="text" name="cateDec"/></td>
    		    </tr>
                <tr>
                    <td style="text-align:center" colspan="2"><button type="submit" class="submit">立即添加</button></td>
                </tr>
    	    </table>
        </form>
    </div>
</div>
</body>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
    $(".submit").click(function(){
        if($(".table input").val()===""){
            alert("请填写完整！");
            return false;
        }
    });
});
</script>
</html>