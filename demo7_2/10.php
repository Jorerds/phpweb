<?php 
/*
^与$配合使用
*/
$pattern='/^te.*st$/';
$str='tedwqdwqdwqdwqdwqdqdwqdqst';
var_dump(preg_match_all($pattern,$str,$arr));
var_dump($arr);
?>