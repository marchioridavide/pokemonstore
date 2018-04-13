<?php
    include('item.php');
    $qty = $_POST['qty'];
    if ($qty == 0) $qty = 1;
    $poke = new Item($_POST['id_poke'], $_POST['ide_poke'], $_POST['cost_poke'], $qty);
    $product = serialize($poke);
    session_start();

    if(!isset($_SESSION['cart_items'])) 
    {
        $_SESSION['cart_items'] = array($product);
    }
    else
    {
        foreach($_SESSION['cart_items'] as $key => $item)
        {
            $itm = unserialize($item);
            if($itm->getID() == $_POST['id_poke'])
            {
                $oldqty = $itm->getqty();
                $poke = new Item($_POST['id_poke'], $_POST['ide_poke'], $_POST['cost_poke'],  $qty + $oldqty);
                $product = serialize($poke);
                unset($_SESSION['cart_items'][$key]);
            }
        }
	   array_push($_SESSION['cart_items'], $product); 
    }

    header("Location: showcart.php");

?>