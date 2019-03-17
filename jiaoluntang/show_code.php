<?php
session_start();
include 'inc/vcode.inc.php';
$_SESSION['vcode']=vcode(150,50,5,30);

?>