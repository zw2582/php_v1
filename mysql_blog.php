<?php
require 'error.php';
require 'conn.php';

if ($stmt = $conn->prepare('insert into blog(name,img) value(?,?)')) {
    $null = NULL;
    $stmt->bind_param('sb', $name, $null);
    $name='nidaye';
    $null = 'sdfsdf';
    $handle = fopen('assets/1.txt', 'rb');
    while (!feof($handle)) {
        $stmt->send_long_data(0, fread($handle, 1024));
    }
    fclose($handle);
    
    if (!$stmt->execute()) {
        echo $stmt->error();
    }
}