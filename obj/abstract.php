<?php
//抽象类：抽象类不能单独调用、不能实例化只能由子类所调用
//抽象类的关键词是abstract
abstract class Demo
{
    public $name;
    public function __construct($name)
    {
        $this->name=$name;
    }
    abstract public function  test();
    abstract public function seit();
    public function haost()
    {
        return  '我这个是普通方法';
    }
}

class Demo1 extends Demo
{
    //必须在子类中将抽象类中的全部抽象方法全部实现才可以
    public function test()
    {
        return  'test'.$this->name;
    }
    public function seit()
    {
        return  'seit'.$this->name;
    }

}
$obj=new Demo1('Java');
echo    $obj->test();
echo '<hr>';
echo $obj->seit();