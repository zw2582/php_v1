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

//无缓冲查询
$sql = "select order_id,price from integle_e_order_pro limit 2000";
$result = mysqli_query($conn, $sql, MYSQLI_USE_RESULT);

/* while ($data = mysqli_fetch_row($result)) {
    print_r($data);
} */
/* while ($data = mysqli_fetch_assoc($result)) {
    print_r($data);
} */
/* while ($data = mysqli_fetch_array($result)) {
    print_r($data);
} */
print_r(mysqli_fetch_row($result));
mysqli_free_result($result);
echo 'send another command',PHP_EOL;
$re = $conn->query('show profile');
var_dump($re);
var_dump(mysqli_error($conn));

echo 'memory:'.memory_get_usage(), PHP_EOL;