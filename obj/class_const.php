<?php
    class Demo
    {
        //  类常量就是它的值在类中始终不变的量
        //  类常量是用const关键字创建，不要加$符，必须初始化
        const   siteName='程序员';
        //类常量从php5.3+开始支持nowdoc语法
        const   doMain= <<<'EOT'
        <a href="">www.baidu.com</a>
EOT;
        public  function  getSiteName()
        {
            //在类的方法中访问类常量：self::类常量名
            return  self::siteName;
        }

    }
/*在类的外部访问类常量的方法*/
//  方法1、类名：：类常量名
echo '1.类名：：类常量名：'.Demo::siteName.Demo::doMain;
echo '<hr>';

//  方法2、类变量：：类常量名 （PHP5.3后才支持）
$className='Demo';
echo '2.类变量：：类常量名：'.$className::siteName.$className::doMain;
echo '<hr>';

//方法3、用当前类的对象来访问类常量
echo '3.对象：：类常量名：'.(new Demo)::siteName;
echo '<hr>';
//方法4、用类中的方法来间接访问类常量
echo '4.对象->方法()：'.(new Demo)->getSiteName();

?>