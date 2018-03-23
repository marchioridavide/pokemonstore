<?php
    include('item.php');
    $item = new Item($_GET['id_poke'], $_GET['ide_poke'], $_GET['qty']);

    if(!isset($_SESSION["cart_items"])) 
    {
        $_SESSION["cart_items"] = array($item);
    }
    else
    {
	   array_push($_SESSION["cart_items"], $item); 
    }

?>