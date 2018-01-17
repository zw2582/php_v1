<?php
require 'error.php';
require 'conn.php';
/*
 * 预备语句的使用
 */

//定义预备语句模板
$stmt = mysqli_prepare($conn, "select id,price from integle_e_order_pro limit ?");
//绑定输入变量
$stmt->bind_param('i', $limit);
//赋值输入变量
$limit = 1000;
//执行预备语句
if (!$stmt->execute()){
    var_dump($stmt->errno,$stmt->error);
}

//缓存结果集到客户端,只有将结果存储到客户端才能使用data_seek定位,但同时它会占用php的内存
// $stmt->store_result();

//输出内存大小
echo 'memory:'.memory_get_usage(), PHP_EOL;

//输出结果集总数
echo "num_rows:{$stmt->num_rows}", PHP_EOL;

//绑定输出变量
$stmt->bind_result($id, $price);

$stmt->data_seek(998);
while ($stmt->fetch()) {
    echo $id.',',$price,PHP_EOL;
}

$result = $stmt->get_result();
var_dump($result);