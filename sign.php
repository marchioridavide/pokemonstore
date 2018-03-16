<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
        <link rel = "stylesheet" href="bootstrap-4.0.0-dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="navbarr">
            <ul>
                <li><a href="list.php">Catalog</a></li>
                <li><a href="login.html">Log In</a></li>
                <li><a class="active" href="sign.php">Sign Up</a></li>
                <li><a href="#about">About</a></li>
            </ul>
        </div>
        <div class="container">
            <div class="unown">Sign in</div><br>
            <form action ="signin.php" method="post">
            <input type="text" name ="username", placeholder="Username" class = "inputtext"><br><div class="space"><br></div>
            <input type="text" name ="nome", placeholder="Nome" class = "inputtext"><br><div class="space"><br></div>
            <input type="text" name ="cognome", placeholder="Cognome" class = "inputtext"><br><div class="space"><br></div>
            <input type="text" name ="email", placeholder="Email" class = "inputtext"><br><div class="space"><br></div>  
            <input type= "password" name ="password", placeholder="Password" class = "inputtext"><br><div class="space"><br></div>
            <input type= "password" name ="passconf", placeholder="Conferma Password" class = "inputtext"><br>
            <div class="space"><br><br></div>
            <input type="submit" class="sub" name="conferma" value="Submit">
            </form>
        </div>
    </body>
</html>