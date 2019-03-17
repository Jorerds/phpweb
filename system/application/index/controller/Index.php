<?php
namespace app\index\controller;
use app\index\controller\Base;

class Index extends Base
{
    public function index()
    {
        $this->assign([
           'title'=>'学校管理系统',
           'keywords' =>'学校系统,管理系统,系统',
            'description'=>'学校管理系统'
        ]);
        $this->isLogin();   //公共方法 判断用户是否登录
        return  $this->view->fetch();
    }
}
