<?php
require_once "include.php";
checkLogined();
$username=$_SESSION['username'];
$userInfo=mysql_fetch_array(mysql_query("select * from user where username='$username'"));
$orderSql="select * from `order` where pBuyer='$username'";
$orderQuery=mysql_query($orderSql);
$orderCount=mysql_num_rows($orderQuery);
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>我的订单</title>
    <link type="text/css" rel="stylesheet" href="css/reset.css">
    <link type="text/css" rel="stylesheet" href="css/mainContent.css">
</head>
<body>
<div class="content">
    <div class="title">
        <h2>我的订单</h2>
    </div>
    <div class="user_order">
        <ul class="income">
            <li class="benfit">
                已赚取
                <em>￥<?php echo $userInfo['earn'];?></em>
            </li>
            <?php
                $ungetQuery=mysql_query("select * from `order` where pBuyer='$username' and isExpire='NO'");
                $ungetCount=mysql_num_rows($ungetQuery);
                if($ungetCount===0){
                    ?>
                        <li class="asset"><p>待收本金<em>￥0.00</em></p></li>
                        <li><p>待收收益<em>￥0.00</em></p></li>
                    <?php
                }else{
                    $cost=0;$unearn=0;
                    for($i=0;$i<$ungetCount;$i++){
                        $pRate=mysql_result($ungetQuery, $i,"pRate");
                        $pCount=mysql_result($orderQuery, $i,"pCount");
                        $addTime=strtotime(mysql_result($ungetQuery, $i,"addTime"));
                        $days=round((time()-$addTime)/3600/24);
                        $earn=round($pCount*$pRate*$days/365,2);
                        $cost+=$pCount;
                        $unearn+=$earn;
                    }
                    ?>
                        <li class="asset"><p>待收本金<em>￥<?php echo $cost;?></em></p></li>
                        <li><p>待收收益<em>￥<?php echo $unearn;?></em></p></li>
                    <?php
                }
            ?>                                    
        </ul>
        <table width="100%" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th width="8%">序号</th>
                    <th width="14%">产品名称</th>
                    <th width="14%">年化利率</th>
                    <th width="14%">已投金额</th>
                    <th width="16%">下单时间</th>
                    <th width="14%">当前状态</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if($orderCount===0){
                        ?>
                            <tr><td colspan="7" style="text-align: center;">暂无订单</td></tr>
                        <?php
                    }else{                        
                        for($i=0;$i<$orderCount;$i++){                               
                            ?>
                                <tr>
                                    <td><?php echo $i+1;?></td>
                                    <td><?php echo mysql_result($orderQuery, $i,"pName");?></td>
                                    <td><?php echo mysql_result($orderQuery, $i,"pRate")*100;?>%</td>
                                    <td><?php echo mysql_result($orderQuery, $i,"pCount");?></td>
                                    <td>
                                        <?php 
                                            $addTime=strtotime(mysql_result($orderQuery, $i,"addTime"));
                                            echo date("Y-m-d",$addTime);
                                        ?>
                                    </td>
                                    <?php 
                                        if(mysql_result($orderQuery, $i,"isExpire")==="YES"){
                                            ?>
                                                <td>计息结束</td>
                                                <td style="text-align:center;">
                                                    <input type="button" value="详情" class="btn"  onclick="orderDetail(<?php echo mysql_result($orderQuery, $i,"id");?>)">
                                                    <input type="button" value="删除" class="btn"  onclick="delOrder(<?php echo mysql_result($orderQuery, $i,"id");?>)">
                                                </td>
                                            <?php
                                        }else{
                                            ?>
                                                <td>计息中</td>
                                                <td align="center">
                                                    <input type="button" value="详情" class="btn"  onclick="orderDetail(<?php echo mysql_result($orderQuery, $i,"id");?>)">
                                                    <input type="button" value="卖出" class="btn"  onclick="sellPro(<?php echo mysql_result($orderQuery, $i,"id");?>)">
                                                </td>
                                            <?php                                            
                                        }
                                    ?>                                   
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
	function orderDetail(id){//详情
		window.location="orderDetail.php?id="+id;
	}
    function sellPro(id){//卖出
        window.location="doAction.php?act=sellPro&id="+id;        
    }
	function delOrder(id){//删除
			if(window.confirm("您确定要删除吗？删除之后不可以恢复哦！！！")){
				window.location="doAction.php?act=delOrder&id="+id;
			}
	}
</script>
</html>