<?php
    session_start();
    require_once('../Functions/WishDB.php');
    
    if (!array_key_exists("user", $_SESSION)) {
        header('Location: login.php');
        exit;
    }
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <!-- include menu.php to display the menu -->
        <?php include '../Functions/menu.php'?>
        <h1>Hello!!!</h1>
    </body>
</html>
