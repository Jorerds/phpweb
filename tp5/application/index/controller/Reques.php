<?php
//依赖注入
namespace app\index\controller;
use think\Request;

class Reques extends  Request
{
    protected  $lesson;
    public function __construct(Request $request)
    {
        $this->request=Request::instance();
    }

    public function demo1()
    {
        return  '学习：'.$this->request->param('lession');
    }
    public function demo2()
    {
        return  '学习：'.$this->request->param('lession');
    }
}