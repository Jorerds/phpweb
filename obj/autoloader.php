<?php
//1.用require或者include导入一个类文件
//require ('Demo.php');//导入test.php类文件
//include ('Demo.php');//导入test.php类文件

//2.__autoload()当我们引入一个不存在的类是，自动调用它导入该类文件
//    function  __autoload($className)
//    {
//        $path=$className.'.php';
//        if (file_exists($path)){
//            require_once ($path);
//        }else{
//            echo $path.'类文件不存在！';
//        }
//    }

//3.自定义导入函数，用spl_autoload_register()将自定义的类导入函数添加到函数栈中
//    function  loader($className)
//    {
//        $path=$className.'.php';
//        if (file_exists($path)){
//            require_once ($path);
//        }else{
//            echo $path.'类文件不存在！';
//        }
//    }
//    spl_autoload_register('loader');

//还可以把导入函数放到一个类中
    class loaderClass
    {
       static function  loader($className) //加上static变成静态法方 推荐用这种方法
        {
            $path=$className.'.php';
            if (file_exists($path)){
                require_once ($path);
            }else{
                echo $path.'类文件不存在！';
            }
        }
    }
//    spl_autoload_register([(new loaderClass),'loader']);
spl_autoload_register(['loaderClass','loader']);


echo    (new Test('PHP好'))->name;
echo '<hr>';
echo (new Bang)->name;


?>
