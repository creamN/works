﻿<?php
header("content-type:text/html;charset=utf-8");
//设定字符集
mysql_query('set names utf8');         
//设置时区
date_default_timezone_set("PRC");
session_start();
define("ROOT",dirname(__FILE__));
//_SEPARATOR路径分隔符
set_include_path(".".PATH_SEPARATOR.ROOT."/lib".PATH_SEPARATOR.ROOT."/core".PATH_SEPARATOR.ROOT."/configs".PATH_SEPARATOR.get_include_path());
require_once 'mysql.func.php';
require_once 'image.func.php';
require_once 'string.func.php';
require_once 'common.func.php';
require_once 'configs.php';
require_once 'admin.inc.php';
require_once 'user.inc.php';
require_once 'upload.func.php';
connect();