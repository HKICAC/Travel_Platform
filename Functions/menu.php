<style>
<?php include '/style.css'; ?>
</style>

<!-- menu bar -->
<ul class = "nav">
    <!-- Name of the tool and go to homepage when clicked -->
    <li class = "left"><a href = './logout.php'>STool</a></li>
    <?php 
        // if user has logged in then display the following menu bar
        if (isset($_SESSION['user'])) {
            echo "<li class = 'right'><a href = './logout.php'>Logout</a></li>";
            echo "<a href = './currency.php'><li class = 'left1'>Currency</li></a>";
            // if the user has high power (admin) display the following option
            if ($_SESSION['power'] == 10) {
                echo "<a href = './account.php'><li class = 'right'>Account</li></a>";
            }
         
        }
        // else display the following menu bar
        else {
            echo "<a href = './login.php'><li class = 'right'>Login</li></a>";
            echo "<a href = './register.php'><li class = 'right'>Register</li></a>";
        }
      
    ?>

</ul>


