<?php
require_once 'include.php';
$rows=fetchAll("select * from category");
$query=mysql_query("select * from notice where isShow='YES' limit 0,6");
$rowscount=mysql_num_rows($query);?>
<!doctype html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>首页</title>
    <link type="text/css" rel="stylesheet" href="css/common.css">
    <link type="text/css" rel="stylesheet" href="css/index.css">
</head>
<body>
<!--top-->
<?php require_once "top.php"; ?>
<!--header-->
<?php require_once "header.php"; ?>
<!--banner-->
<div class="banner">
    <div class="switchAlpha">
        <ul class="list">           
            <?php 
                if($rowscount===0){
                    ?>
                        <li>
                            <img src="loading.gif"/>
                        </li>
                    <?php
                }else{
                    ?>
                        <li class="pic01 current">
                            <img src="<?php echo mysql_result($query, 0,"bannerPath");?>"/>
                        </li>
                    <?php
                    for($i=1;$i<$rowscount;$i++){
                        ?>
                            <li class="pic01">
                                <img src="<?php echo mysql_result($query, $i,"bannerPath");?>"/>
                            </li>
                        <?php
                    }
                }
            ?>
        </ul>
        <div class="dot">
            <a class="hover"></a>
            <?php
                for($i=2;$i<=$rowscount;$i++){
                    ?>
                        <a></a>
                    <?php
                }
            ?>
        </div>
    </div>
</div>
<!--guide-->
<a class="guide inside" href="">
    <h2>新手指引</h2>
    <ul class="guide_con">
        <li class="step step01">
            <span class="text">会员注册</span>            
        </li>
        <li class="step_arrow"></li>
        <li class="step step02">
            <span class="text">资料填写</span>
        </li>
        <li class="step_arrow"></li>
        <li class="step step03">
            <span class="text">账户充值</span>
        </li>
        <li class="step_arrow"></li>
        <li class="step step04">
            <span class="text">投资理财</span>
        </li>
    </ul>
</a>
<!--product-->
<div class="product">
    <ul class="inside pro_list"> 
        <?php  foreach($rows as $row):?>
            <li class="pro pro01">
                <h3><?php echo $row["cate"];?></h3>
                <span class="pro_intro">
                    <em>产品特色：</em>
                    <?php echo $row["cateDec"];?>
                </span>
                <a class="pro_detail" href="productList.php?id=<?php echo $row['id'];?>">查看全部</a>
            </li>
        <?php endforeach;?>                      
    </ul>
</div>
<!--footer-->
<?php include_once "footer.php"; ?>
</body>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/index.js"></script>
</html>
