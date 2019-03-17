<?php
//构造方法：是用来实例化类，创建对象
class Staff     //声明一个员工类
{
    public $name;   //名字
    public $age;    //年龄
    public $salary;     //工资
    //构造方法使用固定的方法名：__construct()
    public function __construct($name,$age,$salary)
    {
        //构造方法：通常是用来初始化对象中的属性
        $this->name =   $name;
        $this->age  =   $age;
        $this->salary   =   $salary;
    }
    //析构方法：对象销毁时自动调用，没有参数，__destruct()
    public function __destruct()
    {
        echo '当前对象销毁';
    }
}

//创建一个对象，来访问类中的属性
$obj    =   new Staff('老王',50,8500);
echo '姓名：'.$obj->name;
echo '<hr>';
echo '年龄：'.$obj->age;
echo '<hr>';
echo '工资：'.$obj->salary;
echo '<hr>';