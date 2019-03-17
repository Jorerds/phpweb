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
    //创建方法判断用户是否登录
    protected function isLogin()
    {
        if (empty(USER_ID)){
            $this->error('用户未登录，无权访问！',url('user/login'));
        }
    }
    //创建方法防止重复登录
    protected function alreadyLogin()
    {
        if(!empty(USER_ID)){
            $this->error('用户已经登录，请不要重新登录！',url('index/index'));
        }
    }
    //创建公共方法检验是否为超级管理员admin
    protected function checkAdmin()
    {
        if (USER_INFO['name']!='admin'){
            $this->error('用户权限不足，无法进行操作！',url('index/index'));
        }
    }
    
}
