<?php
namespace app\index\controller;
use think\Controller;


class Demo  extends  Controller
{
    //前置方法列表，继承自Controller
    protected $beforeActionList=[
        'before1'=>'',//为空，表示before1是当前类中的全部操作的前置操作
        'before2'=>['only'=>'demo2'], //only意思是只限于指定的方法调用
        'before3'=>['except'=>'demo1,demo2'],//except排除这些方法，仅对除了这些方法以外的操作有效
    ];
    protected $sitName;
    protected function before1()
    {
//        $this->sitName='php';
        $this->sitName  = $this->request->param('name');
    }
    protected function before2()
    {
        $this->sitName='ThinkPHP';
    }
    protected function before3()
    {
        $this->sitName='JAVA';
    }
    public function demo1()
    {
        return  $this->sitName;
    }
    public function demo2()
    {
        return  $this->sitName;
    }
    public function demo3()
    {
        return  $this->sitName;

    }
}