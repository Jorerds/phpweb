<?php 
    header('Content-type:text/html;charset=utf-8');
    session_start();
    var_dump($_SESSION);
    var_dump($_COOKIE); 
    var_dump(session_name());
?>