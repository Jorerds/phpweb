<?php
//应用入口文件

//自定义应用目录
define('APP_PATH', __DIR__ . '/../application/');
//自定义配置目录 默认是读取application目录下的配置文件
define('CONF_PATH',__DIR__.'/../config/');
// 加载框架引导文件
require __DIR__ . '/../thinkphp/start.php';
