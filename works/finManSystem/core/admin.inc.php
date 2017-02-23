<?php
/*检查管理员是否存在  用户名与密码是否匹配*/
function checkAdmin(){
	if(!isset($_SESSION['adminId'])||empty($_SESSION['adminId'])){
		alertMes("请先登录","adminLog.php");
	}
}

/*添加管理员*/
function addAdmin(){
	$adminName=$_POST['adminName'];
	$adminPwd=$_POST['adminPwd'];
	$isSuper=$_POST['isSuper'];
	if($isSuper==="YES"){
		$isSuper="YES";
	}else{
		$isSuper="NO";
	}
	//echo $adminName."<br/>".$adminPwd."<br/>".$isSuper;
	if($adminName==""||$adminPwd==""){
		echo "<script>javascript:alert('请输入完整！');history.back();</script>";
	}else{
		$sql="select adminName from admin where adminName='$adminName'";
		$query=mysql_query($sql);
		$rowsCount=mysql_num_rows($query);
		if($rowsCount){
			echo "<script>javascript:alert('对不起，该管理员已存在！');history.back();</script>";
		}else{
			$sql="insert into admin(adminName,adminPwd,isSuper) values('$adminName','$adminPwd','$isSuper')";
			mysql_query($sql);
			echo "添加成功!<br/><a href='addAdmin.php'>继续添加</a>|<a href='adminList.php'>查看管理员列表</a>";
		}
	}
}

//修改管理员密码
function changePwd(){
	$adminName=$_SESSION['adminName'];
	$rows=mysql_fetch_array(mysql_query("select * from admin where 	adminName='$adminName'"));
	//$oldPwd=md5($_POST['oldPwd']);
	$oldPwd=$_POST['oldPwd'];
	//$newPwd=md5($_POST['newPwd']);
	$newPwd=$_POST['newPwd'];
	/*echo "旧密码：".$oldPwd."<br/>";
	echo "新密码：".$newPwd."<br/>";
	echo "数据库存储的密码：".$rows['adminPwd']."<br/>";*/
	if($oldPwd!==$rows['adminPwd']){
		echo "<script>javascript:alert('原密码输入错误，请重新输入！');history.back();</script>";
	}else{
		$query=mysql_query("update admin set adminPwd='$newPwd' where adminName='$adminName'");
		if($query){
			echo "<script>javascript:alert('修改成功！');history.back();</script>";
		}else{
			echo "<script>javascript:alert('修改失败！');history.back();</script>";
		}
	}
}

//注销管理员登录
function logout(){
	$_SESSION['adminId']="";
    $_SESSION['adminName']="";
	alertMes("注销成功","index.php");
}

//删除管理员
function delAdmin($id){
	$sql="delete from admin where id='$id'";
	$query=mysql_query($sql);
	$rowsCount=mysql_affected_rows();
	//echo $rowsCount;
	if($rowsCount){
		echo "删除成功!<br/><a href='adminList.php'>查看管理员列表</a>";
	}else{
		echo "删除失败!<br/><a href='adminList.php'>请重新删除</a>";
	}
}

//会员审核
function userCheck($id){
    $sql="update user set ischeck='YES' where id='$id'";
    $query=mysql_query($sql);
    if($query){
	    echo "<script>javascript:alert('审核完成！');history.back();</script>";
    }else{
	    echo "<script>javascript:alert('审核失败！');history.back();</script>";
    }	
}

//给会员充值
function doCharge($id,$money){
	$sql="select * from user where id='$id'";
    $row=mysql_fetch_array(mysql_query($sql));
    $adder=$_SESSION['adminName'];
    $username=$row['username'];
    $yuE=$row['yuE']+$money;
    $chargeQuery=mysql_query("insert into chargeList(user,adder,money) values('$username','$adder','$money')");
    if($chargeQuery){
    	$query=mysql_query("update `user` set `yuE`='$yuE' where `id`='$id'");
    	if($query){
    		echo "充值成功!<br/><a href='userList.php'>返回会员列表查看</a>|<a href='chargeRecord.php'>查看充值记录</a>";
    	}else{
    		echo "<script>javascript:alert('充值失败！');history.back();</script>";
    	}
    }else{
    	echo "<script>javascript:alert('充值记录插入失败！');history.back();</script>";
    }
}


//添加产品分类
function addCate(){
	$cate=$_POST['cate'];
	$cateDec=$_POST['cateDec'];	
	$sql="insert into category(cate,cateDec) values('$cate','$cateDec')";
	$query=mysql_query($sql);
	if($query){
		echo "<script>javascript:alert('添加成功！');history.back();</script>";
	}else{
		echo "<script>javascript:alert('添加失败！');history.back();</script>";
	}
}


