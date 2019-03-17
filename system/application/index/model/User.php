<?php
namespace app\index\model;
use think\Model;
class user  extends Model
{

// 保存自动完成列表
protected $auto = [
    'delete_time' => NULL,
    'is_delete' => 1, //1:允许删除 0:禁止删除
];
// 新增自动完成列表
protected $insert = [
    'login_time'=> NULL, //新增时登录时间应该为NULL,因为刚创建
    'login_count' => 0, //原因同上,刚创建肯定没有登录过
];

//开启自动写入时间戳
protected $autoWriteTimestamp=true;
//创建时间字段
protected $createTime='create_time';
//更新时间字段
protected $updateTime='update_time';
//时间字段取出后的默认时间格式
protected $dateFormat='Y年m月d日';


/*---------用读取器设置role返回值-------------*/
    protected function getRoleAttr($value)
    {
        $role=[
          1=>'管理员',
          0=>'超级管理员'
        ];
        return  $role[$value];
    }
    protected function getStatusAttr($value)
    {
        $status=[
            1=>'已启用',
            0=>'已禁用'
        ];
        return  $status[$value];
    }
/*----------------通过修改器来给密码md5加密---------------*/
    protected function setPasswordAttr($value)
    {
        return  md5($value);
    }
}