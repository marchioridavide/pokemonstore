<html>
    <head></head>
    <body>
<?php

 
     
    function connect()
    {
            $servername = 'localhost';
            $dbName = 'POKEMON';
            $username = 'root';
            $password = 'mysql';
            $conn = null;
        try{
            $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully";
        }
        catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
    }
    function execute_getRows($string)
    {
        $servername = 'localhost';
        $dbName = 'POKEMON';
        $username = 'root';
        $password = 'mysql';
        $conn = null;
        try{
            $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully";
        }
        catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
        
        $sql = $string; 
        $sth = $conn->prepare($sql);
        $sth->execute();
        $all_rows = $sth->fetchColumn();
        return $all_rows;
    }
    function execute($string)
    {
        $servername = 'localhost';
        $dbName = 'POKEMON';
        $username = 'root';
        $password = 'mysql';
        $conn = null;
        try{
            $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully";
        }
        
        catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
        
        $sql = $string;
        $sth = $conn->prepare($sql);
        $sth->execute();
        return $sth;
    }
    function insert($string)
    {
        $servername = 'localhost';
        $dbName = 'POKEMON';
        $username = 'root';
        $password = 'mysql';
        $conn = null;
        try{
            $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully";
        }
        catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
        
        $sql = $string;
        $sth = $conn->prepare($sql);
        $sth->execute();
    }
    
?>
    </body>
</html>