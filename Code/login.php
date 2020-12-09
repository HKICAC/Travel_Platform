<?php
    require_once("../Functions/WishDB.php");
    $logonSuccess = false;
    
    // verify user's credentials
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $logonSuccess = (WishDB::getInstance()->verify_credentials($_POST['user'], $_POST['pw']));
        if ($logonSuccess == true)
        {
            session_start();
            $_SESSION['user'] = $_POST['user'];
            $_SESSION['power'] = (WishDB::getInstance()->get_user_power($_SESSION['user']));;
            header('Location: overview.php');
            exit;
        }
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
        <link rel="stylesheet" href="../Functions/style.css">
        <meta charset="UTF-8">
        <title>
            Login
        </title>
    </head>
    <body>
        <!-- include menu.php to display the menu -->
        <?php include '../Functions/menu.php'?>
        
        <!-- login box -->
        <div class = "loginBox">
            <!-- login box title -->
            <ul class = "login">
                <li>Login</li>
            </ul>
            <!-- login form -->
            <form name = "login" action = "login.php" method = "POST" class = "loginForm" autocomplete="off">
                <!-- username field -->
                Username   <input class = "loginInput" style = "margin-left: 10px" type = "text" name = "user"/><br>
                <br>
                <!-- password field -->
                Password   <input class = "loginInput" style = "margin-left: 13px" type = "password" name ="pw"/><br>
                <br>
                <!-- login button -->
                <div style = "margin-left: 87px; margin-bottom: 20px">
                    <?php
                        // display error message if the username / password does not match the database
                        if ($_SERVER['REQUEST_METHOD'] == "POST"){ 
                            if (!$logonSuccess) {
                                echo "Invalid name and /or password";
                            }
                        }
                    ?>
                </div>
                <input type = "submit" value = "Login" class = "loginButton"/>
                <br><br><br>
            </form>
        </div>
    </body>
</html>
