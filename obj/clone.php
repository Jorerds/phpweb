<?php
//对象克隆
class   Demo
{
    public $name='Laste';
}
$obj1=new Demo;
$obj2=$obj1; //对象都是引用赋值
$obj3=clone $obj1;//克隆，相当于值传递赋值，将当前对象复制到新的变量中
$obj4=new Demo;
$obj1->name='Jack'; //重新设置对象$obj1中的属性name的值
echo '对象引用：'.$obj1->name.'------'.$obj2->name;
echo '<hr>';
echo '对象克隆：'.$obj1->name.'------'.$obj3->name;
echo '<hr>';
echo '创建对象：'.$obj1->name.'------'.$obj4->name;
echo '<hr>';
echo '克隆对象的类：'.get_class($obj3);
//克隆就是将当前对象复制一份镜像，与重新new 一个对象完全相同
//对象赋值是引用，仅仅是给当前对象起了一个别名，并没有创建新对象
//关键字clone克隆出的一个与原来对象毫无关系的一个新对象
//他比传统的new来创建一个对象更方便、简洁
