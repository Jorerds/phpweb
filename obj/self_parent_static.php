<?php
class Demo1
{
    public static $name='海鸥';
    public static $salary=5000;
    public static function show()
    {
//        return  self::$name;//访问本类中的静态属性self::就是当前类
//        self出现在哪一个类中就是与当前类名绑定
        return  static::$name;
    }
    public static function wosh()
    {
        return  static::$sex;
        //static与self、parent是不一样的，它对应的类是动态设置的，由调用类决定，如果说self和
        //parent是静态绑定到类的话，static就是动态绑定到类，叫做：静态延迟绑定（后期静态绑定）
        //静态绑定（self和parent）它们与类的绑定是在代码的编译阶段进行，而static与类的绑定是在
        //代码的运行时才进行绑定，所以叫：静态延迟绑定（与类绑定的时机不同）
    }
}
class Demo2 extends Demo1
{
    public static $sex='male';
    public static function display()
    {
        //parent::与父类进行静态绑定，self::与Demo2类静态绑定
//        return  parent::$name.'的工资是：'.parent::$salary.'，性别是：'.self::$sex;
        //parent::与父类进行静态绑定，static:与Demo2类静态绑定
        return  parent::$name.'的工资是：'.parent::$salary.'，性别是：'.static::$sex;
    }
}
echo '姓名：'.Demo1::show();
echo '<hr>';
echo '性别：'.Demo2::wosh();//父类wosh()方法通过static能过访问子类的属性
echo '<hr>';
echo Demo2::display();