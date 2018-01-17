<?php
$host = 'localhost';
$user = 'root';
$passwd = '';
$db = 'test';

echo 'memory:'.memory_get_usage(), PHP_EOL;
//链接数据库
$conn = mysqli_connect($host, $user, $passwd, $db);
if (!$conn) {
    //连接数据库失败
    exit( mysqli_connect_error());
}
$conn->set_charset('UTF8');