<?php
require_once "include.php";
checkAdmin();
$sql="select * from notice";
$noteQuery=mysql_query($sql);
$noteCount=mysql_num_rows($noteQuery);
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>系统通知</title>
    <link type="text/css" rel="stylesheet" href="css/reset.css">
    <link type="text/css" rel="stylesheet" href="css/backContent.css">
</head>
<body>
<div class="content">
    <div class="title">
        <h2>系统通知</h2>
    </div>
    <div class="note_list">
        <table width="100%" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th width="12%">序号</th>
                    <th width="15%">发布人</th>
                    <th width="25%">主题</th>
                    <th>发布时间</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if($noteCount===0){
                        ?>
                            <tr><td colspan="6" style="text-align: center;">暂无数据</td></tr>
                        <?php
                    }else{
                        for($i=0;$i<$noteCount;$i++){
                            ?>
                                <tr>
                                    <td><?php echo $i+1;?></td>
                                    <td><?php echo mysql_result($noteQuery, $i,"nAdder");?></td>
                                    <td><?php echo mysql_result($noteQuery, $i,"title");?></td>
                                    <td><?php echo date("Y-m-d",strtotime( mysql_result($noteQuery, $i,"addTime")));?></td>
                                    <td>
                                        <input type="button" value="修改" class="btn"  onclick="noticeAlter(<?php echo mysql_result($noteQuery, $i,"id");?>)">
                                        <input type="button" value="删除" class="btn"  onclick="delNotice(<?php echo mysql_result($noteQuery, $i,"id");?>)">
                                    </td>
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
<script type="text/javascript">
    function noticeAlter(id){
        window.location="noticeAlter.php?id="+id;
    }
    function delNotice(id){
            if(window.confirm("您确定要删除吗？删除之后不可以恢复哦！！！")){
                window.location="doAdminAction.php?act=delNotice&id="+id;
            }
    }
</script>
</html>