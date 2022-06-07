<?php
    class Products{

        public $id;
        public $name;
        public $price;
        public $topping;

        public function __construct($id, $name, $price, $topping)
        {
            $this->id = $id;
            $this->name = $name;
            $this->price = $price;
            $this->topping = $topping;
        }
    }
?>