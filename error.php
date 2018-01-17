<?php
error_reporting(E_ALL);
ini_set('display_errors', false);

/*
 * 定义自定义错误
 * 自定义错误能够捕获到哪些级别的错误？除了E_ERROR,E_PARSE,E_CORE_ERROR,E_CORE_WARNING,E_COMPILE_ERROR,E_COMPILE_WARNING
 * 以及定义文件所在的大部分E_STRICT
 * 自定义错误处理后如果不退出，程序是否会继续执行？会继续执行
 */
function myErrorHandler($level, $error, $file, $line) {
    echo "wei get error:error_level:$level,error:$error,in file:$file, on line:$line", PHP_EOL;
    
    //如果是通知错误或抑制错误则不退出
    if ($level === E_NOTICE || error_reporting()===0) {
        return;
    }
    exit();
}
set_error_handler('myErrorHandler', E_ALL);

/*
 * 自定义异常捕获
 */
function myExceptionHandler($e) {
    echo "wei get exception:{$e->getMessage()},in file:{$e->getFile()},on line:{$e->getLine()},code:{$e->getCode()}", PHP_EOL;
}
set_exception_handler('myExceptionHandler');

/*
 * 致命错误捕获
 * 如果不退出会怎么样,程序也不会往下执行
 */
function fatalErrorHandler() {
    $error = error_get_last();
    if (!empty($error)) {
        extract($error);
        echo "wei get a fatal error type:$type,message:$message,in file:$file, on line:$line", PHP_EOL;
    }
}
register_shutdown_function('fatalErrorHandler');

/*
 * 未定义符号错误，当只是未定义变量或常量时，产生通知错误；如果未定义类和函数将产生致命错误，并终止程序
 */
/* $d = new Caca();
echo 'caca'; */
/* echo $i;

@mysqli_connect('caca');

echo 'caca';  */