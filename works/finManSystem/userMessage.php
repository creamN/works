<?php
require_once "include.php";
checkLogined();
$username=$_SESSION['username'];
$sql="select * from message where username='$username'";
$mesQuery=mysql_query($sql);
$mesCount=mysql_num_rows($mesQuery);
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>我的留言</title>
    <link type="text/css" rel="stylesheet" href="css/reset.css">
    <link type="text/css" rel="stylesheet" href="css/mainContent.css">
</head>
<body>
<div class="content">
    <div class="title">
        <h2>我的留言</h2>
    </div>
    <div class="user_mes">
        <table width="100%" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th width="25%">留言时间</th>
                    <th>留言内容</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if($mesCount===0){
                        ?>
                            <tr><td colspan="6" style="text-align: center;">暂无数据</td></tr>
                        <?php
                    }else{
                        for ($i=0;$i<$mesCount;$i++) {
                            ?>
                                <tr>
                                    <th><?php echo mysql_result($mesQuery, $i,"addTime");?></th>
                                    <th><?php echo mysql_result($mesQuery, $i,"mContent");?></th>
                                </tr>
                            <?php
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>