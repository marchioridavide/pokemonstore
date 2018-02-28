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
                <form action = "search.php" method = get>
                    
                    <input type='text' class='mysearch' name ='searchbox' placeholder="Search...">
                    
                </form>
            </ul> 
        </div>
        <div id="leest">
            <?php
            
                
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
            
                echo "<table class ='table table-dark'><tr><th>Photo</th><th>name</th><th>height</th><th>weight</th></tr>";
                while($result = $sth->fetch(PDO::FETCH_ASSOC))
                {
                  echo "<tr><td>"."<img src='main-sprites/".$result['id'].".png' class='sprite'></td><td>" .$result['identifier']. "</td><td>" . $result['height']
                      ."</td><td>" .$result['weight'] . "</td>";
                }
                echo "</table>";
            
                if ($all_pages > 1)
                {
                  if ($pag > 1)
                  {  
                      echo "<a href=\"" . $_SERVER['PHP_SELF'] . "?pag=" . ($pag - 1) . "\">";
                      echo "Pagina Indietro</a>&nbsp;";
                  }

                  if ($all_pages > $pag)
                  {  
                      echo "<a href=\"" . $_SERVER['PHP_SELF'] . "?pag=" . ($pag + 1) . "\">";
                      echo "Pagina Avanti</a>";
                  }
                  echo "<br>";
                  
                  for ($p=1; $p<=$all_pages; $p++) { //[13]
                      echo "<a href=\"" . $_SERVER['PHP_SELF'] . "?pag=" . $p . "\">";
                      echo $p . "</a>&nbsp;";
                  }
              }
            ?>
        </div>
    </body>
</html> 