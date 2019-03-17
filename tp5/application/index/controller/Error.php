<?php
//创建的空控制器
namespace app\index\controller;

class Error
{
    public function test()
    {
        return  '访问的控制器不存在';
    }
    public function _empty($method)
    {
        return  '访问的方法'.$method.'不存在';
    }
}