<?php
namespace app\index\controller;
use app\index\model\Staff;
use think\Db;

class Motest
{
    public function index()
    {
        //1、实例化创建模型对象
//        $staff=new Staff();
//        $result=$staff
//            ->where([
//                'id'=>['=','2214']
//            ])
//            ->find();
//        dump($result->getData());
        //2、静态创建模型对象
        $result=Staff::get(2214)->getData();
        dump($result);
    }
    public function demo1()
    {
        //直接通过内部访问方法访问
//        $staff=Staff::get(1004)->myTest();
//        dump($staff);

//+-----------------------------模型的添加操作---------------------------
//+--------------------------save()添加单条数据(实例化)-------------------------------
//+--------------------------saveAll批量添加数据(实例化)------------------------------
//+-------------------------create()单条添加数据(静态)------------------------------
        //1、实例化模型，创建模型对象
//        $staff=new Staff();
        //2、创建数据，采用的对象方式
//        $staff->name='老陈';
//        $staff->sex=1;
//        $staff->salary=8000;
        //批量添加
//        $data=[
//            ['name'=>'马云','sex'=>1],
//            ['name'=>'小马哥','sex'=>1],
//        ];
        //3、执行添加操作
//        $result=$staff->save();
        //批量执行添加操作（注意：批量添加操作执行返回的是一个数据数组）
//        $result=$staff->saveAll($data);

        //静态对象添加
        $result=Staff::create([
            'name'=>'王思聪','sex'=>1
        ]);
        dump($result->getData());
    }

//+---------------------------模型的更新数据----------------------------------------------
//+--------------------------save()更新单条数据（实例化）[返回影响记录数]--------------------------------
//+--------------------------saveAll()批量更新数据（实例化）[返回模型对象数组]------------------------------
//+-------------------------update()单条更新（静态）[返回模型对象]-------------------------------------
    public function demo2()
    {
        //1、实例化模型，创建模型对象
//        $staff=new Staff();
        //2、创建更新数据
//        $data=[
//            'name'=>'李嘉诚'
//        ];
        //3、创建更新条件
//        $where=[
//            'id'=>2218
//        ];
        //4、执行更新操作
//        $result=$staff->save($data,$where);

        //批量更新数据
//        $data=[
//            ['id'=>2217,'name'=>'小王'],
//            ['id'=>2216,'name'=>'老王']
//        ];
//        $result=$staff->saveAll($data);
//        dump($result);

        //静态更新数据（如果传入的数据包含主键的话，可以无需使用where方法。）
        //update(更新数据,更新条件,允许更新的字段)
        $data=[
            'name'=>'许家印'
        ];
        $where=[
            'id'=>2215
        ];
        $staff=Staff::update($data,$where);
        dump($staff->getData());
    }

//+------------------------模型的删除数据操作---------------------------
//+-----------------------delete()实例化---------------------------------
//+----------------------destroy(条件/闭包)------------------------------
    public function demo3()
    {
        $staff=Staff::destroy(function ($query){
            $query->where([
                'id'=>['=',2216]
            ]);
        });
        dump($staff);
    }

//+---------------------------模型的查询操作----------------------------
//+------------------------读取单条记录   实例化：find($where)，静态：get($where)。返回模型对象
//+-----------------------读取多条记录    实例化：select($where)，静态：all($where)。返回模型对象数组
    public function demo4()
    {
        //单条记录查询
//        $staff=Staff::get(function ($query){
//           $query->where([
//               'id'=>['=',2217]
//           ]);
//        });
//        dump($staff->getData());

        //多条记录读取
        $staff=Staff::all(function ($query){
            $query->where([
                'id'=>['<',2217]
            ]);
        });
        foreach ($staff as $key=> $value){
           echo '序号：'.($key+1).' 名字：'.$value->name.'<br >';
        }
    }

//+---------------------------读取器---------------------------------
    public function demo5()
    {
        $staff=Staff::get(2217);
        return  $staff->name.' 性别：'.$staff->sex.' 入职时间是：'.$staff->time;
        //当传入第二参数的运行方法
//        return  $staff->time;
    }

//+--------------------------修改器--------------------------------------
    public function demo6()
    {
        $result=Staff::create([
            'name'=>'扎克·伯格',
            'sex'=>1,
            'salary'=>40000,
            'time'=>'2016-07-18'
        ]);
        if ($result==true){
            return  '新员工'.$result->getData('name').'添加成功';
        }else{
            return  $result->getError();
        }
    }


//+------------------------类型转换----------------------------------------
    public function demo7()
    {
        $staff=Staff::get(function ($query){
            $query->where([
               'id'=>['=',1005]
            ]);
        });
        $staff->name='马化腾';
        $staff->sex='1';
        $staff->salary='45005.98';
        $staff->time='2014-07-26';
        $staff->isUpdate(true)->save();
        //获取转换后的数据
        $staff=Staff::get(1005);
        echo '转换数据：';
        dump($staff->name);
        dump($staff->sex);
        dump($staff->salary);
        dump($staff->time);
    }

    public function demo8()
    {
        $result=Staff::create([
            'name'=>'奥巴马',
            'sex'=>1,
        ]);
        if ($result){
            return  $result->name.'添加成功！';
        }else{
            return  $result->getError();
        }
    }
}