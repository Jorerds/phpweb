<?php
//遍历对象
class Demo
{
    public $name;
    public $age;
    public $salary;
    private $sex;
    protected $isMarried;
    public function __construct($name,$age,$salary,$sex,$isMarried)
    {
        $this->name =    $name;
        $this->age  =   $age;
        $this->salary   =   $salary;
        $this->sex  =   $sex;
        $this->isMarried    =   $isMarried;
    }
    //私有属性和受保护的属性不能直接遍历需要创建query方法，进行内部遍历
    public function query()
    {
        print '遍历出对象中的全部属性，包括私有和受保护属性<br>';
        foreach ($this as $key=>$value){
            print $key.'=>'.$value.'<br>';
        }
    }
}
$obj=new Demo('Joker',29,4700,'男','未婚');
//遍历对象
echo '外部访问公共属性：<br>';
foreach ($obj as $key => $value) {
    echo $key.'=>'.$value.'<br>';
}
echo '<hr>';
$obj->query(); //遍历出对象中的全部属性