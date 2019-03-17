<?php
//接口
//在接口中成员：
//属性：类常量     方法：抽象方法
interface Demo1
{
    //接口成员属性必须是：类常量
    const SITENAME='编程网';
    //接口成员方法必须是抽象方法，而且访问控制符必须是public(可以省略)，abstract也可以省略
    function show();
    function mess();
}
interface Demo2
{
    function hello();
}
//接口不允许实例化，但可以被继承，所以需要创建一个类来继承接口，并实现接口中全部抽象方法
//php是单继承的语言，但可以通过接口技术继承至两个类
class Test implements Demo1,Demo2
{
    public function show()
    {
        return  '站点名称：'.self::SITENAME;
    }
    public function mess()
    {
        return  '站点域名：www.biancheng.com';
    }
    public function hello()
    {
        return  '你好！'.self::SITENAME;
    }
}
$obj=new Test();
echo $obj->show();
echo '<hr>';
echo $obj->hello();