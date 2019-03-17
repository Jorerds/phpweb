<!-- 父板块列表页面 -->
<?php
    include_once '../inc/config.inc.php';
    include_once '../inc/mysql.inc.php';
    include '../inc/tool.inc.php';
    $link=connect();

//设置头部信息
    $head=array(
            'title'=>'父板块列表页',
            'keywords'=>'父板块列表页',
            'description'=>'父板块列表页'
    );
    if (isset($_POST['submit'])){
       foreach ($_POST['sort'] as $key=>$val){
           if (!is_numeric($val) || !is_numeric($key)){
               skip('father_bang.php','error','参数错误！');
           }
            $query[]="UPDATE father_bang SET  sort={$val} WHERE  id={$key}";
        }
       if (execute_multi($link,$query,$errot)){
           skip('father_bang.php','ok','排序修改成功！');
       }else{
           skip('father_bang.php','error','排序修改失败！');
       }
    }
?>

        <!-- 引入头部文件 -->
    <?php  include 'inc/head.inc.php';?>

    <div id="main" >
        <div class="title">父板块列表</div>
        <form method="post">
        <table class="list">
            <tr>
                <th>排序</th>
                <th>版块名称</th>
                <th>操作</th>
            </tr>
            <?php
            $query='SELECT * FROM  father_bang';
            $result=execute($link,$query);
            while ($data=mysqli_fetch_assoc($result)){
                //设置获取id变量
                $url_id=urldecode("father_bang_delete.php?id={$data['id']}");
                //设置返回页面url变量
                $return_url=urldecode($_SERVER['REQUEST_URI']);
                //设置一个提示变量
                $delete_name="确定要删除父板块：{$data['bang_name']}吗？";
                //把获取到的id用url返回到确认页面
                $delete_url="delete_remind.php?url={$url_id}& return_url={$return_url}&delete_name={$delete_name}";

$html=<<<STAR
        <tr>
                <td><input class="sort" type="text" name="sort[{$data['id']}]"  value="{$data['sort']}"/></td>
                <td>{$data['bang_name']}[id:{$data['id']}]</td>
                <td><a href="#">[访问]</a>&nbsp;&nbsp;<a href="father_bang_updata.php?id={$data['id']}">[编辑]</a>&nbsp;&nbsp;<a href="$delete_url">[删除]</a></td>
            </tr>
STAR;
                    echo $html;
            }


            ?>


        </table>
        <input class="btn" type="submit" name="submit" value="排序" />
        </form>
    </div>


        <!-- 引入底部文件 -->
    <?php  include 'inc/footer.inc.php';?>