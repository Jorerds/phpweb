<?php
$pattern='/test/';
$str='abctestdwqdwqtestdwqdwqtestdwqdwqdqwtesttest';
var_dump(preg_match_all($pattern,$str,$arr));
var_dump($arr);