<?php
namespace app\index\controller;
use think\Controller;
use think\Session;
class Base extends Controller
{
    protected function _initialize()
    {
        parent::_initialize();   //继承父类中的初始操作
        define('USER_ID',Session::get('user_id'));  //设置常量获取session值
        define('USER_INFO',Session::get('user_info'));
    }
    //验证是否登录
    protected function isLogin()
    {
        if (empty(USER_ID)){
            $this->error('未登录，无权访问',url('user/login'));
        }
    }
    //验证是否重复登录
    protected function alreadyLogin()
    {
        if (!empty(USER_ID)){
            $this->error('您已经登录了！请不要重复登录。',url('index/index'));
        }
    }
    

}