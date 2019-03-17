<?php
include 'inc/config.inc.php';
include 'inc/mysql.inc.php';
include 'inc/tool.inc.php';
include 'inc/page.inc.php';
$link=connect();
$template['css']=array('style/css/public.css','style/css/list.css');
$urs_id=isLogin($link);


if (!isset($_GET['id']) || !is_numeric($_GET['id'])){
    skip('index.php','error','参数id传输错误！');
}
$query_father="SELECT * FROM father_bang WHERE  id={$_GET['id']}";
$father_result=execute($link,$query_father);
if(mysqli_num_rows($father_result)==0){
    skip('index.php','error','父板块不存在！');
}
$data_father=mysqli_fetch_assoc($father_result);
$query_son="SELECT * FROM son_bang WHERE  father_id={$_GET['id']}";
$son_result=execute($link,$query_son);
$id_son='';
$son_list='';
while ($data_son=mysqli_fetch_assoc($son_result)){
    $id_son.=$data_son['id'].',';
    $son_list.="<a>{$data_son['son_bang_name']}</a> ";
}
$id_son=trim($id_son,',');
if ($id_son==''){
    $id_son='0';
}
$query_post="SELECT count(*) FROM post WHERE  son_id IN ({$id_son})";
$post_all=num($link,$query_post);

$query_count="SELECT count(*) FROM post WHERE  son_id IN ({$id_son}) AND new_time>CURRENT_DATE ()";
$post_count=num($link,$query_count);

$head=array(
    'title'=>"镜论坛—{$data_father['bang_name']}",
    'keywords'=>"镜论坛{$data_father['bang_name']}面",
    'description'=>"镜论坛{$data_father['bang_name']}面"
);

?>
<?php  include 'inc/header.inc.php'?>
<div style="margin-top:55px;"></div>
<div id="position" class="auto">
    <a href="index.php">首页</a> &gt; <a href="list_father.php?id=<?php echo $data_father['id']?>"><?php echo $data_father['bang_name']?></a>
</div>
<div id="main" class="auto">
    <div id="left">
        <div class="box_wrap">
            <h3><?php echo $data_father['bang_name']?></h3>
            <div class="num">
                                今日：<span><?php echo $post_count?></span>&nbsp;
                                总帖：<span><?php  echo $post_all?></span>
                        <div class="moderator">子版块：<?php  echo $son_list?></div>
            </div>
            <div class="pages_wrap">
                <a class="btn publish" href=""></a>
                <div class="pages">
                    <?php
                    /*调用分页函数*/
                    $page=page($post_all,1);
                    echo  $page['html'];
                    ?>
                </div>
                <div style="clear:both;"></div>
            </div>
        </div>
        <div style="clear:both;"></div>
        <ul class="postsList">
            <?php
                $query_list="SELECT son.id,son.son_bang_name,
                ps.id,ps.son_id,ps.title,ps.urs_id,ps.new_time,ps.times,
                mb.id,mb.urs_name,mb.portrait
                FROM son_bang son,member mb,post ps WHERE  
                ps.son_id IN ({$id_son}) 
                AND ps.urs_id=mb.id 
                AND ps.son_id=son.id {$page['limit']}";
                $list_result=execute($link,$query_list);
                while ($data_list=mysqli_fetch_assoc($list_result)){
                    ?>
                     <li>
                <div class="smallPic">
                    <a href="#">
                        <img width="45" height="45"src="<?php if ($data_list['portrait']!=''){echo $data_list['portrait'];}else{echo 'style/img/2374101_small.jpg';}?>">
                    </a>
                </div>
                <div class="subject">
                    <div class="titleWrap"><a href="#">[<?php echo$data_list['son_bang_name'] ?>]</a>&nbsp;&nbsp;<h2><a href="#"><?php echo $data_list['title'] ?></a></h2></div>
                    <p>
                        楼主：<?php echo $data_list['urs_name']?>&nbsp;<?php echo$data_list['new_time']?>&nbsp;&nbsp;&nbsp;&nbsp;最后回复：2014-12-08
                    </p>
                </div>
                <div class="count">
                    <p>
                        回复<br /><span>41</span>
                    </p>
                    <p>
                        浏览<br /><span><?php echo $data_list['times']?></span>
                    </p>
                </div>
                <div style="clear:both;"></div>
            </li>
        <?php
                }
            ?>

        </ul>
        <div class="pages_wrap">
            <a class="btn publish" href=""></a>
            <div class="pages">
                <?php
                echo  $page['html'];
                ?>
            </div>
            <div style="clear:both;"></div>
        </div>
    </div>
    <div id="right">
        <div class="classList">
            <div class="title">版块列表</div>
            <ul class="listWrap">
                <?php
                $query='SELECT * FROM father_bang ORDER BY sort';
                $result_father=execute($link,$query);
                while ($father_data=mysqli_fetch_assoc($result_father)) {
                    ?>
                    <li>
                        <h2><a href="list_father.php?id=<?php echo $father_data['id'] ?>"><?php echo $father_data['bang_name']?></a></h2>
                        <ul>
                            <?php
                            $query="SELECT * FROM son_bang WHERE  father_id={$father_data['id']}";
                            $result_son=execute($link,$query);
                            while ($son_data=mysqli_fetch_assoc($result_son)) {
                                ?>
                                <li><h3><a href="#"><?php echo $son_data['son_bang_name']?></a></h3></li>
                            <?php
                                }
                            ?>
                        </ul>
                    </li>
                <?php
                     }
                ?>
            </ul>
        </div>
    </div>
    <div style="clear:both;"></div>
</div>


<?php include 'inc/footer.inc.php'?>
