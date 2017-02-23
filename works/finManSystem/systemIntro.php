<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>系统信息</title>
</head>
<body>
    <h3 style="text-align: center">系统信息</h3>
    <table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc" style="margin: 0 auto;">
        <tr>
            <th>操作系统</th>
            <td><?php echo PHP_OS;?></td>
        </tr>
        <tr>
            <th>Apache版本</th>
            <td><?php echo apache_get_version();?></td>
        </tr>
        <tr>
            <th>PHP版本</th>
            <td><?php echo PHP_VERSION;?></td>
        </tr>
        <tr>
            <th>运行方式</th>
            <td><?php echo PHP_SAPI;?></td>
        </tr>
    </table>
    <h3 style="text-align: center">软件信息</h3>
    <table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc" style="margin: 0 auto">
        <tr>
            <th>系统名称</th>
            <td>米米金融理财管理系统</td>
        </tr>
        <tr>
            <th>设计与实现</th>
            <td>倪倩钰</td>
        </tr>
        <tr>
            <th>指导老师</th>
            <td>郭莹</td>
        </tr>
    </table>
</body>
</html>