<?php
//创建父类
    class Person
    {
        protected $name; //protected受保护，外部不可访问和调用，只允许自己内部或子类访问
        protected $age;
        protected $salary;

        public  function    __construct($name,$age,$salary)
        {
            $this->name=$name;
            $this->age=$age;
            $this->salary=$salary;
        }
        //声明为受保护的方法，这样就只能被子类继承，子类继承过去仍是protected
//        public function shoMess()
        protected function shoMess()
        {
            return  '姓名：'.$this->name.'。年龄：'.$this->age.'。工资：'.$this->salary;
        }
    }
    //声明一个子类（扩展了），继承使用关键字：extends，PHP是单继承语言
    //创建子类是为了扩展父类的功能，实现代码复用
    class Staff extends Person
    {
        protected $department;
        public function __construct($name, $age, $salary,$department)
        {
            parent::__construct($name, $age, $salary);
//            $this->name=$name;
//            $this->age=$age;
//            $this->salary=$salary;
            $this->department=$department;
        }
        //在子类重写父类方法，其访问权限不能低于原来的，原来是protected，那么现在应该是public
        public function shoMess()
        {
            return parent::shoMess().'。部门：'.$this->department;
            return  '姓名：'.$this->name.'。年龄：'.$this->age.'。工资：'.$this->salary.'。部门：'.$this->department;
        }
    }
$obj=new Staff('老王',27,8000,'开发部');
    echo $obj->shoMess();