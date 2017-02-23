<?php
require_once "include.php";
checkLogined();
$username=$_SESSION['username'];
$sql="select * from notice";
$noticeQuery=mysql_query($sql);
$noticeCount=mysql_num_rows($noticeQuery);
$rows=mysql_fetch_array($noticeQuery);
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>系统通知</title>
    <link type="text/css" rel="stylesheet" href="css/reset.css">
    <link type="text/css" rel="stylesheet" href="css/mainContent.css">
</head>
<body>
<div class="content">
    <div class="title">
        <h2>系统通知</h2>
    </div>
    <div class="user_notice">
        <table width="100%" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th width="20%">发布时间</th>
                    <th>发布人</th>
                    <th>标题</th>
                    <th>内容</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if($noticeCount===0){
                        ?>
                            <tr><td colspan="6" style="text-align: center;">暂无数据</td></tr>
                        <?php
                    }else{
                        for ($i=0;$i<$noticeCount;$i++) {
                            ?>
                                <tr>
                                    <th><?php echo mysql_result($noticeQuery, $i,"addTime");?></th>
                                    <th><?php echo mysql_result($noticeQuery, $i,"nAdder");?></th>
                                    <th><?php echo mysql_result($noticeQuery, $i,"title");?></th>
                                    <th><?php echo mysql_result($noticeQuery, $i,"nContent");?></th>
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