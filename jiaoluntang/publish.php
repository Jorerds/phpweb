<?php
include 'inc/config.inc.php';
include 'inc/mysql.inc.php';
include 'inc/tool.inc.php';
$link=connect();
if (!$urs_id=isLogin($link)){
    skip('login.php','error','请登录后再进行发帖！');
}
$head=array(
    'title'=>'创建新帖子',
    'keywords'=>'创建新帖子页',
    'description'=>'创建新帖子页'
);
$template['css']=array('style/css/public.css','style/css/publish.css');

    if (isset($_POST['submit'])){
        include 'inc/check_publish.inc.php';
        $_POST=escape($link,$_POST);
        $query="INSERT INTO post(son_id,title,content,new_time,urs_id) VALUES ({$_POST['son_id']},'{$_POST['title']}','{$_POST['content']}',now(),{$urs_id})";
        execute($link,$query);
        if (mysqli_affected_rows($link)==1){
            skip('publish.php','ok','发布成功！');
        }else{
            skip('publish.php','error','发布失败！');
        }
    }

?>

<?php include 'inc/header.inc.php'?>
<div style="margin-top:55px;"></div>
<div id="position" class="auto">
    <a>首页</a> &gt; 发表帖子
</div>
<div id="publish">
    <form method="post">
        <select name="son_id">
            <?php
            $query="SELECT * FROM father_bang ORDER BY  sort DESC ";
            $resultFather=execute($link,$query);
            while ($dataFather=mysqli_fetch_assoc($resultFather)){
                    echo "<optgroup label='{$dataFather['bang_name']}'>";
                    $query="SELECT * FROM son_bang WHERE  father_id={$dataFather['id']} ORDER BY sort DESC ";
                    $resultSon=execute($link,$query);
                while ($dataSon=mysqli_fetch_assoc($resultSon)){
                    echo "<option value='{$dataSon['id']}'>{$dataSon['son_bang_name']}</option>";
                }
            }
            ?>
        </select>
        <input class="title" placeholder="请输入标题" name="title" type="text" />
        <textarea name="content" class="content" id="editor_id"></textarea>
        <script>
            KindEditor.ready(function(K) {
                window.editor = K.create('#editor_id');
            });
        </script>
        <input class="publish" type="submit" name="submit" value="" />
        <div style="clear:both;"></div>
    </form>
</div>
<?php include 'inc/footer.inc.php'?>