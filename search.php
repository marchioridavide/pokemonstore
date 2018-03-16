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
                <form action = "search.php" method = "get">
                    
                    <input type='text' class='mysearch' placeholder="Search..." name='searchbox'>
                    
                </form>
            </ul>
        </div>
        <div id="leest">
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
            
                $word = $_GET['searchbox'];
            
                include('dbhelper.php');
                connect();
            
                $sth = execute("SELECT * FROM pokemon where pokemon.identifier like '%$word%'");
            
                echo "<table class ='table table-dark'><tr><th>ID</th><th>Photo</th><th>name</th><th>height</th><th>weight</th></tr>";
                while($result = $sth->fetch(PDO::FETCH_ASSOC))
                {
                  $id = $result['id'];
                  echo "<tr><form action = 'details.php' method = 'get'><td><input type ='hidden' name = 'poketd' value = $id>".$result['id']."</td><td>"."<input type ='image' src='main-sprites/".$result['id'].".png' class='sprite' alt='Submit Form' /></td></form><td>" .$result['identifier']. "</td><td>" . $result['height']
                      ."</td><td>" .$result['weight'] . "</td>";
                }
                echo "</table>";
            
                
            ?>
        </div>
    </body>
</html> 