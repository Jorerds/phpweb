<?php
namespace  app\index\controller;
use think\Db;

class Test1
{
    public function add($a,$b)
    {
        return  $a.'+'.$b.'='.($a+$b);
    }
    public function sub($a,$b)
    {
        return  $a.'-'.$b.'='.($a-$b);
    }
    public function mult($a,$b)
    {
        return  $a.'*'.$b.'='.($a*$b);
    }
    public function div($a,$b)
    {
        return  $a.'/'.$b.'='.round(($a/$b),2);
    }


}