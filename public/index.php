<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

foreach($_GET as $key => $value){
    sql_check($value);
}
foreach ($_POST as $key => $value) {
    sql_check($value);
}
foreach ($_COOKIE as $key => $value) {
    sql_check($value, $key, $value);
}
function sql_check($sql_str, $cookie_key = null, $cookie_value = null) {
    // 自动过滤 SQL 的注入语句
    $check = preg_match('/select|EXEC|convert|declare|char|truncate|database|and|exec|sleep|cmd|where|set|alter|table|script|\'|\\*|\*|\.\.\/|\.\/|union|into|load_file|outfile/i', $sql_str);
    if ($check) {
        if ($cookie_key) {
            setcookie($cookie_key, 'deleted', $_SERVER['REQUEST_TIME']);
        }
        header('Location: /');
        exit();
    }
}

// [ 应用入口文件 ]

// 定义应用目录
define('APP_PATH', __DIR__ . '/../application/');
// 加载框架引导文件
require __DIR__ . '/../thinkphp/start.php';
