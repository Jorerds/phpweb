<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Request;
$requset=Request::instance();

//请求对象的属性注入
$requset->siteName='PHP学习编程';

//请求对象的方法注入
function    getSiteName(Request $request)//第一个参数必须是Request类型的变量
{
    return  '站点名称：'.$request->siteName;
}

//注册请求对象的方法，也叫钩子
Request::hook('getSiteName','getSiteName');

// 应用公共文件
function    my_check()
{
    $domain=\think\Config::get('set_domain');
    if ($domain){
        return  true;
    }else{
        return false;
    }
}

//创建公共获取值方法
function    getTime($id)
{
    $result=\think\Db::table('staff')
        ->find($id);
    return  $result['time'];
}