<?php
//生成验证码
function buildRandString($type=1,$length=4){
	if($type==1){
		//join把数组元素组合为一个字符串
		$chars=join("",range(0, 9));  
	}elseif($type==2){
		//array_merge() 函数把一个或多个数组合并为一个数组
		$chars=join("",array_merge(range("a", "z"),range("A","Z")));
	}elseif($type==3){
		$chars=join("",array_merge(range("a", "z"),range("A","Z"),range(0, 9)));
	}
	if ($length>strlen($chars)) {   //strlen返回字符串的长度
		exit("字符串长度不够");
	}
	$chars=str_shuffle($chars);   //随机地打乱字符串中的所有字符
	return substr($chars, 0, $length);  //函数返回字符串的0-$legth部分
}

//生成唯一字符串
function getUniName(){
	return md5(uniqid(microtime(true),true));
}

//得到文件扩展名
function getExt($filename){
	return strtolower(substr($filename,strrpos($filename,'.')+1));
}
