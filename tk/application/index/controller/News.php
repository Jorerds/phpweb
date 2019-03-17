<?php
/**
 * Created by PhpStorm.
 * User: 镜花水月
 * Date: 2019/3/17
 * Time: 12:12
 */
namespace app\index\controller;
use think\Db;

class News
{
    public function index()
    {
        $data=Db::query('select * from book');
//        dump($data);
        for ($x=0;$x<count($data);$x++){
            foreach($data[$x] as $i=>$i_value){
                echo 'key：'.$i.',value：'.$i_value;
            }
        }
        return '路由设定';
    }
}