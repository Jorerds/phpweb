<?php
class Demo
{
    public function __call($name, $sex)
    {
        //遍历参数$sex
        $var='';
        foreach ($sex as $value){
            $var .= $value.','; //.=字符串的连接运算符
        }
        return  '方法是'.$name.'('.$var.')'.'不存在';
    }
    //当我们调用一个不存在的静态方法时，会自动调用 __callStatic()
    public static function __callStatic($name, $sex)
    {
        //遍历参数$sex
        $var='';
        foreach ($sex as $value){
            $var .=$value.',';
        }
        return  '静态方法是'.$name.'('.$var.')'.'不存在';
    }

}
//当访问一个不存在的非静态方法时，自动调用类中的魔术方法：__call()
$obj=new Demo();
echo $obj->hello('php','java');
echo '<hr>';
//当访问一个不存在的静态方法是，自动调用类中的魔术方法：__callStatic()
echo Demo::hello(100,551,'老王');;
