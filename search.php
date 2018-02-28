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
                <li><a href="login.html">Log In</a></li>
                <li><a href="sign.php">Sign Up</a></li>
                <li><a href="#about">About</a></li>
                <form action = "search.php" method = "get">
                    
                    <input type='text' class='mysearch' placeholder="Search..." name='searchbox'>
                    
                </form>
            </ul>
        </div>
        <div id="leest">
            <?php
            
                $word = $_GET['searchbox'];
            
                include('dbhelper.php');
                connect();
            
                $sth = execute("SELECT * FROM pokemon where pokemon.identifier like '%$word%'");
            
                echo "<table class ='table table-dark'><tr><th>Photo</th><th>name</th><th>height</th><th>weight</th></tr>";
                while($result = $sth->fetch(PDO::FETCH_ASSOC))
                {
                  echo "<tr><td>"."<img src='main-sprites/".$result['id'].".png' class='sprite'></td><td>" .$result['identifier']. "</td><td>" . $result['height']
                      ."</td><td>" .$result['weight'] . "</td>";
                }
                echo "</table>";
            
                
            ?>
        </div>
    </body>
</html> 