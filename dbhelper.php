<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <link rel ="stylesheet" href = "bootstrap-4.0.0-dist/css/bootstrap.min.css">
    </head>
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
        return $conn;
    }
    function execute_getRows($string)
    {
        $conn = connect();
        
        $sql = $string; 
        $sth = $conn->prepare($sql);
        $sth->execute();
        $all_rows = $sth->fetchColumn();
        return $all_rows;
    }
    function execute($string)
    {
        $conn = connect();
        
        $sql = $string;
        $sth = $conn->prepare($sql);
        $sth->execute();
        return $sth;
    }
    function insert($string)
    {
        $conn = connect();
        $sql = $string;
        $sth = $conn->prepare($sql);
        $sth->execute();
    }
        
    function printcart()
    {
        try{
            $total = 0;
            echo "<table class = 'table table-dark'>
                <tr><th>Photo</th><th>Name</th><th>Price</th><th>qty</th></tr>";
            
            foreach ($_SESSION['cart_items'] as $item)
            {
                
                echo "<tr>";        
                $itm = unserialize($item);
                $total = $total + ($itm->getPrice() * $itm->getqty());
                $id = $itm->getID();
                echo "<td><img src = 'main-sprites/$id.png'></td>";
                $itm->printItemAsTr();
                echo "<td><form action = 'delete.php' method = 'post'><input type='hidden' value = $id name = 'pokeid'><input type = 'hidden' value = 'delete' name = 'type'><input type = 'submit' value = 'Delete' class = 'del'> </form></td>";
                echo "</tr>";
                
            }
            echo "</table>";
            echo "Total: $total PokeDollars";
            echo "<br>";
        }
        catch (Exception $e)
        {
            echo "Empty cart";
        }
    }
    
    
?>
    </body>
</html>