<?php
namespace app\index\controller;
//这是导入连接数据类
use think\Db;

class Mysql
{
    //静态连接
    public function demo()
    {
        //1、获取数据库的连接实例/对象
        $link=Db::connect();
        //2、用连接实例调用查询类的查询方法
        $result=$link->table('staff')->select();
// 可简化： $result=Db::table('staff')->select();
        //3、输出查询结果
        dump($result);
    }

    //动态连接
//    public function demo()
//    {
//        $config=[
//            // 数据库类型
//            'type'            => 'mysql',
//            // 服务器地址
//            'hostname'        => 'localhost',
//            // 数据库名
//            'database'        => 'tp5',
//            // 用户名
//            'username'        => 'root',
//            // 密码
//            'password'        => '',
//        ];
//        //1、获取数据库的连接实例/对象
//        $link=Db::connect($config);
//        //2、用连接实例调用查询类的查询方法
//        $result=$link->table('staff')->select();
//        //3、输出查询结果
//        dump($result);
//    }

    public function demo1()
    {
        //1、查询操作：工资大于4000元的员工信息
//        $sql="SELECT name,salary,dept,hiredate FROM staff WHERE   salary > ?";//mysql语句后面这个问号是一个参数绑定（参数绑定可以防止sql注入）
//        $result=Db::query($sql,[4000]); //第二个参数数组是参数绑定的参数
        //这是命名占位符进行参数绑定
//        $sql="SELECT name,salary,dept,hiredate FROM staff WHERE   salary > :salary";
//        $result=Db::query($sql,['salary'=>4000]);
//        dump($result);

        //2、更新操作：将id=1145的记录，salary增加1000
//        $sql="UPDATE staff SET salary=salary+1000 WHERE id=:id";
//        $result=Db::execute($sql,['id'=>1145]);
//        dump($result);

        //3、插入操作：默认添加到表的尾部
//        $sql="INSERT INTO staff(name,sex) VALUES  (:name,:sex)";
//        $result=Db::execute($sql,['name'=>'peda','sex'=>1]);
//        dump($result);

        //4、删除操作：删除id=2212的记录
//        $sql="DELETE FROM staff WHERE   id=:id";
//        $result=Db::execute($sql,['id'=>2212]);
//        dump($result);

//+-----------------------------------查询构造器的写法--------------------------------


        //基础写法
//        $result=Db::table('staff')->field(['name','salary'])->where('id','=',1004)->find();

        //查询条件用数组的形式（适用于多条件）
//        $result=Db::table('staff')
//            ->field(['*'])
//            ->where([
//                'id'=>['>',1000],
//                'salary'=>['>',4000]
//            ])
//            ->select();
        $salary=4000;
        //查询条件闭包写法
//        $result=Db::table('staff')
//            ->field(['id','name','salary','dept'])
//            ->where(function ($query)use ($salary){ //闭包的优越性就是可以通过引入外部变量来进行复杂的查询条件 （注意：闭包函数要用use()来引入外部变量）
//                $query->where([
//                    'id'=>['>',1000],
//                    'salary'=>['>',$salary]
//                ]);
//            })
//            ->select();

        //查询条件闭包写法（优化写法）
//        $result=Db::select(
//            function ($query)use($salary){
//                $query->table('staff')
//                    ->field(['id'=>'员工编号','name'=>'姓名','salary'=>'工资','dept'=>'部门'])
//                    ->where([
//                        'id'=>['>',1000],
//                        'salary'=>['>',$salary]
//                    ]);
//            }
//        );

        //插入数据库操作
//        $result=Db::table('staff')
//        ->insert([
//            'name'=>'朱自清',
//            'sex'=>1,
//            'dept'=>'营销部'
//        ]);
//        if (!$result==0){
//            echo '插入记录'.$result.'条！';
//        }else{
//            echo    '记录插入失败！';
//        }

        //更新数据库操作
//        $result=Db::table('staff')
//            ->where([
//                'id'=>['=',2214]
//            ])
//            ->update([
//                'salary'=>9000
//            ]);
        //自增方法：setInc('自增字段名',自增数值,延迟执行秒数)
        //自减方法：setDec('自减字段名',自减数值)

        //直接获取字段值的查询操作
        //直接获取字段的值
        //value('字段','默认值')
//        $result=Db::table('staff')
//            ->where([
//                'id'=>['=',2214]
//            ])
//        ->value('name');
        //获取符合条件的整一列的值
        //column('字段','字段')
//        $result=Db::table('staff')
//            ->where([
//                'id'=>['<',2214]
//            ])
//            ->column('name');

        //删除操作(注意：delete(true)可以直接清空表数据谨慎使用)
        $result=Db::table('staff')
            ->delete(2211);
        if ($result!=0){
            return  '删除成功'.$result.'条记录';
        }else{
            return  '删除失败！';
        }


        dump($result);
    }
}