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
        public $url_image;
        public $quantity_purchased;

        function __construct($id,$name,$price,$description,$material,$gender,$made_by,$status,$category,$type_product,$color,$size,$quantity,$url_image,$quantity_purchased){
            $this->id = $id;
            $this->price = $price;
            $this->name = $name;
            $this->description = $description;
            $this->material = $material;
            $this->gender = $gender;
            $this->made_by = $made_by;
            $this->status = $status;
            $this->category = $category;
            $this->type_product = $type_product;
            $this->color = $color;
            $this->size = $size;
            $this->quantity = $quantity;
            $this->url_image = $url_image;
            $this->quantity_purchased = $quantity_purchased;
        }
    }
?>