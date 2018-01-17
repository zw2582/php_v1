<?php
require 'error.php';
require 'conn.php';

/*
 * query在insert,update,delete语句中返回true/false，在select中返回result对象
 */

/* $result = $conn->query('insert blog(name)value("aaa")');
var_dump($result); */

$result = $conn->query('select * from blog');
var_dump(mysqli_fetch_all($result));

/* $result = $conn->query('update blog set name="ddd" where id = 1');
var_dump($result); */

/* $result = $conn->query('delete from blog where id = 1');
var_dump(mysqli_errno($conn));
var_dump(mysqli_error($conn));
var_dump($result); */