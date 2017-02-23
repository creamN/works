<?php
require_once 'include.php';
$sql="select * from category";
$rows=fetchAll($sql);
?>
<!doctype html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>理财产品</title>
    <link type="text/css" rel="stylesheet" href="css/common.css">
    <link type="text/css" rel="stylesheet" href="css/product.css">
</head>
<body>
<!--top-->
<?php require_once "top.php"; ?>
<!--header-->
<?php require_once "header.php"; ?>
<!--product-->
<div class="product">
	<div class="inside">
		<div class="title"><h2>米米金融理财产品</h2></div>  
		<ul class="pro_list">
		    <?php  foreach($rows as $row):?>
                <li class="pro <?php echo "pro".$row['id'];?>">
                    <h2><?php echo $row["cate"];?></h2>
                    <div class="pro_con">
                    	<?php echo $row["cateDec"];?>                
                    	<a class="pro_detail" href="productList.php?id=<?php echo $row['id'];?>">查看全部</a>
                    </div>
                </li>
            <?php endforeach;?>    
		</ul>
	</div>   	  		     	                  
</div>
</body>
</html>
