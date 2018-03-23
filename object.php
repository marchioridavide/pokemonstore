<?php

    class Object
    {
        public $id, $identifier, $qty;
        function __construct($id, $identifier, $qty)
        {
            $this->id = $id;
            $this->identifier = $identifier;
            $this->qty = $qty;
        }
    }

?>