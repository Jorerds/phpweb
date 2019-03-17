<?php
include 'inc/config.inc.php';
include 'inc/mysql.inc.php';
include 'inc/tool.inc.php';
$link=connect();
$template['css']=array('style/css/public.css','style/css/index.css');
$urs_id=isLogin($link);


$head=array(
    'title'=>'镜论坛',
    'keywords'=>'镜论坛首页面',
    'description'=>'镜论坛首页面'
);

?>
<?php  include 'inc/header.inc.php'?>
<div style="margin-top:55px;"></div>
<div id="hot" class="auto">
    <div class="title">热门动态</div>
    <ul class="newlist">
        <!-- 20条 -->
        <li><a href="#">[库队]</a> <a href="#">私房库实战项目录制中...</a></li>

    </ul>
    <div style="clear:both;"></div>
</div>
<?php
    $query_father="SELECT * FROM father_bang ORDER BY sort DESC ";
    $result_father=execute($link,$query_father);
    while ($father_data=mysqli_fetch_assoc($result_father)) {
        ?>
        <div class="box auto">
            <div class="title">
                <a href="list_father.php?id=<?php echo $father_data['id'] ?>"><?php echo $father_data['bang_name']?></a>
    </div>
            <div class="classList"><?php
                $query_son="SELECT * FROM son_bang WHERE  father_id={$father_data['id']}";
                $result_son=execute($link,$query_son);
                if (mysqli_num_rows($result_son)){
                    while ($son_data=mysqli_fetch_assoc($result_son)){
                        $query_date="SELECT  count(*) FROM  post WHERE son_id={$son_data['id']} AND new_time>CURRENT_DATE ()";
                         $count_date=num($link,$query_date);
                        $query_all="SELECT  count(*) FROM  post WHERE son_id={$son_data['id']}";
                        $count_all=num($link,$query_all);
                        $html1=<<<A
                                <div class="childBox new">
                                    <h2><a href='list_son.php?id={$son_data['id']}'>{$son_data['son_bang_name']}</a> <span>(今日{$count_date})</span></h2>
                                    帖子：{$count_all}<br/>
                                </div>
A;
                    echo $html1;
                    }
                }else{
                    echo '<div style="padding:10px 0;">暂无子版块...</div>';
                }
                ?>
                <div style="clear:both;"></div>
            </div>
        </div>
        <?php
    }

?>





<?php include 'inc/footer.inc.php'?>
