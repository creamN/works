<?php
require_once 'include.php';
checkAdmin();
$act=$_REQUEST['act'];
if($act=="logout"){  //注销
	logout();
}elseif($act=="addAdmin"){  //添加管理员
	addAdmin();
}elseif($act=="changePwd"){   //修改自身密码
	changePwd();
}elseif($act=="delAdmin"){   //删除管理员
 	$id=$_REQUEST['id'];
 	delAdmin($id);
}elseif($act=="userCheck"){    //给会员审核
 	$id=$_REQUEST['id'];
 	userCheck($id);
}elseif($act=="doCharge"){    //给会员充值
	$id=$_REQUEST['id'];
	$money=$_POST['money'];
	doCharge($id,$money);
}elseif($act=="addCate"){   //添加产品分类
  	addCate();
}elseif($act=="addPro"){   //添加产品
 	addPro();
}elseif($act=="proAlter"){   //修改产品
    $id=$_REQUEST['id'];
  	proAlter($id);
}elseif($act=="proDel"){   //删除产品
    $id=$_REQUEST['id'];
  	proDel($id);
}elseif($act=="addNotice"){   //添加通知
  	addNotice();
}elseif($act=="noticeAlter"){   //修改通知
    $id=$_REQUEST['id'];
  	noticeAlter($id);
}elseif($act=="delNotice"){   //删除通知
    $id=$_REQUEST['id'];
  	delNotice($id);
}