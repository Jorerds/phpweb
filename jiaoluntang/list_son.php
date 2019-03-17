<?php
include 'inc/config.inc.php';
include 'inc/mysql.inc.php';
include 'inc/tool.inc.php';
include 'inc/page.inc.php';
$link=connect();
$template['css']=array('style/css/public.css','style/css/list.css');

if (!isset($_GET['id']) || !is_numeric($_GET['id'])){
    skip('index.php','error','参数id传输错误！');
}
$query_son="SELECT * FROM son_bang WHERE  id={$_GET['id']}";
$result_son=execute($link,$query_son);
if (mysqli_num_rows($result_son)==0){
    skip('index.php','error','子板块不存在！');
}
$data_son=mysqli_fetch_array($result_son);

$head=array(
    'title'=>"镜论坛—{$data_son['son_bang_name']}",
    'keywords'=>"镜论坛{$data_son['son_bang_name']}面",
    'description'=>"镜论坛{$data_son['son_bang_name']}面"
);
?>

<?php include 'inc/header.inc.php'?>
<div style="margin-top:55px;"></div>
<div id="position" class="auto">
    <?php
    $query="SELECT  son.id,father.id father_id,son.son_bang_name,father.bang_name FROM father_bang father,son_bang son WHERE   son.father_id=father.id AND son.id={$_GET['id']}";
    $result=execute($link,$query);
    $data=mysqli_fetch_array($result);
    ?>
    <a href="index.php">首页</a> &gt; <a href="list_father.php?id=<?php echo $data['father_id']?>"><?php  echo $data['bang_name']?></a> &gt; <a><?php echo $data_son['son_bang_name']?></a>
</div>
<div id="main" class="auto">
    <div id="left">
        <div class="box_wrap">
            <h3><?php echo $data_son['son_bang_name']?></h3>
            <div class="num">
                今日：<span>7</span>&nbsp;&nbsp;&nbsp;
                总帖：<span>158061</span>
            </div>
            <div class="moderator">版主：<span>孙胜利</span></div>
            <div class="notice">在此版块展出的均为官方推荐的优质资源……</div>
            <div class="pages_wrap">
                <a class="btn publish" href=""></a>
                <div class="pages">
                    <a>« 上一页</a>
                    <a>1</a>
                    <span>2</span>
                    <a>3</a>
                    <a>4</a>
                    <a>...13</a>
                    <a>下一页 »</a>
                </div>
                <div style="clear:both;"></div>
            </div>
        </div>
        <div style="clear:both;"></div>
        <ul class="postsList">
            <li>
                <div class="smallPic">
                    <a href="#">
                        <img width="45" height="45"src="style/2374101_small.jpg">
                    </a>
                </div>
                <div class="subject">
                    <div class="titleWrap"><a href="#">[分类]</a>&nbsp;&nbsp;<h2><a href="#">我这篇帖子不错哦</a></h2></div>
                    <p>
                        楼主：孙胜利&nbsp;2014-12-08&nbsp;&nbsp;&nbsp;&nbsp;最后回复：2014-12-08
                    </p>
                </div>
                <div class="count">
                    <p>
                        回复<br /><span>41</span>
                    </p>
                    <p>
                        浏览<br /><span>896</span>
                    </p>
                </div>
                <div style="clear:both;"></div>
            </li>
        </ul>
        <div class="pages_wrap">
            <a class="btn publish" href=""></a>
            <div class="pages">
                <a>« 上一页</a>
                <a>1</a>
                <span>2</span>
                <a>3</a>
                <a>4</a>
                <a>...13</a>
                <a>下一页 »</a>
            </div>
            <div style="clear:both;"></div>
        </div>
    </div>
    <div id="right">
        <div class="classList">
            <div class="title">版块列表</div>
            <ul class="listWrap">
                <li>
                    <h2><a href="#">NBA</a></h2>
                    <ul>
                        <li><h3><a href="#">私房库</a></h3></li>
                        <li><h3><a href="#">私</a></h3></li>
                        <li><h3><a href="#">房</a></h3></li>
                    </ul>
                </li>
                <li>
                    <h2><a href="#">CBA</a></h2>
                </li>
            </ul>
        </div>
    </div>
    <div style="clear:both;"></div>
</div>
<?php  include 'inc/footer.inc.php'?>
