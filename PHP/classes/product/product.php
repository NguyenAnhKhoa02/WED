<?php
    class Product{
        public $id;
        public $price;
        public $name;
        public $description;
        public $material;
        public $gender;
        public $made_by;
        public $status;
        public $category;
        public $type_product;
        public $color;
        public $size;
        public $quantity;
        public $image;
        public $quantity_purchased;

        function __construct(){}

        public static function Product($id,$name,$price,$description,$material,$gender,$made_by,$status,$category,$type_product,$color,$size,$quantity,$image,$quantity_purchased){
            $instance = new self();
            $instance->id = $id;
            $instance->price = $price;
            $instance->name = $name;
            $instance->description = $description;
            $instance->material = $material;
            $instance->gender = $gender;
            $instance->made_by = $made_by;
            $instance->status = $status;
            $instance->category = $category;
            $instance->type_product = $type_product;
            $instance->color = $color;
            $instance->size = $size;
            $instance->quantity = $quantity;
            $instance->image = $image;
            $instance->quantity_purchased = $quantity_purchased;

            return $instance;
        }

        public static function ProductInCart($id,$name,$color,$size,$quantity,$price){
            $instance = new self();
            $instance->id = $id;
            $instance->name = $name;
            $instance->color = $color;
            $instance->size = $size;
            $instance->quantity = $quantity;
            $instance->price = $price;
            return $instance;
        }
    }
?>