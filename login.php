<?php
    error_reporting(1); ini_set('error_reporting', E_ALL);
    
    include('dbhelper.php');
    connect();
    $user = $_POST['username'];
    $pass = $_POST['password'];
        
    $query = "select id from users where username = '$user' and password = '$pass'";
    $sth = execute($query);
    
    $result = $sth->fetch(PDO::FETCH_ASSOC);

    $id = $result['id'];

    session_start();
    $_SESSION['user_id'] = $id;

    $_SESSION['user_name'] = $user;

    if (is_numeric($id)) header('Location: list.php');
    
?>