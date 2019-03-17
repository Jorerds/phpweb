<?php
namespace app\test\controller;
use think\Config;
use think\Controller;

class Test extends Controller
{
     public function demo()
     {

         return 'dadas';
     }

     public function test($name,$lesson)
     {
        $domain= \think\Config::get('set_domain');
        $this->assign('domain',$domain);
         $this->assign('lesson',$lesson);
         $this->assign('name',$name);
         return $this->fetch();
     }
}
