<?php
require 'error.php';

$db = new SQLite3('test.db');

$query=<<<EOF
insert into bar(bar) values('wocaca2')
EOF;
$db->exec($query);

$row = $db->querySingle('select * from bar');
print_r($row);