<?php

namespace app\index\controller;
use think\Controller;

class Base  extends Controller
{
    protected $sitName='PHP框架';
    protected function index()
    {
        return  '欢迎学习'.$this->sitName;
    }
}