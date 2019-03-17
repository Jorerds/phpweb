<?php
//请求对象与参数绑定
namespace app\index\controller;
use think\Controller;

class Login extends Controller
{
    public function ok()
    {
        return  '欢迎使用后台管理系统';
    }
    public function login()
    {
        return  '登录页面';
    }
    public function hello($name,$lesson)
    {
        return  '欢迎'.$name.'学习'.$lesson;
    }
    public function demo($id='',$name='',$age=24)
    {
        $request= \think\Request::instance();
        //获取请求类型get()或者post()，param()为自动检测请求类型
        echo '获取请求类型：';
        dump($request->param());
        //获取URL地址（不包括域名），加上true就可以获取到包括域名的URL
        echo '获取URL地址（不包括域名），加上true就可以获取到包括域名的URL：';
        dump($request->url(true));
        //只获取当前域名
        echo '只获取当前域名：';
        dump($request->domain());
        //获取pathinfo方式的地址。包括后缀
        echo '获取pathinfo方式的地址。包括后缀：';
        dump($request->pathinfo());
        //获取纯pathinfo地址，不包括后缀
        echo '获取纯pathinfo地址，不包括后缀：';
        dump($request->path());
        //获取URL后缀
        echo '获取URL后缀：';
        dump($request->ext());
        //请求对象还可以获取当前MVC的访问信息
        //获取当前模块
        echo '获取当前模块：';
        dump($request->module());
        //获取当前控制器
        echo '获取当前控制器：';
        dump($request->controller());
        //获取当前操作
        echo '获取当前操作：';
        dump($request->action());
        //获取当前请求的类型
        echo '获取当前请求的类型：';
        dump($request->method());
        //获取当前请求IP
        echo '获取当前请求IP：';
        dump($request->ip());
        //只获取指定的变量请求变量
        echo '只获取id的请求变量：';
        dump($request->only('id'));
        //筛选排除掉指定请求变量
        echo '筛选排除掉id输出剩下的请求变量：';
        dump($request->except('id'));
    }

    //跨方法共享属性
//    public function demo1($name)
//    {
//        return  $this->request->param('name');
//    }
//    public function demo2()
//    {
//        return  $this->request->param('name');
//    }

    //利用对象的属性和方法注入
    public function demo1()
    {
        //获取注入的属性
        return  $this->request->siteName;
    }
    public function demo2()
    {
        //获取注入的方法
        return  $this->request->getSiteName();
    }
}