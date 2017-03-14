<?php 
require_once 'include.php';
$id=$_REQUEST['id'];
$sql="select * from category where id='{$id}'";
$rows=mysql_fetch_array(mysql_query($sql));
$cate=$rows['cate'];
$sql="select * from product where pCate='{$cate}' and isShow='YES'";
if(mysql_num_rows(mysql_query($sql))){
    $results=fetchAll($sql);
}else{
    echo "<script>javascript:alert('没有该类产品！');history.back();</script>";
}
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
<?php require_once "top.php"; ?>
<!--header-->
<?php require_once "header.php"; ?>
<!--product-->
<div class="product same_cate">
	<div class="inside">
		<div class="title"><h2><?php echo $cate;?></h2></div>  
		<ul class="pro_list">
		    <?php  foreach($results as $result):?>
                <li class="same_pro">
                	<h4><?php echo $result['pName']."  ".$result['pNumber'];?></h4>
                	<div class="list_l fl">             	
                		<ul>
                			<li>年化利率<span><em><?php echo $result['pRate']*100;?>%</em></span></li>
                			<li>收益方式<span>一次性还本付息</span></li>
                			<li>产品简介<span><?php echo $result['pDesc'];?></span></li>
                		</ul>
                	</div>
                	<div class="list_r fr">
                		<span>可投金额&nbsp;&nbsp;<em><?php echo $result['Premain'];?></em>&nbsp;元</span>
                		<a href="productDetail.php?id=<?php echo $result['id'];?>">查看详情</a>
                	</div>                 
                </li>
            <?php endforeach;?>    
		</ul>
	</div>   	  		     	                  
</div>
</body>
</html>