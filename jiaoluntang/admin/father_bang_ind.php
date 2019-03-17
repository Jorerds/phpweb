<!-- 父板块添加页面 -->
<?php
    include '../inc/config.inc.php';
    include '../inc/mysql.inc.php';
    include '../inc/tool.inc.php';
    $link=connect();

    //设置头部信息
    $head=array(
        'title'=>'添加父板块',
        'keywords'=>'添加父板块',
        'description'=>'添加父板块'
    );

    //添加版块时候对添加版块数据进行验证
    if (isset($_POST['submit'])){
        //设置验证变量，调用指定的验证SQL语句
        $cherk='ind';
        //引入验证文件
        include 'inc/father_bang_cherk.php';

        //进行版块添加操作
        $query="INSERT  INTO  father_bang(bang_name,sort) VALUES ('{$_POST['bang_name']}',{$_POST['sort']})";
        execute($link,$query);
        if (mysqli_affected_rows($link)==1){
            skip('father_bang.php','ok','添加父板块成功！！');
        }else{
            skip('father_bang.php','error','添加父板块失败！');
        }

    }

?>

<?php  include 'inc/head.inc.php';?>
    <div id="main" >
        <div class="title">添加新父板块</div>
        <form method="post">
        <table class="au">
            <tr>
                <td>版块名称</td>
                <td><input  name="bang_name" type="text" /></td>
                <td>
                    板块名称不能为空，最大名称不能超过88个字符
                </td>
            </tr>
            <tr>
                <td>排序</td>
                <td><input  name="sort" value="0" type="text" /></td>
                <td>
                    默认是0
                </td>
            </tr>
        </table>
        <input style="margin-top: 20px; cursor:pointer;" class="btn" type="submit" name="submit" value="添加" />
        </form>
    </div>



<?php  include 'inc/footer.inc.php';?>
