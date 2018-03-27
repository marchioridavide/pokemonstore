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
                
                $x_pag = 10;
            
                if (isset($_GET['pag']))
                  {
                      $pag = $_GET['pag'];
                  }
                  else
                  {
                     $pag  = 1;
                  }
            
                if (!$pag || !is_numeric($pag))  //[3]
                  {
                      $pag = 1;
                  }
            
                include('dbhelper.php');
                connect();
                $sql = "SELECT count(*) FROM pokemon";
                $result = execute_getRows($sql);
                $all_pages = ceil($result / $x_pag);
                $first = ($pag-1) * $x_pag;
                $sth = execute("SELECT * FROM pokemon LIMIT $first, $x_pag");
            
                echo "<table class ='table table-dark'><tr><th>ID</th><th>Photo</th><th>name</th><th>height</th><th>weight</th></tr>";
                while($result = $sth->fetch(PDO::FETCH_ASSOC))
                {
                  $id = $result['id'];
                  echo "<tr><form action = 'details.php' method = 'get'><td><input type ='hidden' name = 'poketd' value = $id>".$result['id']."</td><td>"."<input type ='image' src='main-sprites/".$result['id'].".png' class='sprite' alt='Submit Form' /></td></form><td>" .$result['identifier']. "</td><td>" . $result['height']
                      ."</td><td>" .$result['weight'] . "</td>";
                }
                echo "</table>";
                echo "<br>";
            
                if($all_pages > 1)
                {
                    echo "<ul class = 'pagination justify-content-center'>";
                    
                  if ($pag > 1)
                  {  
                      echo "<li class = 'page-item'><a class = 'page-link' href=\"" . $_SERVER['PHP_SELF'] . "?pag=" . ($pag - 1) . "\">";
                      echo "Back</a></li>&nbsp;";
                  }
                    
                  if ($all_pages > $pag)
                  {  
                      echo "<li class = 'page-item'><a class = 'page-link' href=\"" . $_SERVER['PHP_SELF'] . "?pag=" . ($pag + 1) . "\">";
                      echo "Next</a></li>";
                  }
                    
                  echo "</ul>";
                }
                ?>
        </div>
        <br>    
                <?php
            
                echo "<div class = 'pagebuttons'>";
                if ($all_pages > 1)
                {
                  echo "<br>";
                  echo "<br>";
                  
                  for ($p=1; $p<$all_pages; $p++) { //[13]
                      echo "<a href=\"" . $_SERVER['PHP_SELF'] . "?pag=" . $p . "\">";
                      echo"<button class='navbutt'>". $p . "</button></a>&nbsp;";
                  }
                  
                  echo "</div>";
                  
              }
            ?>
    </body>
</html>