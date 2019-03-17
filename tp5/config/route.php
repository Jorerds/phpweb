<?php
/*************************设置路由规则*********************/
use think\Route;




//自定义路由规则 注意 开启后路由规则后不能再用默认的PATH_INFO方法访问
//Route::rule('demo','test/test/demo');
//Route::rule('demo/:lesson','test/test/demo','GET',['ext'=>'shtml'],['lesson'=>'\w{1,10}']);
//Route::rule('index/:lesson','index/index/hello','GET',['ext'=>'shtml'],['lesson'=>'\w{1,10}']);


//在路由规则中用数组的方式传递URL地址
return  [
    //全局变量规则
    '__pattern__'=>[
      'age'=>'\d{2}',
    ],

    //加上[]括号为可选变量
//  'test/:name/[:lesson]'=>['test/test/test',['method'=>'get','ext'=>'shtml'],['name'=>'\w{3,8}','lesson'=>'\w{1,10}']],
    'index/:lesson'=>['index/index/hello',['method'=>'get','ext'=>'shtml'],['lesson'=>'\w{1,10}']],
//    'user'=>['index/user/user',['method'=>'get','callback'=>'my_check','domain'=>'tp5.com']],
    'data/:name/:age'=>['index/index/data',['method'=>'get'],['name'=>'[a-zA-Z]+']],

    //路由分组
    '[user]'=>[
        ':id'=>['index/user/user1',['method'=>'get'],['id'=>'\d{2,4}']],
        ':name'=>['index/user/user2',['method'=>'get'],['name'=>'[a-zA-Z]+']],
        ':isOk'=>['index/user/user3',['method'=>'get'],['isOk'=>'0|1']],
    ],

];

//直接路由到：操作方法
//加了@符跳过了配置文件，不会读取模块配置的变量
//语法规则：Route::rule('路由规则','@模块/控制器/操作');
Route::get('test/:name','@test/test/test?lesson=JAVA','GET',['ext'=>'shtml'],['name'=>'\w{3,8}','lesson'=>'\w{1,10}']);

//直接路由到：类的方法
//语法规则：Route::rule('路由规则','\完整命名空间\类名@动态操作');
//                  Route::rule('路由规则','\完整命名空间\类名::静态操作');
Route::rule('demo','\app\Demo@demo');

//直接路由到：闭包函数
//    语法规则：Route::rule('路由规则',function([参数]){
//       //闭包函数代码
//    });
Route::rule('myfunc',function (){
   return   '跳转的闭包函数内容！';
});

//直接路由到：重定向地址
//  语法规则：Route::rule('路由规则','重定向地址');
//  注意  / 符号是指根目录public目录下
//  如果要跳转站外地址 填写完整的http地址
Route::rule('demo1','/demo1.php');


/********************路由参数*************************/
//   1、请求类型：['method'=>'get|post'];
// 如果已经注册声明类型则无需设置：Route::get()/post()



//   2、URL后缀：['ext'=>'html|shtml']/['deny_ext'=>'php'];
// ['deny_ext'=>'']是禁止的URL后缀


//  3、回调函数：['callback'=>'回调函数名称'];
//          回调函数写在应用公共方法中：common.php

//  4、域名检测：['domain'=>'tp5.com'];

/************************路由变量规则**************************/
//路由变量规则必须是第四个参数
//用正则表达式的方法来创建路由规则
//全局变量规则
//Route::pattern([
//   'age'=>'\d{2}'
//]);


/*路由分组*/
//分组规则：Route::group('分组名称',[路由地址,[路由参数],[变量规则]])
//                  return['规则'=>[路由地址,[路由参数],[变量规则]]]
//Route::group('uesr',[
//    ':id'=>['index/user/user1',['method'=>'get'],['id'=>'\d{2,4}']],
//    ':name'=>['index/user/user2',['method'=>'get'],['name'=>'[a-zA-Z]+']],
//    ':isOk'=>['index/user/user3',['method'=>'get'],['isOk'=>'0|1']],
//  ]);

//用闭包
//   Route::group('user',function (){
//    Route::get(':id','index/user/user1',[],['id'=>'\d{2,4}']);
//    Route::get(':name','index/user/user2',[],['name'=>'[a-zA-Z]+']);
//    Route::get(':isOk','index/user/user3',[],['isOk'=>'0|1']);
//   });

//虚拟分组
//Route::group(['name'=>'user','method'=>'get','prefix'=>'index/user/'],[
//    ':id'=>['user1',[],['id'=>'\d{2,4}']],
//    ':name'=>['user2',[],['name'=>'[a-zA-Z]+']],
//    ':isOk'=>['user3',[],['isOk'=>'0|1']],
//]);
//改造的虚拟分组
Route::group('user',[
    //设定URL规则
    ':id'=>'user1',
    ':name'=>'user2',
    ':isOk'=>'user3',
    ],[
        'method'=>'get',
        'prefix'=>'index/user/'
    ],[
        'id'=>'\d{2,4}',
        'name'=>'[a-zA-Z]+',
        'isOk'=>'0|1'
]);


/*别名路由（不支持变量规则）*/
//1、动态方法：Route::alias('规则名称','模块/控制器',[路由参数])

//Route::alias('math','index/test1',[
//    //设置路由访问白名单：allow允许访问的方法
////    'allow'=>'add,sub',
//    //设置路由访问黑名单：except不允许访问的方法
//    'except'=>'div',
//]);


//静态数组：return[
//      '__alias__'=>['规则名称','模块/控制器',[路由参数]]
//  ];
//静态改造
//return  [
//  '__alias__'=>[
//    'math'=>['index/test1','except'=>'div',],
//  ],
//];