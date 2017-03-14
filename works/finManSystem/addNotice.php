<?php
require_once "include.php";
checkAdmin();
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>添加通知</title>
    <link type="text/css" rel="stylesheet" href="css/reset.css">
    <link type="text/css" rel="stylesheet" href="css/backContent.css">
</head>
<body>
<div class="content">
    <div class="title">
        <h2>添加通知</h2>
    </div>
    <div class="add">
    	<form action="doAdminAction.php?act=addNotice" method="post" enctype="multipart/form-data">
    	    <table class="table" cellpadding="0" cellspacing="0">
    		    <tr>
    		    	<th>主题</th>
    		    	<td><input class="noteTxt" type="text" name="title"/></td>
    		    </tr>
    		    <tr>
    		    	<th>概要</th>
    		    	<td><input class="noteTxt" type="text" name="nAbstract"/></td>
    		    </tr>
    		    <tr>
    		    	<th>内容</th>
    		    	<td><textarea rows="6" cols="50" name="nContent"></textarea></td>
    		    </tr>
    		    <tr>
    			    <th>图像</th>
    			    <td><input type="file" name="file"/></td>
    		    </tr>
    		    <tr>
    		    	<th>显示与否</th>
    		    	<td>
    		    		<input type="radio" name="isShow" value="YES" checked="checked"/>显示
    		    		<input type="radio" name="isShow" value="NO"/>隐藏
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