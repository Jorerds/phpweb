<?php
namespace app\index\controller;
use app\index\controller\Base;
use app\index\model\landiKuaidiSend;
use think\Request;
use think\Validate;

class Express extends Base
{
/*--------------------渲染上月寄件页面---------------*/
    public function expressNot()
    {
        //设置seo值
        $this->assign([
            'title'=>'蓝帝社团-上月寄件记录',
            'keywords'=>'蓝帝社团,快递管理系统,上月寄件记录系统',
            'description'=>'蓝帝社团'
        ]);
        //验证是否登录
        $this->isLogin();
        //用scope方法在模型创建条件进行范围查询
        $listExpress=landiKuaidiSend::scope('Date','1')->select();
        //模板赋值
        $this->view->assign('listExpress',$listExpress);
        //渲染模板
        return  $this->view->fetch('express_not');
    }
    /*------------渲染本月寄件页面-----------------*/
    public function expressListNow()
    {
        //设置seo值
        $this->assign([
            'title'=>'蓝帝社团-本月寄件记录',
            'keywords'=>'蓝帝社团,快递管理系统,本月寄件记录系统',
            'description'=>'蓝帝社团'
        ]);
        //验证是否登录
        $this->isLogin();
        //用scope方法在模型创建条件进行范围查询
        $listExpress=landiKuaidiSend::scope('Date','2')->select();
        //模板赋值
        $this->view->assign('listExpress',$listExpress);
        //渲染模板
        return  $this->view->fetch('express_list_now');
    }
    
/*---------------渲染快递填写页面---------------*/
    public function expressAdd()
    {
        //设置seo值
        $this->assign([
            'title'=>'蓝帝社团-快递填写',
            'keywords'=>'蓝帝社团,快递管理系统,快递填写',
            'description'=>'蓝帝社团'
        ]);
        //验证是否登录
        $this->isLogin();
        return $this->view->fetch('express_add');
    }
    
/*-------------验证登记寄件数据----------*/
    public function checkExpress(Request $request)
    {
        //初始化返回参数
        $status=0;
        $result='';
        $data=$request->param();
    
        //设置验证规则
        $rule=[
            'OrderNo|快递单号'=>'require|number',
            'J_Name|寄件人姓名'=>'require',
            'J_Tel|寄件人电话'=>'require|number',
            'S_Name|收件人姓名'=>'require',
            'S_Tel|收件人电话'=>'require|number',
            'S_Address|收件地址'=>'require',
            'Freight|实收运费'=>'require|number',
            'SendGoods|寄件物品'=>'require',
            'Weight|重量'=>'require|number',
            'Date|寄件日期'=>'require|date',
        ];
        //设置验证失败提示
        $msg=[
            'OrderNo'=>[
                'require'=>'快递单号不能为空，请检查',
                'number'=>'订单号必须为数字，请检查',
            ],
            'J_Name'=>['require'=>'寄件人姓名不能为空，请检查'],
            'J_Tel'=>[
                'require'=>'寄件人电话不能为空，请检查',
                'number'=>'寄件人电话不正确，请检查',
                ],
            'S_Name'=>['require'=>'收件人姓名不能为空，请检查'],
            'S_Tel'=>[
                'require'=>'收件人电话不能为空，请检查',
                'number'=>'收件人电话不正确，请检查',
            ],
            'S_Address'=>['require'=>'收件地址不能为空，请检查'],
            'Freight'=>[
                'require'=>'实收运费不能为空，请检查',
                'number'=>'请填写数字',
            ],
            'SendGoods'=>['require'=>'寄件物品不能为空，请检查'],
            'Date'=>[
                'require'=>'寄件日期不能为空，请检查',
                'date'=>'寄件日期必须是一个日期,请检查'
            ],
            'Weight'=>[
                'require'=>'重量不能为空，请检查',
                'number'=>'重量必须为数字，请检查',
            ],
        ];
        //调用验证方法进行验证
        $result=$this->validate($data,$rule,$msg);
        //验证通过再进行入库操作
        if ($result===true){
            $expressAdd=landiKuaidiSend::create($data);
            if ($expressAdd===null){
                $result='登记失败！';
            }else{
                $status=1;
                $result='登记成功！';
            }
        }
        
        
        return  ['status'=>$status,'message'=>$result];
    }
    
    public function test()
    {
         dump($_SERVER['HTTP_CLIENT_IP']);
    }
}