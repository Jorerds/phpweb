<?php
//页面跳转与重定向
namespace app\index\controller;
use think\Controller;

class Chack extends Controller
{
    public function index()
    {

    }
    public function hello($name)
    {
        if ($name=='admin')
        {
            //重定向
            //在跳转URL地址方法前面加上/和控制器名称即可实现跨控制器跳转，跨模块跳转也同理
            $this->redirect('ok',['siteName'=>'PHP编程']);
        }else{
//            $this->error('验证失败',\think\Url::build('login/login'));
            $this->redirect('http://baidu.com',302);//302是临时的重定向，301是永久的重定向
        }
    }
    public function ok($siteName)
    {
        return  '欢迎学习'.$siteName;
    }

}