<?php
namespace app\index\controller;
use app\index\controller\Base;
use app\index\model\User as UserModel;
use think\Request;
use think\Session;

class User extends Base
{
/*--------------渲染登录页面---------------*/
    public function login()
    {
        $this->assign([
            'title'=>'蓝帝社团系统登录',
            'keywords'=>'蓝帝社团,快递管理系统登录',
            'description'=>'蓝帝社团'
        ]);
        $this->alreadyLogin();
        return  $this->view->fetch('login');
    }
/*---------------------登录验证操作---------------------*/
    public function checkLogin(Request $request)
    {
        //初始化返回参数
        $status=0;
        $result='';
        $data=$request->param();
        //设置验证规则
        $rule=[
            'username|用户名'=>'require',
            'password|密码'=>'require',
        ];
        //设置验证失败提示
        $msg=[
          'username'=>['require'=>'用户名不能为空，请检查'],
          'password'=>['require'=>'密码不能为空，请检查'],
        ];
        //基本ajax验证
        $result=$this->validate($data,$rule,$msg);
        //ajax基本验证通过则进入数据库检查
        if ($result===true){
            //构造查询条件
            $map=[
            'UserName'=>$data['username'],
            'PassWord'=>md5($data['password']),
            ];
            //查询用户
            $user=UserModel::get($map);
            //查询条件判断
            if ($user==null){
                $result='用户名或密码错误';
            }elseif ($user->getData('State')==1){
                $result='用户处于被禁用状态，请联系管理员';
            }else{
                $status=1;
                $result='登录成功！请点击[确认]进入';
                //登录成功存储session值
                Session::set('user_id',$user->UserID);
                Session::set('user_info',$user->getData());
                //登录次数
                $user->setInc('Logins');
            }
        }
        
        return  ['status'=>$status,'message'=>$result,'data'=>$data];
    }
/*-------------------注销登录---------------------*/
    public function logout()
    {
        //验证是否登录
        $this->isLogin();
        //获取请求参数
        $request=Request::instance();
        //获取ip地址
        $ip=$request->ip();
        //通过在注销时候获取最后一次登录时间和ip地址
        UserModel::update(['LastLoginTime'=>date('Y-m-d H:i:s',time()),'LastLoginIP'=>$ip],['UserID'=>Session::get('user_id')]);
        //注销session信息
        Session::delete('user_id');
        Session::delete('user_info');
        $this->success('注销登录成功，正在跳转','user/login');
    }
}