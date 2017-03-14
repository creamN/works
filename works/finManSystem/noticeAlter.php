<?php
require_once "include.php";
checkAdmin();
$id=$_REQUEST['id'];
$rows=mysql_fetch_array(mysql_query("select * from notice where id='$id'"));
?>
<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>通知修改</title>
    <link type="text/css" rel="stylesheet" href="css/reset.css">
    <link type="text/css" rel="stylesheet" href="css/backContent.css">
</head>
<body>
<div class="content">
    <div class="title">
        <h2>通知修改</h2>
    </div>
    <div class="alter">
        <form name="form" method="post" action="doAdminAction.php?act=noticeAlter&id=<?php echo $id;?>" enctype="multipart/form-data">
            <table class="table" cellpadding="0" cellspacing="0">
                <tr>
                    <th style="width:20%;">通知主题</th>
                    <td style="width:48%;" class="td1"><input name="title" class="inputTxt" type="text" value="<?php echo $rows['title'];?>"/></td>
                    <td rowspan="6">
                        <div class="proPic">
                            <img src="<?php echo $rows['bannerPath'];?>" alt="通知图片">
                            <input type="file" name="file"/>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>发布人</th>
                    <td class="td1"><input name="nAdder" class="inputTxt" type="text" value="<?php echo $rows['nAdder'];?>"/></td>
                </tr>               
                <tr>
                    <th>通知概述</th>
                    <td class="td1"><input name="nAbstract" class="inputTxt" type="text" value="<?php echo $rows['nAbstract'];?>"/></td>
                </tr>
                <tr>
                    <th>通知内容</th>
                    <td class="td1"><textarea name="nContent"><?php echo $rows['nContent'];?></textarea></td>
                </tr>
                <tr>
                    <th>展示与否</th>
                    <td class="td1">
                        <input type="radio" name="isShow" value="<?php echo $rows['isShow'];?>" checked="checked"/>
                        <?php
                            if($rows['isShow']==="YES"){
                                echo "展示";
                            }else{
                                echo "隐藏";
                            }
                        ?>
                        <input type="radio" name="isShow" value="<?php
                            if($rows['isShow']==="YES"){
                                echo "隐藏";
                            }else{
                                echo "展示";
                            }
                        ?>"/>
                        <?php
                            if($rows['isShow']==="YES"){
                                echo "隐藏";
                            }else{
                                echo "展示";
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <th style="text-align:center" colspan="3"><button type="submit" class="submit">修改</button></th>
                </tr>
            </table>
        </form>
    </div>
</div>
</body>
</html>