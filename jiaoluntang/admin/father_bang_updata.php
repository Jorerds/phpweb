<?php
    include '../inc/config.inc.php';
    include '../inc/mysql.inc.php';
    include '../inc/tool.inc.php';
    $link=connect();
    $head=array(
        'title'=>'修改父板块',
        'keywords'=>'修改父板块',
        'description'=>'修改父板块'
    );
$updata_url=basename($_SERVER['REQUEST_URI']);
    if (!isset($_GET['id']) or !is_numeric($_GET['id'])){
        skip('father_bang.php','error','参数错误！');
    }
    $query="SELECT * FROM  father_bang WHERE id={$_GET['id']}";
    $result=execute($link,$query);
    if (!mysqli_num_rows($result)){
        skip('father_bang.php','error','这个版块不存在！');
    }

if (isset($_POST['submit'])){
    //设置验证变量，调用指定的验证SQL语句
    $cherk='updata';
    //引入验证文件
    include 'inc/father_bang_cherk.php';
        //修改操作
        $query="UPDATE father_bang SET  bang_name='{$_POST['bang_name']}',sort='{$_POST['sort']}' WHERE  id={$_GET['id']}";
        execute($link,$query);
        if (mysqli_affected_rows($link)==1){
            skip('father_bang.php','ok','修改成功！');
            }else{
                skip('father_bang_updata.php','error','修改失败！');
                }
        }
$data=mysqli_fetch_assoc($result);

?>

<?php  include 'inc/head.inc.php';?>
<div id="main" >
    <div class="title">修改父板块—<?php echo $data['bang_name']?></div>
    <form method="post">
        <table class="au">
            <tr>
                <td>版块名称</td>
                <td><input  name="bang_name" type="text" value="<?php echo $data['bang_name']?>" /></td>
                <td>
                    板块名称不能为空，最大名称不能超过88个字符
                </td>
            </tr>
            <tr>
                <td>排序</td>
                <td><input  name="sort" type="text"  value="<?php echo $data['sort']?>" /></td>
                <td>
                    默认是0
                </td>
            </tr>
        </table>
        <input style="margin-top: 20px; cursor:pointer;" class="btn" type="submit" name="submit" value="修改" />
    </form>
</div>





<?php  include 'inc/footer.inc.php';?>
