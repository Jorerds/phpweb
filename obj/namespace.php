<?php
//命名空间
namespace test1;
const SITE_NAME='PHP编程';
function    sum($a,$b){
    return  $a+$b;
}
class Staff
{
    private $name='Joker';
    public function __get($name)
    {
        return  $this->$name;
    }
    public function __set($name, $value)
    {
        return  $this->$name=$value;
    }
}

namespace test2;
const SITE_NAME='PHP';
function    sum($a,$b){
    return  $a+$b;
}
class Staff
{
    private $name='Paker';
    public function __get($name)
    {
        return  $this->$name;
    }
    public function __set($name, $value)
    {
        return  $this->$name=$value;
    }
}

echo '当前命名空间：'.__NAMESPACE__;
echo '<hr>';
echo SITE_NAME;  //非限定名称的命名空间
echo '<hr>';
echo sum(10,20);
echo '<hr>';
$obj=new Staff();
echo $obj->name;
echo '<hr>';
echo '命名空间test1：'.\test1\SITE_NAME;  //用反斜杠的方法来访问指定命名空间
echo '<hr>';
$obj1=new \test1\Staff(); //完全限定名称的命名空间
echo $obj1->name;
echo '<hr>';
echo \test1\sum(5,5);