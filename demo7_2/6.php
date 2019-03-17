<?php
/*
.与{n}配合
*/
/*
$pattern='/t.{3}st/';//  t...st
$str='abctabcst';
var_dump(preg_match_all($pattern,$str,$arr));
var_dump($arr);
*/

/*
 .与*配合
*/

 $pattern='/t.*st/';//tst
$str='abctst';
var_dump(preg_match_all($pattern,$str,$arr));
var_dump($arr);