//添加产品
function addPro(){
	$pNumber=$_POST['pNumber'];
	$sql="select * from product where pNumber='{$pNumber}'";
	if(mysql_num_rows(mysql_query($sql))>0){
		echo "<script>javascript:alert('该编号的产品已经存在！');history.back();</script>";
	}else{
    	$fileInfo=$_FILES['file'];
    	$path="proAlbum";
    	$pPhoto=uploadFile($fileInfo,$path);
    	if($pPhoto&&$pPhoto!==""){
    		$pName=$_POST['pName'];
    		$pCate=$_POST['pCate'];
    		$pRate=$_POST['pRate'];
    	    $Ptotal=$_POST['Ptotal'];
    	    $pDesc=$_POST['pDesc'];
    	    $isShow=$_POST['isShow'];
    	    $publisher=$_SESSION['adminName'];
    		$proQuery=mysql_query("insert into product(pNumber,pName,pCate,publisher,pRate,pPhoto,Ptotal,Premain,pDesc,isShow) values('$pNumber','$pName','$pCate','$publisher','$pRate','$pPhoto','$Ptotal','$Ptotal','$pDesc','isShow')");
    		if($proQuery){
    			echo "产品添加成功!<br/><a href='addPro.php'>返回继续添加</a>|<a href='proList.php'>查看产品列表</a>";
			}else{	
				echo "<script>javascript:alert('产品添加失败，请重新添加！');history.back();</script>";
			}
    	}else{
    		echo "<script>javascript:alert('产品图片上传失败，请重新添加！');history.back();</script>";
    	}
	}
}

//修改产品
function proAlter($id){
	//判断有无修改产品图片
	$fileInfo=$_FILES['file'];
	if($fileInfo['name']!==""&&$fileInfo['size']!==""){
		$path="proAlbum";
		$pPhoto=uploadFile($fileInfo,$path);
		if($pPhoto&&$pPhoto!==""){
			$photoQuery=mysql_query("update product set pPhoto='$pPhoto' where id='$id'");
			if(!$photoQuery){
				echo "<script>javascript:alert('图片上传失败，请重新上传！');history.back();</script>";
			}
		}
	}
	$pNumber=$_POST['pNumber'];
	$pName=$_POST['pName'];
	$pCate=$_POST['pCate'];
	$pRate=$_POST['pRate'];
	$pDesc=$_POST['pDesc'];
	if($_POST['isShow']==="YES"){
		$isShow="YES";
	}else{
		$isShow="NO";
	}
	$sql="update product set pNumber='$pNumber',pName='$pName',pCate='$pCate',pRate='$pRate',pDesc='$pDesc',isShow='$isShow' where id='$id'";
    $query=mysql_query($sql);
    if($query){
	    echo "<script>javascript:alert('修改成功，返回查看！');history.back();</script>";
    }else{
	    echo "<script>javascript:alert('修改失败，重新修改！');history.back();</script>";
    }
}

//删除产品
function proDel($id){
	$sql="delete from product where id='$id'";
	$query=mysql_query($sql);
	$rowsCount=mysql_affected_rows();
	//echo $rowsCount;
	if($rowsCount){
		echo "<script>javascript:alert('删除成功！');history.back();</script>";
	}else{
		echo "<script>javascript:alert('删除失败！');history.back();</script>";
	}	
}

//添加通知
function addNotice(){
    $fileInfo=$_FILES['file'];
    $path="noticeAlbum";
    $bannerPath=uploadFile($fileInfo,$path);
    if($bannerPath&&$bannerPath!==""){
    	$title=$_POST['title'];
    	$nAbstract=$_POST['nAbstract'];
    	$nContent=$_POST['nContent'];
    	$isShow=$_POST['isShow'];
    	$nAdder=$_SESSION['adminName'];
    	$noteQuery=mysql_query("insert into notice(title,nContent,nAdder,bannerPath,nAbstract,isShow) values('$title','$nContent','$nAdder','$bannerPath','$nAbstract','$isShow')");
    		if($noteQuery){
    			echo "通知添加成功!<br/><a href='addNotice.php'>返回继续添加</a>|<a href='noticeList.php'>查看系统通知</a>";
			}else{	
				echo "<script>javascript:alert('产品添加失败，请重新添加！');history.back();</script>";
			}
    }else{
    	echo "<script>javascript:alert('通知图片上传失败，请重新添加！');history.back();</script>";
    }
	
}

//修改通知
function noticeAlter($id){
	//判断有无修改通知图片
	$fileInfo=$_FILES['file'];
	if($fileInfo['name']!==""&&$fileInfo['size']!==""){
        $path="noticeAlbum";
        $bannerPath=uploadFile($fileInfo,$path);
		if($bannerPath&&$bannerPath!==""){
			$bannerQuery=mysql_query("update notice set bannerPath='$bannerPath' where id='$id'");
			if(!$bannerQuery){
				echo "<script>javascript:alert('通知图片上传失败，请重新上传！');history.back();</script>";
			}
		}
	}
	$title=$_POST['title'];
	$nAdder=$_POST['nAdder'];
	$nAbstract=$_POST['nAbstract'];
	$nContent=$_POST['nContent'];
	if($_POST['isShow']==="YES"){
		$isShow="YES";
	}else{
		$isShow="NO";
	}
	$addTime=time();
	$sql="update notice set title='$title',nContent='$nContent',nAdder='$nAdder',addTime='$addTime',bannerPath='$bannerPath',isShow='$isShow' where id='$id'";
    $query=mysql_query($sql);
    if($query){
	    echo "<script>javascript:alert('修改成功，返回查看！');history.back();</script>";
    }else{
	    echo "<script>javascript:alert('内容修改失败，重新修改！');history.back();</script>";
    }		
}


//删除通知
function delNotice($id){
	$sql="delete from notice where id='$id'";
	$query=mysql_query($sql);
	$rowsCount=mysql_affected_rows();
	if($rowsCount){
		echo "<script>javascript:alert('删除成功！');history.back();</script>";
	}else{
		echo "<script>javascript:alert('删除失败！');history.back();</script>";
	}	
}