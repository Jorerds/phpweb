<?php
namespace app\index\controller;
use app\index\controller\Base;
use app\index\model\landiKuaidiSend;
use think\Db;

class Index extends Base
{
/*-----------------渲染首页-------------*/
    public function index()
    {
        $this->assign([
            'title'=>'蓝帝社团',
            'keywords'=>'蓝帝社团,快递管理系统',
            'description'=>'蓝帝社团,阳江蓝帝科技有限公司'
        ]);
        $this->isLogin();
        return  $this->view->fetch();
    }
/*------------------首页显示渲染--------------*/
    public function indexV3()
    {
        $this->assign([
            'title'=>'蓝帝社团',
            'keywords'=>'蓝帝社团,快递管理系统',
            'description'=>'蓝帝社团,阳江蓝帝科技有限公司'
        ]);
        //数据库Db方式查询所有收入
        $list=Db::table('landi_kuaidi_send')->field('Freight')->select();
        $sum=0;
        //数组遍历方式所有数据
        foreach ($list as $key=>$value){
            //把所有数据相加得出总数
            $sum+=$value['Freight'];
        }
        $sendIncome=$sum;
    
        //计算上一年的收入
        $last=landiKuaidiSend::scope('Date','5')->field('Freight')->select();
        $lastYear=0;
        foreach ($last as $key=>$value) {
            $lastYear+=$value['Freight'];
        }
        //计算今年的收入
        $tis=landiKuaidiSend::scope('Date','6')->field('Freight')->select();
        $thisYear=0;
        foreach ($tis as $key=>$value){
            $thisYear+=$value['Freight'];
        }
        //得出增涨率
        $rose=getVal($thisYear,$lastYear);
        
        //模板赋值操作
        $this->view->assign([
           'rose'=>$rose,
           'sendIncome' =>$sendIncome,
            'thisYear'=>$thisYear,
        ]);
        return  $this->view->fetch('index_V3');
    }
    
/*------------测试用操作--------------------*/
    public function test()
    {
        //计算上一年的收入
        $last=landiKuaidiSend::scope('Date','5')->field('Freight')->select();
        $lastYear=0;
        foreach ($last as $key=>$value) {
            $lastYear+=$value['Freight'];
        }
        //计算今年的收入
        $tis=landiKuaidiSend::scope('Date','6')->field('Freight')->select();
        $thisYear=0;
        foreach ($tis as $key=>$value){
            $thisYear+=$value['Freight'];
        }
        //得出增涨率
        $rose=getVal($thisYear,$lastYear);
        return  $rose;
    }
}
