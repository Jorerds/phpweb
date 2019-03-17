<?php

class  Demo{ //类的命名推荐使用帕斯卡命名法
    //属性和方法
    //属性的声明必须以访问控制符开头
    public $name='李雷'; //公共属性，外部可以访问的
    //属性访问控制符：public  / private 和  protected
    private $age=20; //私有属性，只允许类中访问调用
    protected $sex='男'; //受保护的属性，允许本类或子类访问
    //属性类型支持：标量（整数、浮点、字符串、布尔值），复合类型：数组和对象
    //方法也必须以访问控制符开头：public  /   private /   protected
    public function getName()
    {
        //$this是伪变量，总是指向当前对象
        return  $this->name;
    }
    public function getAge()
    {
        return  $this->age;
    }
}
//创建对象的过程，就是类的实例化
$obj=new Demo();//$obj  就是类Demo的实例
//类必须实例化才可以访问里面的属性和方法
echo $obj->name;//用对象访问运算符来直接
echo '<br />';
echo $obj->getName();
echo '<br />';
//echo $obj->age; //private定义的属性不能在外部访问但可以通过类中的方法来进行访问，例如下面例子
echo    $obj->getAge();//用这个方法作为接口
//对象是一个引用变量，我们对对象的赋值并没有创建新对象，而是创建一个当前对象的引用
echo '<br />';
$obj2=$obj;//并没有创建新的对象
/*if ($obj2===$obj){
    echo '相等';
}else{
    echo '不相等';
}*/
echo '$obj的类：'.get_class($obj);
echo '<br />';
echo '$obj2的类：'.get_class($obj2);
/*$obj和$obj2的类都是Demo*/

//如果在类的外部访问属性或方法，可以直接用对象
//如果在类的内部访问属性或方法，必须使用伪变量$this

?>
