<?php
    class Demo1
    {
        public $name='老王';
        public  function getName()
        {
            return  $this->name;
        }
        public  function getObj()
        {
            return  new self();
        }
        public  function   getStatic()
        {
            return  new static();
        }
    }
    class Demo2 extends Demo1   //  extends是继承的意思
    {
        public function getNewObj()
        {
            return  new parent();
        }
    }

//    1.用new 类名()来创建一个对象
    $obj=new  Demo1();//不需要传入参数可以省略括号()
    echo $obj->name;
    echo '<hr>';

//  2.将类名以字符串的方式放在一个变量中
$className='Demo1';
$obj1=new $className;
echo $obj1->name;
echo '<hr>';

//  3.用对象来创建对象，创建的是一个新的对象
$obj2=new $obj();   //与$obj2=$obj是不一样的
echo $obj2->name;
echo '<hr>';

//  4.用new self()
$obj3=$obj->getObj();
echo    $obj3->name;
echo '<hr>';

//  5.用new parent()来创建一个对象
$obj4=(new Demo2)->getNewObj();
//echo get_class($obj4);
echo $obj4->name;
echo '<hr>';

/*$newObj=new Demo2();
$obj4=$newObj->getNewObj();
echo $obj4->name;*/

//  6.基于当前调用的类来创建   new static
$obj5=(new Demo1)->getStatic();
$obj6=(new Demo1)->getObj();
echo get_class($obj5);
echo get_class($obj6);
echo '<hr>';
//如果是只有一个类的情况下 new static 和 new self 区别不大
//但如果是多个继承类 new static 和 new self 是有很大的区别
$obj7=(new Demo2)->getStatic();
$obj8=(new Demo2)->getObj();
echo get_class($obj7);  //返回属于Demo2
// new static 创建的对象，直接与调用者绑定，静态延迟绑定
echo get_class($obj8);  //返回属于Demo1
?>