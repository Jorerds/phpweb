<?php
namespace app\index\controller;
use app\index\controller\Base;
use  app\index\model\LandiKuaidiRecord;
use think\Request;

class Record extends  Base
{
    //渲染本月派件页面
    public function thisMonth()
    {
        $this->assign([
            'title'=>'蓝帝社团-本月派件记录',
            'keywords'=>'蓝帝社团,快递管理系统,本月派件记录',
            'description'=>'蓝帝社团'
        ]);
        //验证是否登录
        $this->isLogin();
        //用scope方法在模型创建条件进行范围查询
        $thisMonth=LandiKuaidiRecord::scope('Date','2')->select();
        //模板赋值
        $this->view->assign('thisMonth',$thisMonth);
        return  $this->view->fetch('record_this_month');
    }
    //签到派送状态更改
    public function upState(Request $request)
    {
        $recordId=$request->param('id');
        $result=LandiKuaidiRecord::get($recordId);
        if ($result->getData('State')=='未派出'){
            LandiKuaidiRecord::update(['State'=>'完成派送','EndTime'=>date('Y-m-d H:i:s')],['id'=>$recordId]);
        }
    }
    //渲染电脑录单页面
    public function recordAdd()
    {
        $this->assign([
            'title'=>'蓝帝社团-电脑录单',
            'keywords'=>'蓝帝社团,快递管理系统,电脑录单',
            'description'=>'蓝帝社团'
        ]);
        return $this->view->fetch('record_add');
    }
    //电脑录单数据验证与入库
    public function checkRecord(Request $request)
    {
        $status=0;
        $result='';
        $data=$request->param();
        
        $rule=[
            'OrderNo|快递单号'=>'require|number',
            'Name|收件人姓名'=>'require',
            'Tel|联系电话'=>'require|number',
            'Date|收入日期'=>'require|date',
        ];
        $msg=[
            'OrderNo'=>[
                'require'=>'快递单号不能为空，请检查',
                'number'=>'快递单号只能为纯数字，请重新填写',
//                'token'=>'快递单号已经存在，请重新填写',
            ],
            'Name'=>['require'=>'收件人姓名不能为空，请检查'],
            'Tel'=>[
                'require'=>'联系电话不能为空，请检查',
                'number'=>'联系电话只能为纯数字，请重新填写'
            ],
            'Date'=>[
                'require'=>'收入日期不能为空，请检查',
                'date'=>'日期格式错误，请重新填写正确的格式',
            ],
        ];
        $result=$this->validate($data,$rule,$msg);
        
        if ($result===true){
            $recordAdd=LandiKuaidiRecord::create($data);
            if ($recordAdd===null){
                $result='添加失败，请联系管理员！';
            }else{
                $status=1;
                $result='添加成功！';
              
            }
        }
        
        return  ['status'=>$status,'message'=>$result,'data'=>$data];
    }
    //渲染未派出件模板
    public function recordNot()
    {
        $this->assign([
            'title'=>'蓝帝社团-未派出件',
            'keywords'=>'蓝帝社团,快递管理系统,未派出件',
            'description'=>'蓝帝社团'
        ]);
        $notRecord=LandiKuaidiRecord::all(['State'=>'未派出']);
        $this->assign('notRecord',$notRecord);
        
        return $this->view->fetch('record_not');
    }
}

