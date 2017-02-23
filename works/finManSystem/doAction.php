<?php
require_once "include.php";
$act=$_REQUEST['act'];
if($act==="reg"){  //注册
	reg();
}elseif($act==="login"){ //登录
	login();
}elseif($act==="userOut"){  //注销
	userOut();
}elseif($act==="alterPwd"){  //修改密码
 	alterPwd();
}elseif($act==="alertInfo"){  //修改信息
  	alertInfo();
}elseif($act==="leaveMes"){  //提交留言
   	leaveMes();
}elseif($act==="sellPro"){  //卖出产品
    $id=$_REQUEST['id'];
  	sellPro($id);
}elseif($act==="delOrder"){  //删除订单
    $id=$_REQUEST['id'];
   	delOrder($id);
}
?>
