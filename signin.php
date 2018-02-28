<html>
    <head></head>
    <body>
<?php
        error_reporting(1); ini_set('error_reporting', E_ALL);
    
    include('dbhelper.php');
    connect();
    $user = $_POST['username'];
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $passconf = $_POST['passconf'];
        

    if($pass == $passconf)
    {
        $query = "insert into users (nome,cognome,mail,password,username) VALUES ('$nome','$cognome','$email','$pass','$user')";
        echo $query;
        insert($query);
        header('Location: login.html')
    }else{
        echo 'password non conforme';
    }

?>
    </body>
</html>