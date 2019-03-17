<?php
namespace  app\index\controller;

class User
{
    public function user()
    {
        return  'user方法';
    }
    public function user1($id)
    {
        return  'user1方法，$id='.$id;
    }
    public function user2($name)
    {
        return  'user2方法，$name='.$name;
    }
    public function user3($isOk)
    {
        return  'user3方法，$isOk='.$isOk;
    }
}