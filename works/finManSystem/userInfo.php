<?php
require_once "include.php";
checkLogined();
$username=$_SESSION['username'];
$rows=mysql_fetch_array(mysql_query("select * from user where username='$username'"));
?>
<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>资料管理</title>
    <link type="text/css" rel="stylesheet" href="css/reset.css">
    <link type="text/css" rel="stylesheet" href="css/mainContent.css">
</head>
<body>
<div class="content">
    <div class="title">
        <h2>资料管理</h2>
    </div>
    <div class="infomation">
        <form name="form" method="post" action="doAction.php?act=alertInfo">
            <ul class="info_list">
                <li class="int">
                    <label>用户名</label>
                    <?php echo $rows['username'];?>
                </li>
                <li class="int">
                    <label for="realname">真实姓名</label>
                    <?php
                        if($rows['name']){
                            ?>
                                <input id="realname" name="realname" class="inputTxt" type="text" value="<?php echo $rows['name'];?>"/>
                            <?php
                        }else{
                            ?>
                                <input id="realname" name="realname" class="inputTxt" type="text" placeholder="添加真实姓名"/>
                            <?php
                        }
                    ?>                    
                </li>
                <li class="int">
                    <label for="phone">手机号</label>
                    <?php
                        if($rows['phone']){
                            ?>
                                <input id="phone" name="phone" class="inputTxt" type="te1" value="<?php echo $rows['phone'];?>"/>
                            <?php
                        }else{
                            ?>
                                <input id="phone" name="phone" class="inputTxt" type="tel" placeholder="添加手机号"/>
                            <?php
                        }
                    ?>                    
                </li>
                <li class="int">
                    <label for="sex">性别</label>
                    <select name="sex" id="sex">
                        <option value="<?php echo $rows['sex'];?>"><?php echo $rows['sex'];?></option>
                        <option value="<?php
                            if($rows['sex']==="男"){
                                echo $userSex="女";
                            }else{
                                echo $userSex="男";
                            }
                        ?>"><?php echo $userSex;?></option>
                    </select>                  
                </li> 
                <li class="int">
                    <label for="email">邮箱</label>
                    <?php
                        if($rows['email']){
                            ?>
                                <input id="email" name="email" class="inputTxt" type="email" value="<?php echo $rows['email'];?>"/>
                            <?php
                        }else{
                            ?>
                                <input id="email" name="email" class="inputTxt" type="email" placeholder="添加邮箱"/>
                            <?php
                        }
                    ?>                    
                </li>
                <li class="int">
                    <label for="address">地区</label>
                    <?php
                        if($rows['address']){
                            ?>
                                <input id="address" name="address" class="inputTxt" type="text" value="<?php echo $rows['address'];?>"/>
                            <?php
                        }else{
                            ?>
                                <input id="address" name="address" class="inputTxt" type="text" placeholder="添加地区"/>
                            <?php
                        }
                    ?>
                </li>                
                <li class="submit_box">
                    <button type="submit" class="submit" id="info_change">修改</button>
                </li>                               
            </ul>
        </form>        
    </div>
</div>
</body>
</html>