<?php
//模型创建
namespace app\index\model;
use think\Model;
use traits\model\SoftDelete;

class Staff extends Model
{
    // 保存自动完成列表
    protected $auto = [];
    // 新增自动完成列表
    protected $insert = [
        'time'=>'2011-06-24',
        'salary'=>4500,
        'dept', //部门名称，根据员工性别sex字段的值确定（不设置值是为了在修改器设置添加条件）
    ];
    // 更新自动完成列表
    protected $update = [];
    // 是否需要自动写入时间戳 如果设置为字符串 则表示时间字段的类型
    protected $autoWriteTimestamp=true; //设定为true开启自动时间戳功能
    // 创建时间字段
    protected $createTime = 'create_time';
    // 更新时间字段
    protected $updateTime = 'update_time';

//+---------------------设置类型转换------------------------------
    protected $type=[
        'name'=>'string',
        'sex'=>'integer',
        'salary'=>'float',
        'time'=>'timestamp'
    ];

//+---------------软删除-----------------------------------
//    use SoftDelete;
//    protected $deleteTime='delete';

    //创建内部访问方法
    public function myTest()
    {
        return  $this->getData();
    }

//+---------------------创建模型读取器----------------------------------
//+--------------------获取器的作用是在获取数据的字段值后自动进行处理------------
//+-----------------创建读取器格式：get字段名(使用驼峰命名法)Attr()，获取器方法的第二个参数传入的是当前的所有数据数组
//    protected function getTimeAttr($value,$data)
//    {
//        //创建字段
//        return  date('Y-m-d',$value);
//        //第二个参数直接读取获取所有数据数组
////        return  $data['name'].' 性别：'.$data['sex'].' 入职时间是：'.date('Y-m-d',$value);
//    }
    protected function getSexAttr($value)
    {
        $sex=[
            1=>'男',
            2=>'女'
        ];
        return  $sex[$value];
    }

//+--------------------创建模型修改器-----------------------------------
//+--------------------修改器的作用是可以在数据赋值的时候自动进行转换处理-------------
//+-----------------创建读取器格式：set字段名(使用驼峰命名法)Attr()--------------------------
    protected function setTimeAttr($value)
    {
        return  strtotime($value);
    }

//设置部门根据sex来进行添加
    protected function setDeptAttr($dept,$data)
    {
        if ($data['sex']==1){
            return  $this->dept='开发部';
        }else{
            return  $this->dept='客服部';
        }
    }

}