<?php
    session_start();
    require_once('../Functions/WishDB.php');
    
    if (!array_key_exists("user", $_SESSION)) {
        header('Location: login.php');
        exit;
    }
    if ($_SESSION['power'] != 10) {
        header('Location: overview.php');
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
        <title>
            Manage Accounts
        </title>
    </head>
    <body>
        <!-- include menu.php to display the menu -->
        <?php include '../Functions/menu.php'?>
        
        <!-- manage_users -->
        <div class = "manage_users">
            <ul class = "account_ul">
                <li class = "account_li"><img class = "account_icon" src="../Images/admin.png" />Admin</li>
                <li class = "account_li"><img class = "account_icon" src="../Images/user.png" />User</li>
            </ul>
		</div>
		<table>
		<tr class = "account_tr">
    		<th>Username</th>
    		<th>Power</th>
  		</tr>
		<?php 
    		$result = WishDB::getInstance()->get_admin();
    		while($row = mysqli_fetch_array($result)){
    		    echo "<tr>";
    		    echo "<td>" . htmlentities($row['name']) . "</td>";
    		    echo "<td>" . htmlentities($row['power']) . "</td>";
    		    echo "</tr>";
    		}
		?>
		</table> 
    </body>
</html>
