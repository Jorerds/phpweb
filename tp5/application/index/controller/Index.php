<?php
namespace app\index\controller;
use think\Config;
use think\Controller;
use think\Request;


class Index extends \app\index\controller\Base
{

    protected $lesson;

//    //构造方法的方式
//    public function __construct($lesson = 'thinkphp5')
//    {
//        $this->lesson=$lesson;
//    }

    //think的初始化基类继承方法
    public function _initialize($lesson='thinkphp5')
    {
        $this->lesson=$lesson;
    }


    public function demo1()
    {
//        //构造方法的实例化
//        return  (new self('PHP'))->lesson;
        $this->_initialize('学习PHP');
        return  $this->lesson;

    }
    public function demo2()
    {
        return  parent::index();
    }
    public function demo3()
    {
        return  $this->sitName;
    }
    public function index()
    {

///*1、配置文件*/
//        //这是加载其他位置的配置文件 ini格式的写法 xml和jons都是用parse方法  如果是PHP格式的配置文件 则用load方法
//        \think\Config::parse(APP_PATH.'../config/extra/config.ini','ini');
//
//        //输入thinkPHP的配置信息（推荐用类方法）
//        dump(\think\config::get()); //这是类方法访问配置项
////        dump(config()); //这是助手函数访问配置项
//        echo '<hr>';
//
//        //判断配置参数是否存在（推荐用类方法）
//        dump(\think\Config::has('app_debug'));//类方法判断
////        dump(config('?app_debug'));//助手函数判断
//
//        echo '<hr>';
//        $conf='app_debug1';
//        $isConf=Config::has($conf);
//        if ($isConf){
//            dump(Config::get($conf));
//        }else{
//            dump($conf.'不存在');
//        }
//
//        echo '<hr>';
//        //动态配置项
//        Config::set('set_name','逐个配置set');//逐个配置
//        //批量配置
//        $setAll=[
//          'set_all1'=>'配置数组1',
//          'set_all2'=>'配置数组2',
//        ];
//        //二级配置：Config::set('app_info',$setAll);
//        Config::set($setAll);
//        //获取配置
//        dump(Config::get());

/*2、控制器*/
            return  '控制器';


    }

    public function hello($lesson)
    {
        $this->assign('lesson',$lesson);
        return  $this->fetch();

    }
    public function data($name,$age)
    {
        return  '我的姓名是：'.$name.'我的年龄是：'.$age;
    }


    //空方法
    public function _empty($method)
    {
        return  '访问的方法'.$method.'不存在';
    }

}
