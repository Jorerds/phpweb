<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

/*----------------时间日期算法函数------------------*/
function getDateInfo($type)
{
    $data = array(
        array(     /*获取上月开始与结束*/
            'start' => date('Y-m-01', strtotime('-1 month')),
            'end' => date('Y-m-t', strtotime('-1 month')),
        ),
        array(   /*获取本月开始与结束*/
            'start' => date('Y-m-01', strtotime(date("Y-m-d"))),
            'end' => date('Y-m-d', strtotime((date('Y-m-01', strtotime(date("Y-m-d")))) . " +1 month -1 day")),
        ),
        array(   /*获取近15天的开始与结束*/
            'start' => date('Y-m-d', strtotime("-15 day")),
            'end' => date('Y-m-d', strtotime('-1 day')),
        ),
        array(  /*获取近30天的开始与结束*/
            'start' => date('Y-m-d', strtotime("-30 day")),
            'end' => date('Y-m-d', strtotime('-1 day')),
        ),
        array(  /*获取上年开始与结束*/
            'start'=>date('Y-01-01',strtotime('-1 year')),
            'end'=>date('Y-12-t',strtotime('-1 year')),
        ),
        array(  /*获取本年开始与结束*/
            'start'=>date('Y-01-01',strtotime("0 year")),
            'end'=>date('Y-m-t',strtotime((date('Y-m-t', strtotime(date("Y-m-d")))) . " +1 year -1 month")),
        ),
    );
    return is_null($type) ? $data : $data[$type-1];
}

/*---------------------计算年比涨幅-----------------*/
/*------------$to*/
function    getVal($toVal,$yeVal)
{
    $data=round((($toVal-$yeVal)/$yeVal)*100).'%';
    return  $data;
}
