<?php
    $id = $_POST['pokeid'];
    echo $id;
    session_start();
    include("item.php");
    if ($_POST['type'] == 'delete')
    {
        foreach($_SESSION['cart_items'] as $key => $item)
        {
            $itm = unserialize($item);
            if($itm->getID() == $id)
            {
                unset($_SESSION['cart_items'][$key]);
                header("Location: showcart.php");
            }
        }
    }
    if ($_POST['type'] == 'empty')
    {
        unset($_SESSION['cart_items']);
        header("Location: list.php");
    }



?>