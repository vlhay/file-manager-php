<?php

// wap phpmyadmin
// ionutvmi@gmail.com
// master-land.net

session_start();

if ($_GET['act'] == 'logout') {
    session_destroy();
    header("Location: index.php");
    exit;
}
