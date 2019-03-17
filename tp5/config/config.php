<?php
return  [
    // 应用调试模式
'app_debug' =>true,
    // 应用Trace
    'app_trace'              => true,
    // 是否开启路由
    'url_route_on'           => true,
    // 默认的访问控制器层
    'url_controller_layer'   => 'controller',
    // URL参数方式 0 按名称成对解析 1 按顺序解析
    'url_param_type'         => 0,

    // 入口自动绑定模块
    'auto_bind_module'       => true,
    // 控制器类后缀
    'controller_suffix'      => false,
    // 是否自动转换URL中的控制器和操作名
    'url_convert'            => true,

    // 默认的空控制器名
    'empty_controller'       => 'Error',

    'set_domain'        =>  'www.baidu.com',

    'template'            =>[
        //开启模版布局
        'layout_on' =>  false,
        //设置布局模版文件名称
        'layout_name'   =>  'layout',
        //设置布局模板中的替换字符串：默认{__CONTENT__}
        'layout_item'   =>  '{__CONTENT__}'
    ]
];