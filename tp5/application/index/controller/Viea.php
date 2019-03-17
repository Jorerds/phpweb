<?php
namespace app\index\controller;
use think\View;

class Viea
{
//+--------------------创建视图---------------------
    public function index()
    {
        //动态创建
//        $view=new View();
        //静态创建
        $view = View::instance();
        //摸版赋值
        $view->assign('domain', 'www.php.net');
        //渲染摸版
        return $view->fetch();
    }

}