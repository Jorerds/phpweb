<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\Staff;

class Vias  extends Controller
{
//+----------------------继承控制器基类Controller----------------------
    public function index()
    {
        //$this->>view  ====>视图对象
//        $this->view->assign('siteName','PHP');
//        $this->view->assign('domain','www.php.net');
        //简化：
        $this->assign('siteName','PHP');
        $this->assign('domain','www.php.net');
        //渲染摸版
//        return  $this->view->fetch();
        //简化：
        return  $this->fetch();
    }
    public function demo1()
    {
        $dataStaff=[];
        $staff=Staff::all(function ($query){
            $query->where([
                'salary'=>['>',2000],
            ]);
        });
        foreach ($staff as  $value){
            $dataStaff[]=$value;
        }
        $this->assign('dataStaff',$dataStaff);
        return  $this->fetch('',[],[
            '__CSS__'=>'/static/css'
        ]);

    }
    public function demo2()
    {
        return  $this->fetch();
    }
    //模板继承演示
    public function demo3()
    {
        return  $this->fetch();
    }
}