<?php
namespace app\index\model;
use think\Model;

class User  extends Model
{
    protected $insert = [
    
    ];
    /*----------------通过修改器来给密码md5加密---------------*/
    protected function setPassWordAttr($value)
    {
        return  md5($value);
    }
}