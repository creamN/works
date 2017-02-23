<?php
require_once "include.php";
checkAdmin();
$sql="select * from message";
$mesQuery=mysql_query($sql);
$mesCount=mysql_num_rows($mesQuery);
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>用户留言</title>
    <link type="text/css" rel="stylesheet" href="css/reset.css">
    <link type="text/css" rel="stylesheet" href="css/backContent.css">
</head>
<body>
<div class="content">
    <div class="title">
        <h2>用户留言</h2>
    </div>
    <div class="mes_list">
        <table width="100%" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th width="12%">序号</th>
                    <th width="12%">留言人</th>
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
                        for($i=0;$i<$mesCount;$i++){
                            ?>
                                <tr>
                                    <td><?php echo $i+1;?></td>
                                    <td><?php echo mysql_result($mesQuery, $i,"username");?></td>
                                    <td><?php echo date("Y-m-d",strtotime( mysql_result($mesQuery, $i,"addTime")));?></td>
                                    <td><?php echo mysql_result($mesQuery, $i,"mContent");?></td>
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