<!-- 子版块修改页-->
<?php
    include '../inc/config.inc.php';
    include '../inc/mysql.inc.php';
    include '../inc/tool.inc.php';
    $link=connect();
    $head=array(
        'title'=>'修改子板块',
        'keywords'=>'修改子板块',
        'description'=>'修改子板块'
    );
    if (!isset($_GET['id']) or !is_numeric($_GET['id'])){
        skip('son_bang.php','error','参数错误！');
    }
    $query="SELECT * FROM son_bang WHERE  id={$_GET['id']}";
    $result=execute($link,$query);
    if (!mysqli_num_rows($result)){
        skip('son_bang.php','error','这个版块不存在！');
    }
    if (isset($_POST['submit'])) {
        $cherk='updata';
        include 'inc/son_bang_cherk.php';
        $query = "UPDATE son_bang SET  father_id={$_POST['father_id']},son_bang_name='{$_POST['son_bang_name']}',info='{$_POST['info']}',bang_id={$_POST['bang_id']},sort={$_POST['sort']} WHERE  id={$_GET['id']}";
        execute($link,$query);
        if (mysqli_affected_rows($link)==1){
            skip('son_bang.php','ok','修改成功！');
        }else{
            skip('son_bang.php','error','修改失败！');
        }
    }
    $data=mysqli_fetch_assoc($result);
?>
<?php  include 'inc/head.inc.php';?>
<div id="main" >
    <div class="title">修改子板块—<?php  echo $data['son_bang_name']?></div>
    <form method="post">
        <table class="au">
            <tr>
                <td>所属父板块</td>
                <td>
                    <select name="father_id">
                        <option value="0">==========请选择一个父板块==========</option>
                        <?php
                        $query='SELECT * FROM  father_bang';
                        $result_father=execute($link,$query);
                        while ($data_father=mysqli_fetch_assoc($result_father)){
                            if ($data['father_id']==$data_father['id']){
                                echo "<option selected='selected' value='{$data_father['id']}'>{$data_father['bang_name']}</option>";
                            }else {
                                echo "<option value='{$data_father['id']}'>{$data_father['bang_name']}</option>";
                            }
                        }
                        ?>
                    </select>
                </td>
                <td>
                    选择子板块所要归属的父板块
                </td>
            <tr>
                <td>版块名称</td>
                <td><input  name="son_bang_name" value="<?php echo $data['son_bang_name']?>" type="text" /></td>
                <td>
                    板块名称不能为空，最大名称不能超过66个字符
                </td>
            </tr>
            <tr>
                <td>板块简介</td>
                <td>
                    <textarea name="info" ><?php echo $data['info'] ?></textarea>
                </td>
                <td>
                    填写板块简介，不能超过255个字符
                </td>
            </tr>
            <tr>
                <td>版主</td>
                <td>
                    <select name="bang_id">
                        <option value="0">==========请选择一个会员作为版主==========</option>
                    </select>
                </td>
                <td>
                    请选择一个会员作为版主
                </td>
            <tr>
            <tr>
                <td>排序</td>
                <td><input  name="sort"  value="<?php echo $data['sort']?>" type="text" /></td>
                <td>
                    默认是0
                </td>
            </tr>
        </table>
        <input style="margin-top: 20px; cursor:pointer;" class="btn" type="submit" name="submit" value="修改" />
    </form>
</div>

<?php  include 'inc/footer.inc.php';?>
