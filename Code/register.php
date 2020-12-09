<?php
    require_once('../Functions/WishDB.php');
    require_once('../Functions/function.php');
    // create variables
    $userIsEmpty = false;
    $passwordIsEmpty = false;
    WishDB::getInstance()->reset_key();
    
    // verify user's credentials
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if ($_POST["user"] == "") {
            $userIsEmpty = true;
        }
        if ($_POST["pw"] == "") {
            $passwordIsEmpty = true;
        }
        if (!$userIsEmpty && !$passwordIsEmpty) {
            WishDB::getInstance()->create_credentials($_POST["user"], $_POST["pw"]);
            header('Location: login.php');
            echo '<script type="text/javascript"> alert("Account Created!") </script>';
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
            Register
        </title>
    </head>
    <body>
        <!-- include menu.php to display the menu -->
        <?php include '../Functions/menu.php'?>
        
        <!-- login box -->
        <div class = "loginBox">
            <!-- login box title -->
            <ul class = "login">
                <li>Register</li>
            </ul>
            <!-- login form -->
            <form name = "register" action = "register.php" method = "POST" class = "loginForm" autocomplete="off">
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
                    if ($userIsEmpty && $passwordIsEmpty) {
                        echo "Enter the username and password, please!";
                    } else if ($passwordIsEmpty) {
                        echo ("Enter the password, please!");
                    } else if ($userIsEmpty) {
                        echo ("Enter the username, please!");
                    }
                ?>
                </div>
                <input type = "submit" value = "Register" class = "loginButton"/>
                <br><br><br>
            </form>
        </div>
    </body>
</html>
