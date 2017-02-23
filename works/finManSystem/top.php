<div class="top">
    <div class="inside">
        <div class="fl">
            <span class="fl">
                欢迎您！&nbsp;&nbsp;
                <?php
                    if(isset($_SESSION['username'])){
                        echo $_SESSION['username'];
                    }
                ?>
            </span>
        </div>
        <div class="fr">
            <?php
                if(isset($_SESSION['username'])&&$_SESSION['username']!==""){
                    ?>
                        <a class="login fl" href="main.php">个人中心</a>
                        <a class="login fl" href="doAction.php?act=userOut">注销</a>
                    <?php
                }else{
                    ?>                       
                        <a class="register fl" href="userReg.php">注册</a>
                        <a class="login fl" href="userLog.php">登录</a>
                    <?php                    
                }
            ?>
        </div>
    </div>
</div>