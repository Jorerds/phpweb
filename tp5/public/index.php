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

// [ 应用入口文件 ]

// 定义应用目录
define('APP_PATH', __DIR__ . '/../application/');

//自定义配置目录 默认是读取application目录下的配置文件
define('CONF_PATH',__DIR__.'/../config/');

//绑定到指定模块
//define('BIND_MODULE','index');
//绑定到指定模块下的控制器
//define('BIND_MODULE','index/test1');



// 加载框架引导文件
require __DIR__ . '/../thinkphp/start.php';
