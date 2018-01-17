<?php
// 1. 初始化
$ch = curl_init();
// 2. 设置选项，包括URL
curl_setopt($ch,CURLOPT_URL,"http://shop.integle.com/stock/shop/store-search?supplier_id=625&keyword=942918-07-2&pro_type=");
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_HEADER,0);
// 3. 执行并获取HTML文档内容
$output = curl_exec($ch);
if($output === FALSE ){
    echo "CURL Error:".curl_error($ch);
}
// 4. 释放curl句柄
curl_close($ch);
var_dump($output);