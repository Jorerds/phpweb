<?php
namespace app\index\model;
use think\Model;
use app\index\controller\Base;

class LandiKuaidiRecord extends Model
{
    // 开启自动写入时间戳字段
    protected $autoWriteTimestamp = 'datetime';
    //创建自动写入时间
    protected $createTime = 'Time';
    //更新自动写入时间
    protected $updateTime = 'Time';
    /*创建获取上月日期查询条件*/
    protected function scopeDate($query,$data)
    {
        /*        获取开始与结束的时间：
                1、获取上个月
                2、获取本月
                3、获取近15天
                4、获取近30天
               5、获取上一年
               6、获取今年
        */
        $date=getDateInfo($data);
        $query->where('Date','>=',$date['start']);
        $query->where('Date','<=',$date['end']);
    }
    //修改器
    protected function setTimeAttr($value)
    {
        return date('Y-m-d H:i:s',$value);
    }
    //修改器
    protected function setEndTime($value)
    {
        return date('Y-m-d H:i:s',$value);
    }
}