<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
        <link rel ="stylesheet" href = "bootstrap-4.0.0-dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="navbarr">
            <ul>
                <li><a class="active" href="list.php">Catalog</a></li>
                <?php
                    session_start();
                    if (is_numeric($_SESSION['user_id']))
                    {
                        echo '<li><a href="logout.php">Log Out</a></li>';
                        echo '<li><a href="showcart.php">Cart</a></li>';
                    }
                    else
                    {
                        echo '<li><a href="login.html">Log In</a></li><li><a href="sign.php">Sign Up</a></li>';
                    }
                ?>
                <li><a href="#about">About</a></li>
                
            </ul> 
        </div>
        <div id = "leest">
        <div class = "unown">Cart</div>
        <?php
            include('item.php');
            include('dbhelper.php');
            session_start();
            
            printcart();
            
            echo "<br>";
            echo "<form action = 'delete.php' method = 'post'>
                <input type = 'hidden' name = 'type' value = 'empty'>
                <input type = 'submit' value = 'Empty cart' class = 'del'>
                </form>";
        ?>
        </div>
    </body>
</html>