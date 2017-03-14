<div class="header">
    <div class="inside">
        <a class="logo fl" href="index.php">米米金融</a>
        <span class="title fl">
        <?php
            $url=$_SERVER['PHP_SELF'];
            $urlName=substr($url,strpos($url,'?'));
            if($urlName==="/myProject/index.php"){
                echo "首页";
            }elseif($urlName==="/myProject/product.php"){
                echo "投资理财";
            }elseif($urlName==="/myProject/productList.php"){
                echo "同类产品";
            }elseif($urlName==="/myProject/productDetail.php"){
                echo "产品详情";
            }
        ?>
        </span>
        <ul class="nav">
            <li><a href="index.php">首页</a></li>
            <li><a href="product.php">投资理财</a></li>
            <li><a href="backstage.php">后台管理</a></li>
        </ul>
    </div>
</div>
