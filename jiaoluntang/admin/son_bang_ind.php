<!-- 子版块添加页 -->
<?php
    include '../inc/config.inc.php';
    include '../inc/mysql.inc.php';
    include '../inc/tool.inc.php';
    $link=connect();
    $head=array(
        'title'=>'添加子板块',
        'keywords'=>'添加子板块',
        'description'=>'添加子板块'
    );
    if (isset($_POST['submit'])){
        $cherk='ind';
        include 'inc/son_bang_cherk.php';
        $query="INSERT INTO  son_bang(father_id,son_bang_name,info,bang_id,sort) VALUES  ({$_POST['father_id']},'{$_POST['son_bang_name']}','{$_POST['info']}',{$_POST['bang_id']},{$_POST['sort']})";
        execute($link,$query);
        if (mysqli_affected_rows($link)==1){
            skip('son_bang_ind.php','ok','子版块添加成功！！');
        }else{
            skip('son_bang_ind.php','error','子板块添加失败！！');
        }
    }


?>
<?php  include 'inc/head.inc.php';?>
    <div id="main" >
        <div class="title">添加新子板块</div>
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
                                        echo "<option value='{$data_father['id']}'>{$data_father['bang_name']}</option>";
                                    }
                                ?>
                            </select>
                        </td>
                    <td>
                        选择创建子板块所要归属的父板块
                    </td>
                <tr>
                    <td>版块名称</td>
                    <td><input  name="son_bang_name" type="text" /></td>
                    <td>
                        板块名称不能为空，最大名称不能超过66个字符
                    </td>
                </tr>
                <tr>
                    <td>板块简介</td>
                    <td>
                        <textarea name="info"></textarea>
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
                    <td><input  name="sort"  value="0" type="text" /></td>
                    <td>
                        默认是0
                    </td>
                </tr>
            </table>
            <input style="margin-top: 20px; cursor:pointer;" class="btn" type="submit" name="submit" value="添加" />
        </form>
    </div>

<?php  include 'inc/footer.inc.php';?>

