<?php
    // start the session
    session_start();
    // require the needed phps
    require_once('../Functions/button.php');
    require_once('../Functions/WishDB.php');
    
    // redirect users to login.php with session info is not found
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
        <title>Currency Converter</title>
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="../Functions/style.css">
        <script type="text/javascript" src="../Functions/script.js"></script>
    </head>
    <body>
    
    	<!-- include menu.php to display the menu -->
        <?php include '../Functions/menu.php'?>
        <!-- title -->
        <h1>My Currencies Converter</h1>
        <!-- div to show the calculated value -->
        <div class="block1">
        	<!-- p to show the final result -->
            <p id="exchange"></p>
        </div>
        <!-- div for user input -->
        <div class="block2">
            Number of decimal places: 
            <!-- radio buttons for significant figure -->
            <input name="significant" onchange="calculate()" type="radio" value="1" />1 
            <input name="significant" onchange="calculate()" type="radio" value="2" />2 
            <input name="significant" onchange="calculate()" type="radio" value="3" />3 
            <input name="significant" onchange="calculate()" type="radio" value="4" />4 
            <input name="significant" onchange="calculate()" type="radio" value="5" />5 
            <input name="significant" onchange="calculate()" type="radio" value="6" />6<br><br> 
            <!-- input for original value -->
            <input id="value1" type="text" oninput="calculate()"/>
            <!-- select for country1 -->
            <select id="curreny1" onchange="calculate()">
        	<?php 
                drawSelect();
            ?>
            </select><br><br>
            <!-- input for calculated value -->
            <input id="value2" type="text" disabled/>
            <!-- select for country1 -->
            <select id="curreny2" onchange="calculate()">
            <?php 
                drawSelect();
            ?>
            </select><br><br>
            <!-- input for switching value -->
            <input type="submit" value="Swap"/>
        </div>
    </body>
</html>
