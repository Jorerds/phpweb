<?php
//trait类可以相互嵌套
//trait类：实现了一种代码复用的方法
//同一类中,同名方法访问优先级：子类>trait类>父类
//如果出现trait类的方法同名：
//  1、用替换的方法：被替换的类名::方法名 insteadof 替换的类名;
//  2、用起别名的方法访问：需要起别名的类名::方法名   as  自定义别名;
trait Test1
{
    public $name='PHP';//trait类中可以有属性，不能有类常量
    public function hello1()
    {
        return  'Test1::hello1()';
    }
}
trait Test2
{
    use Test1;
    public function hello2()
    {
        return  'Test2::hello2()'.$this->name;
    }
}
class Demo
{
    public function hello2()
    {
        return  '父类：Demo的hello2方法';
    }
}
class Demo1 extends Demo
{
    //用use来导入trait类，每个类之间用 , 号隔开
    //use相当于直接复制trait类里面的代码到这个类中
    use Test2;

}
$obj=new Demo1();
echo $obj->hello1();
echo '<hr>';
echo $obj->hello2();
echo '<hr>';
echo $obj->name;