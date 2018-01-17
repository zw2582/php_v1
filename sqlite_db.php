<?php
$db = new SQLite3('test.db');
$db->exec('create table a()');