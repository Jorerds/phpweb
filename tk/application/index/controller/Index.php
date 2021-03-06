<?php
namespace app\index\controller;

class Index
{
    public function index()
    {
        return '<style type="text/css">*{ padding: 0; margin: 0; } .think_default_text{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架</span></p><span style="font-size:22px;">[ V5.0 版本由 <a href="http://www.qiniu.com" target="qiniu">七牛云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="https://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="https://e.topthink.com/Public/static/client.js"></script><think id="ad_bd568ce7058a1091"></think>';
    }
    public function admin()
    {
        $data=['name'=>'php','age'=>'sda'];
        $data1=['name1'=>'python','age1'=>'wd'];
        $w=[$data,$data1];
        return json($w);
    }
    public function wod()
    {
        /*
         * 使用自定义类库的引入
         */
        $Test=new \my\Test();
        $text=$Test->set_user();
        return $text;
    }
    public function tree2(){
        /*
         * 树结构，无限分级
         */
        $r = array(
            array(
                'id'=>1,
                'name'=>'智慧教育',
                'parent_id'=>0,
                'level'=>0 //一级分类
            ),
            array(
                'id'=>2,
                'name'=>'学校列表',
                'parent_id'=>1,
                'level'=>1 //二级分类
            ),
            array(
                'id'=>4,
                'name'=>'智慧医疗',
                'parent_id'=>0,
                'level'=>0 //一级分类
            ),
            array(
                'id'=>5,
                'name'=>'医院列表',
                'parent_id'=>4,
                'level'=>1 //二级分类
            ),
            array(
                'id'=>6,
                'name'=>'名医列表',
                'parent_id'=>5,
                'level'=>2 //三级分类
            )

        );
        dump($r);
        //输出为select标签：
        echo '<h1>PHPTree</h1>';
        echo '<select  style="width:300px;">';
        foreach($r as $item){
            echo '<option>';
            //根据所在的层次缩进
            echo str_repeat('|—',$item['level']);
            echo $item['name'];
            echo '</option>';
        }
        echo '</select>';
    }

}
