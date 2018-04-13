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
            echo " <td> ". $this->identifier . "</td><td>" . $this->price . " $</td><td>" . $this->qty ."</td>";
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
        function add($q)
        {
            $this->qty += 1;
        }
        

    }
?>