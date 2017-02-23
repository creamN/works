<?php 
require_once 'include.php';
$id=$_REQUEST['id'];
$sql="select * from product where id='{$id}'";
$rows=mysql_fetch_array(mysql_query($sql));
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
<div class="product pro_detail">
	<div class="inside">
		<div class="title"><h2><?php echo $rows['pName']."  ".$rows['pNumber'];?></h2></div>  
        <ul class="detail_con fl">
        	<li class="proPic"><img src="<?php echo $rows['pPhoto'];?>" alt="<?php echo $rows['pName'];?>"/></li>
        	<li>
        		本期总额<span><em><?php echo $rows['Ptotal'];?></em>&nbsp;元</span>
        	</li>
        	<li>
        		年化利率<span><em><strong><?php echo $rows['pRate']*100;?></strong>%</em></span>
        	</li>
        </ul>
        <div class="pro_join fr">
            <p>可投金额：<span><em><?php echo $rows['Premain'];?></em>元</span></p>
            <form name="form" method="post" action="doBuy.php?id=<?php echo $rows['id'];?>">
                <?php
                    if($rows['Premain']>0){
                        ?>
                            <div class="pro_invest">
                                <input class="invest_num fl" placeholder="属于金额为10的整数倍" name="money"/>
                                <span class="fr">元</span>
                            </div>
                            <input class="join_btn" type="submit" value="加入"/>
                        <?php
                    }else{
                        ?>
                            <input class="join_btn" type="submit" value="已满标"/>
                        <?php                        
                    }                
                ?>                              
            </form>
        </div>
        </div>
	</div>   	  		     	                  
</div>
</body>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
    $(function(){
        var $joinVal=$(".join_btn").val();
        if($joinVal==="已满标"){
            $(".join_btn").addClass("join_not").removeClass("join_yes");            
        }else{
            $(".join_btn").addClass("join_yes").removeClass("join_no");
        }
        $(".join_btn").click(function(){
            if($joinVal==="已满标"){
                return false;
            }
        });  
    });
</script>
</html>