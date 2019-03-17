<?php
namespace app\index\controller;

class UserLogin
{
    use \traits\controller\Jump;
    public function index($name)
    {
        if ($name=='php'){
            $this->success('正在跳转到百度！','http://baidu.com','',3);
        }else{
            return  '参数错误！';
        }
    }
}