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
                    }
                    else
                    {
                        echo '<li><a href="login.html">Log In</a></li><li><a href="sign.php">Sign Up</a></li>';
                    }
                ?>
                <li><a href="#about">About</a></li>
                <form action = "search.php" method = get>
                    
                    <input type='text' class='mysearch' name ='searchbox' placeholder="Search...">
                    
                </form>
            </ul> 
        </div>
        
        <div id ="leest">
            <?php
                session_start();
                echo "<br>";
            
                if(is_numeric($_SESSION['user_id']))
                {
                echo "<img src = 'main-sprites/user.png' class = 'sprite'>";
                echo $_SESSION['user_name'];
                echo "<br>";
                echo "<br>";
                }
                
                include('dbhelper.php');
                $pokeid = $_GET['poketd'];
            
                $sql = "select * from pokemon where id = $pokeid";
                            
                $res = execute($sql);
                $result = $res->fetch(PDO::FETCH_ASSOC);
            
                echo "Normal form (HG/SS): <br>" ;
                echo "<img src = 'main-sprites/".$result['id'].".png' class = 'sprite'><br>";
            
                echo "<br>";
                
                echo "Shiny form (HG/SS): <br>" ;
                echo "<img src = 'main-sprites/shiny/".$result['id'].".png' class = 'sprite'><br>";
            
                echo "<br>";
            
                echo "Back form (B/W): <br>" ;
                echo "<img src = 'back/".$result['id'].".png' class = 'sprite'><br>";
            
                echo "<br>";
                
                echo "Back shiny form (B/W): <br>" ;
                echo "<img src = 'back-shiny/".$result['id'].".png' class = 'sprite'><br>";
            
            ?>
        </div>
    </body>
</html>