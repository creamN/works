<?php 
//图片上传函数
function uploadFile($fileInfo,$path="uploads",$allowExt=array("gif","jpeg","png","jpg","wbmp"),$maxSize=2097152,$imgFlag=true){
	//判断要存放的文件夹是否存在
	if(!file_exists($path)){
		mkdir($path,0777,true);
	}
	if($fileInfo['error']==UPLOAD_ERR_OK){   //$error其值为0,没有错误发生,文件上传成功。
	    //判断上传的文件是否符合要求
		$ext=getExt($fileInfo['name']); 
		if(!in_array($ext,$allowExt)){  
			exit("非法文件类型");
		}
		if($fileInfo['size']>$maxSize){
			exit("上传文件过大");
		}
		//验证图片是否是一个真正的图片：getimagesize($fileInfo['name'])验证文件是否是图片类型
		if($imgFlag){
			$info=getimagesize($fileInfo['tmp_name']);
			if(!$info){
				exit("不是真正的图片类型");
			}
		}
		//判断文件是否是通过http post方式上传的		
		if(!is_uploaded_file($fileInfo['tmp_name'])){
			exit("不是通过HTTP POST方式上传上来的");
		}
		$filename=getUniName().".".$ext;
		$destination=$path."/".$filename;
		//上传图片
		if(move_uploaded_file($fileInfo['tmp_name'],$destination)){
			$mes="文件上传成功";
			return $destination;   //上传成功则返回图片路径
		}else{
			$mes="文件上传失败";
		}
	}else{
		switch ($file['error']) {
		    case 1:
		        $mes="超过了配置文件上传文件的大小";//UPLOAD_ERR_INI_SIZE
		        break;
		    case 2:
		        $mes="超过了表单设置上传文件的大小";//UPLOAD_ERR_FORM_SIZE
		        break;
		    case 3:
		    	$mes="文件部分被上传";//UPLOAD_ERR_PARTIAL
		    	break;
		    case 4:
		    	$mes="没有文件被上传";//UPLOAD_ERR_NO_FILE
		    	break;
		    case 6:
		    	$mes="没有找到临时目录";//UPLOAD_ERR_NO_TMP_DIR
		    	break;		
		    case 7:
		    	$mes="文件不可写";//UPLOAD_ERR_CANT_WRITE;
		    	break;
		    case 8:
		    	$mes="由于PHP的扩展程序中断了文件上传";//UPLOAD_ERR_EXTENSION
		    	break;
	    }
	}
}


