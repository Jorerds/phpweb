<?php
//对象封装
//由于每个私有属性的读、改都分别需要设置一个方法 ，所以当属性多的情况那样需要些很多个方法，
//为了避免这种情况我们可以用魔术函数：__get （读取） __set（修改）
class Staff
{
    private $name;
    private $age;
    private $salary;

    public function __construct($name, $age, $salary)
    { //构造方法用来初始化对象属性
        $this->name = $name;
        $this->age = $age;
        $this->salary = $salary;
    }
    //因为用private来封装，所以不能直接调用私有化属性，所以必须要调用方法来作为接口
//    public function getName()
//    {
//        return  $this->name;
//    }
//    public function getAge()
//    {
//        return$this->age;
//    }
//    public function getSalary()
//    {
//        return$this->salary;
//    }
//    //私有属性不能直接修改
//    public function setName($name,$value)
//    {
//        $this->$name=$value;
//    }
//    public function setAge($name,$value)
//    {
//        $this->$name=$value;
//    }
//    public function setSalary($name,$value)
//    {
//        $this->$name=$value;
//    }
//}
//$obj=new Staff('小弟',30,6700);
//echo '名字：'.$obj->getName();
//echo '<hr>';
//$obj->setName('name','joker');
//echo $obj->getName();
    public function __get($name)
    {
        return  $this->$name;
    }
    public function __set($name, $value)
    {
        if ($name==='name'){//可以设置条件这样被设置的私有属性不能被外部修改
            return  false;
        }
        $this->$name=$value;
    }
    // __isset()：检测是否存在某个属性
    public function __isset($name)
    {
        return  isset($this->$name);
    }
    public function __unset($name)
    {
        unset($this->$name);
    }

}
$obj=new Staff('老李',40,8500);
echo '修改前：姓名：'.$obj->name.'&nbsp年龄：'.$obj->age.'&nbsp工资：'.$obj->salary;
echo '<hr>';
$obj->name='老王';
$obj->age=37;
$obj->salary=8400;
echo '修改后：姓名：'.$obj->name.'&nbsp年龄：'.$obj->age.'&nbsp工资：'.$obj->salary;
echo '<hr>';
if (isset($obj->name)){
    echo '存在';
}else{
    echo '不存在';
}
if (isset($obj->age)){
    echo '存在';
}else{
    echo '不存在';
}
echo '<hr>';
unset($obj->age);



