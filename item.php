<?php
    class Item  
    {
        public $id;
	    public $identifier;
	    public $qty;
	    public $price;

        function __construct($id, $idetifier, $price, $qty) 
        {
            $this->id = $id;
            $this->identifier=$idetifier;
            $this->qty = $qty;
            $this->price = $price;
        }
        function printItemAsTr()  //stamparlo in tabella
        {
            echo " <td> ". $this->identifier . "</td><td>" . $this->price . " $</td><td><form action = showcart.php method = 'post'><input type = 'number' placeholder = $this->qty name = 'qty'><input type = 'hidden' name = 'type' value = 'editqty'><input type = 'hidden' name = 'pokeid' value = $this->id><input type = 'hidden' name = 'pokeident' value = $this->identifier><input type = 'hidden' name = 'pokeprice' value = $this->price></form></td>";
        }
        function getID()
        {
            return $this->id;
        }
        function getPrice()
        {
            return $this->price;
        }
        function getqty()
        {
            return $this->qty;
        }
        function getidentifier()
        {
            return $this->identifier;
        }
        function add($q)
        {
            $this->qty += 1;
        }
        

    }
?>