<?php
header('Content-type:text/html;charset=utf-8');
/*
    调用方法：$page=page(100,10,6);
    返回值：array()
  参数说明：
    $count ：数据总记录数
    $pageSize ：单页显示的数据记录数
    $numBtn ：展示页码按钮数
    $page ：分页GET参数
 */
function page($count,$pageSize,$numBtn=10,$page='page'){
    if (!isset($_GET[$page]) || !is_numeric($_GET[$page]) || $_GET[$page]<1){
        $_GET[$page]=1;

    }
    /*计算总页数*/
    $pageAll=ceil($count/$pageSize);
    if ($_GET[$page]>$pageAll){
        $_GET[$page]=$pageAll;
    }
    /*****************************************************/

    /*构造url地址*/
    $start=($_GET[$page]-1)*$pageSize;
    $limit="limit {$start},{$pageSize}";
    $urlCurrent=$_SERVER['REQUEST_URI'];
    $arrCurrent=parse_url($urlCurrent); //将url拆分到数组
    $currentPath=$arrCurrent['path'];
    $url='';
    if (isset($arrCurrent['query'])){
            parse_str($arrCurrent['query'],$arrQuery);
            unset($arrQuery[$page]);
            if (empty($arrQuery)){
                $url="{$currentPath}?{$page}=";
            }else{
                $source=http_build_query($arrQuery);
                $url="{$currentPath}?{$source}&{$page}=";
            }
    }else{
        $url="{$currentPath}?{$page}=";
    }
    /*****************************************************************************/

    $html=array();
    if ($numBtn>=$pageAll){
        /*把所有的页码按钮全部显示*/
        for ($i=1;$i<=$pageAll;$i++){//$pageAll是限制循环次数以控制显示按钮数目的变量，$i是记录页码号
            if ($_GET[$page]==$i) {
                $html[$i]= "<span>{$i}</span>";
            }else{
                $html[$i]="<a href='{$url}{$i}'>{$i}</a>";
            }
        }
    }else{
        $numLeft=floor(($numBtn-1)/2);
        $start=$_GET[$page]-$numLeft;
        $end=$start+($numBtn-1);
        /*纠正出现负数的页数*/
        if ($start<1){
            $start=1;
        }
        if ($end>$pageAll){
            $start=$pageAll-($numBtn-1);
        }
        for ($i=0;$i<$numBtn;$i++){
            if ($_GET[$page]==$start){
                    $html[$start]="<span>{$start}</span>";
            }else {
                $html[$start]= "<a href='{$url}{$start}'>{$start}</a>";
            }
            $start++;
        }
        /*如果按钮数目大于等于3的时候做省略号*/
        if (count($html)>=3){
            reset($html);
            $keyFirst=key($html);
            end($html);
            $keyEnd=key($html);
            if ($keyFirst!=1){
                array_shift($html);
                array_unshift($html,"<a href='{$url}1'>1...</a>");
            }
            if ($keyEnd!=$pageAll){
                array_pop($html);
                array_push($html,"<a href='{$url}{$pageAll}'>...{$pageAll}</a>");
            }
        }
    /****************************************************************************/
    }

    if ($_GET[$page]!=1){
        $prev=$_GET[$page]-1;
        array_unshift($html,"<a href='{$url}{$prev}'>上一页</a>");
    }
    if ($_GET[$page]!=$pageAll){
        $next=$_GET[$page]+1;
        array_push($html,"<a href='{$url}{$next}'>下一页</a>");
    }
    $html=implode(' ',$html);
    $data=array(
        'limit'=>$limit,
        'html'=>$html

    );

    return $data;
}
$page=page(100,10,6);
echo $page['html'];

?>
