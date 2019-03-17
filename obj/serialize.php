<?php
class Staff
{
    public $name;
    public $age;
    public $salary;
    public function __construct($name,$age,$salary=0)
    {
        $this->name=$name;
        $this->age=$age;
        $this->salary=$salary;
    }
    public function __sleep()
    {
        //将允许序列化的对象属性放在一个数组中返回
        //当序列化对象属性是，将自动调用类的__sleep方法用来控制参与序列化的属性
        return['name','age'];
    }

    public function __wakeup()
    {
        //当对象进行反序列化时，将自动调用类的__wakeup()方法，对类的属性进行修改
        $this->age=34;
    }
}
$obj1=new Staff('老王',28,5000);
echo '序列化之前：我的姓名是：'.$obj1->name.'年龄：'.$obj1->age.'工资：'.$obj1->salary;
echo '<hr>';
//序列化对象
$objStr=serialize($obj1);
echo '序列化对象：'.$objStr;
echo '<hr>';
//反序列化
$obj2=unserialize($objStr);
echo  '我的姓名是：'.$obj2->name.'年龄：'.$obj2->age;
