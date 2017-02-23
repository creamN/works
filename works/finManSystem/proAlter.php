<?php
require_once "include.php";
checkAdmin();
$id=$_REQUEST['id'];
$rows=mysql_fetch_array(mysql_query("select * from product where id='$id'"));
?>
<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>产品修改</title>
    <link type="text/css" rel="stylesheet" href="css/reset.css">
    <link type="text/css" rel="stylesheet" href="css/backContent.css">
</head>
<body>
<div class="content">
    <div class="title">
        <h2>产品修改</h2>
    </div>
    <div class="alter">
        <form name="form" method="post" action="doAdminAction.php?act=proAlter&id=<?php echo $id;?>" enctype="multipart/form-data">
            <table class="table" cellpadding="0" cellspacing="0">
                <tr>
                    <th style="width:20%;">产品编号</th>
                    <td class="td1"><input name="pNumber" class="inputTxt" type="text" value="<?php echo $rows['pNumber'];?>"/></td>
                    <td rowspan="6">
                        <div class="proPic">
                            <img src="<?php echo $rows['pPhoto'];?>" alt="产品图片">
                            <input type="file" name="file"/>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>产品名称</th>
                    <td class="td1"><input name="pName" class="inputTxt" type="text" value="<?php echo $rows['pName'];?>"/></td>
                </tr>
                <tr>
                    <th>产品分类</th>
                    <td class="td1">
                         <select name="pCate">
                            <option value="<?php echo $rows['pCate'];?>"><?php echo $rows['pCate'];?></option>
                            <?php
                                $cate=$rows['pCate'];
                                $cateQuery=mysql_query("select cate from `category` where `cate`!='$cate'");
                                $cateCount=mysql_num_rows($cateQuery);
                                if($cateCount>0){
                                    for($i=0;$i<$cateCount;$i++){
                                        ?>
                                            <option value="<?php echo mysql_result($cateQuery,$i,'cate');?>"><?php echo mysql_result($cateQuery,$i,'cate');?></option>
                                        <?php
                                    }
                                }
                            ?>                            
                         </select> 
                    </td>
                </tr>
                <tr>
                    <th>产品利率</th>
                    <td class="td1"><input name="pRate" class="inputTxt" type="text" value="<?php echo $rows['pRate'];?>"/></td>
                </tr>   
                <tr>
                    <th>产品介绍</th>
                    <td class="td1"><textarea name="pDesc"><?php echo $rows['pDesc'];?></textarea></td>
                </tr> 
                <tr>
                    <th>上架与否</th>
                    <td class="td1">
                        <input type="radio" name="isShow" value="<?php echo $rows['isShow'];?>" checked="checked"/>
                        <?php
                            if($rows['isShow']==="YES"){
                                echo "上架";
                            }else{
                                echo "下架";
                            }
                        ?>
                        <input type="radio" name="isShow" value="<?php 
                            if($rows['isShow']==="YES"){
                                echo "NO";
                            }else{
                                echo "YES";
                            }
                        ?>"/>
                        <?php
                            if($rows['isShow']==="YES"){
                                echo "下架";
                            }else{
                                echo "上架";
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