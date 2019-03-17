<?php
class Father
{
    //访问控制符：指示类成员在哪里可以被访问：public/private/protected
    //成员状态符：指示如何访问成员：静态self/parent/static  非静态：$this->
    //公共静态属性，类内部/外部/子类均可访问
    //私有静态属性，只能在类内部访问
    //受保护的静态属性，可以在类的内部和子类中访问
    public static $name='Ladtss';
    public static $age=28;
    public static $salary=4500;
    //声明静态方法
    public static function show()
    {
        //静态属性只允许在静态方法中访问，静态方法不允许使用伪变量$this->
        return  '年龄：'.self::$age.'---'.'工资：'.self::$salary;
    }
}
//创建子类Son，继承自Father类
class Son extends Father
{
    public static function display()
    {
        //parent::引用父类中的静态成员
        return  '工资是：'.parent::$salary;
    }
}
echo '姓名是：'.Father::$name;//外部访问静态成员，使用类名::静态成员，静态属性必须加$符号
echo '<hr>';
echo Father::show();//访问类中的静态方法
echo '<hr>';
echo Son::show();//用子类访问父类静态方法
echo '<hr>';
echo Son::display();//访问子类的静态方法
echo '<hr>';
$obj=new Father();
echo $obj->show();//外部使用对象，也可以访问类中的静态方法
//echo $obj->$name;//外部对象不能访问类中的静态属性
$res=$obj instanceof  Father; //instanceof用来检查一个变量是否是一个类的实例化
var_dump($res);