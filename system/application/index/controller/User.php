<?php
//登录控制器
namespace app\index\controller;
use app\index\controller\Base;
use think\Request;
use app\index\model\User as UserModel;
use think\Session;
use think\view\driver\Think;

class user extends Base
{
/*-----------------------------登录界面渲染------------------------*/
    public function login()
    {
        $this->alreadyLogin();//自定义方法防止用户重复登录
        $this->assign([
            'title'=>'学校管理系统登录',
            'keywords'=>'系统登录,登录',
            'description'=>'学校管理系统登录'
        ]);
        return  $this->view->fetch();
    }
/*-------------------------------登录验证----------------------------------------------------------------------*/
    //验证登录  使用方法：$this->>validate($data需要验证的数据,$rule验证规则,$msq验证失败的提示)
    //用TP5方法Request 返回三个变量 $status当前状态    $result提示信息   $data返回数据   打包成json格式返回前端
    public function checkLogin(Request  $request)
    {
        //初始化返回参数
        $status=0;
        $result='';
        $data=$request->param();

        //创建验证规则
        $rule=[
            'name|用户名'=>'require', //用户名必填
            'password|密码'=>'require', //密码必填
            'verify|验证码'=>'require|captcha', //验证码必填
        ];
        //自定义验证失败的提示信息
        $msg=[
            'name'=>['require'=>'用户名不能为空，请检查'],
            'password'=>['require'=>'密码不能为空，请检查'],
            'verify'=>[
                'require'=>'验证码不能为空，请检查',
                'captcha'=>'验证码错误'
            ],
        ];
        //进行验证
        $result=$this->validate($data,$rule,$msg);

        //如果验证通过则进入数据库检查
        if ($result === true){
            //构造查询条件
            $map=[
                'name'=>$data['name'],
                'password'=>md5($data['password']),
            ];
            //查询用户信息
            $user=UserModel::get($map);
            //对查询条件进行判断
            if ($user==null){
                $result='用户名或密码错误';
            }elseif ($user->getData('status')==0){
                $result='用户处于被禁用状态，请联系管理员';
            }else{
                $status=1;
                $result='验证通过，点击[确定]进入';
                //设置验证成功的session值
                Session::set('user_id',$user->id);
                Session::set('user_info',$user->getData());
                $user->setInc('login_count');
            }
        }
        return  ['status'=>$status, 'message'=>$result,  'data'=>$data];
    }
/*--------------------------------退出登录--------------------------------------------------------------*/
    public function logout()
    {
        //清除session
            $this->isLogin();   //自定义方法验证是否登录
            UserModel::update(['login_time'=>time()],['id'=>Session::get('user_id')]);
            Session::delete('user_id');
            Session::delete('user_info');
            $this->success('注销登录成功，正在跳转','user/login');
        
    }
/*------------------------管理员列表页面-------------------------*/
    public function admin_list()
    {
        $this->isLogin();
        $this->assign([
        'title'=>'管理员列表',
        'keywords'=>'管理员列表,管理人员,列表',
        'description'=>'管理人员列表页面'
    ]);
        //获取管理员记录数
        $this->view->count=UserModel::count();
        
        //设置判断是否是超级管理员来显示数据
        $userName=Session::get('user_info.name');
        if ($userName=='admin'){
            $adminList=UserModel::all();
        }else{
            $adminList=UserModel::all(function ($query)use($userName){
                $query->where([
                    'name'=>$userName
                ]);
            });
        }
        //查询数据赋值
        $this->view->assign('adminList',$adminList);
        
        //渲染模板
        return  $this->view->fetch('admin_list');
    }
/*----------------管理员状态更变-------------------*/
    public function setStatus(Request   $request)
    {
        $this->isLogin();
        $userId=$request->param('id');
        $result=UserModel::get($userId);
        if ($result->getData('status')==1){
            UserModel::update(['status'=>0],['id'=>$userId]);
        }else{
            UserModel::update(['status'=>1],['id'=>$userId]);
        }
    }
/*---------------渲染添加管理员界面-------------------------*/
    public function admin_add()
    {
        //校验账户是否拥有添加权限
        $this->checkAdmin();
        $this->assign([
            'title'=>'添加管理员',
            'keywords'=>'添加管理员',
            'description'=>'添加管理人员页面'
        ]);
        return  $this->view->fetch('admin_add');
    }
/*---------------检查用户名是否重复-------------*/
    public function checkUserName(Request   $request)
    {
        $status=1;
        $message='用户名可用';
        $userName=trim($request->param('name'));
        if ($userName==null){
            $message='用户不得为空';
        }elseif (mb_strlen($userName)<3 || mb_strlen($userName)>10){
            $message='用户名长度必须大于3或者小于10';
        }elseif (UserModel::get(['name'=>$userName])){
            $status=0;
            $message='用户名已经存在，请重新输入';
        }
        
        return  ['status'=>$status, 'message'=>$message];
    }
/*-------------检查邮件是否重复-----------------*/
    public function checkEmail(Request  $request)
    {
        $status=1;
        $message='邮箱可用';
        $userEmail=$request->param('email');

      if ($userEmail==null){
          $message='邮箱不得为空';
      }elseif (UserModel::get(['email'=>$userEmail])){
            $status=0;
          $message='邮箱重复，请更换邮箱';
        }

        return  ['status'=>$status,'message'=>$message];
    }
/*-----------添加管理员操作---------------------*/
    public function addUser(Request $request)
    {
        $data=$request->param();
        $status=1;
        $result='';
        
        //添加数据规则
        $rule=[
          'name|用户名'=>'require|min:3|max:10',
            'password|密码'=>'require|min:6|max:16',
            'email|邮箱'=>'require|email',
        ];
        $result=$this->validate($data,$rule);
        if ($result===true) {
            $query = UserModel::get(['name'=>$data['name']] || ['email'=>$data['email']]);
            if ($query == null) {
                $user = UserModel::create($data);
                $result = '添加成功！';
            } else {
                $status = 0;
                $result = '添加失败，请检查数据';
            }
        }
        
        return  ['status'=>$status, 'message'=>$result, 'data'=>$data];
        
    }
/*--------------渲染编辑管理员信息页面--------------*/
    public function admin_edit(Request   $request)
    {
        $userId=$request->param('id');
        $result=UserModel::get($userId);
        $this->view->assign([
            'title'=>'编辑管理员信息',
            'keywords'=>'编辑管理员信息',
            'description'=>'编辑管理员信息页面'
        ]);
        $this->view->assign('user_info',$result->getData());
        return  $this->view->fetch('admin_edit');
    }
/*---------------更新管理员信息---------------------*/
    public function editUser(Request    $request){
        $param=$request->param();
        $status=1;
        $message='更新成功！';
        
        //去掉表单中为空的数据，没有修改的内容
        foreach ($param as $key=>$value){
            if (!empty($value)){
                $data[$key]=$value;
            }
        }
        $condition=['id'=>$data['id']];
        $get=UserModel::get(function ($query)use ($data){
            $query->where('name',$data['name'])->where('id',$data['id']);
        });
        if ($get==true) {
            $status=0;
            $message='更新失败！请检查管理员是否存在！';
            
        }else{
            $result = UserModel::update($data, $condition);
            //如果是admin用户,更新当前session中用户信息user_info中的角色role,供页面调用
            if (Session::get('user_info.name') == 'admin') {
                Session::set('user_info.role', $data['role']);
            }
            if ($result!=true){
                $status=0;
                $message='更新失败，请检查数据！';
            }
        }
    

        
        return  ['status'=>$status,'message'=>$message,'data'=>$data];
        
    }
    
    public function test()
    {
    
    }
    
}