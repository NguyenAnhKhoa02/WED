<?php
    class Order
    {
        public $id;
        public $idCustomer;
        public $address;
        public $phone;
        public $createDate;
        public $receiveDate;
        public $status;
        public $idInvoice;
        public $sumprice; 
        public $nameProd;
        public $color;
        public $size;
        public $quantity;
        public $price;
        public $nameCus;

        public static function OrderForShowAdmin($createDate,$receiveDate,$address,$phone,$nameProd,$color,$size,$quantity,$price,$status,$nameCus,$idInvoice){
            $instance = new self(); 

            $instance->address = $address;
            $instance->phone = $phone;
            $instance->createDate = $createDate;
            $instance->receiveDate = $receiveDate;
            $instance->status = $status;
            $instance->nameProd = $nameProd;
            $instance->color = $color;
            $instance->size = $size;
            $instance->price = $price;
            $instance->quantity = $quantity;
            $instance->nameCus = $nameCus;
            $instance->idInvoice = $idInvoice;

            return $instance;
        }

        public static function OrderForShow($id,$idCustomer,$address,$phone,$createDate,$receiveDate,$status,$nameProd,$color,$size,$quantity,$price){
            $instance = new self(); 

            $instance->id = $id;
            $instance->idCustomer = $idCustomer;
            $instance->address = $address;
            $instance->phone = $phone;
            $instance->createDate = $createDate;
            $instance->receiveDate = $receiveDate;
            $instance->status = $status;
            $instance->nameProd = $nameProd;
            $instance->color = $color;
            $instance->size = $size;
            $instance->price = $price;
            $instance->quantity = $quantity;

            return $instance;
        }

        public static function OrderShowForManageOrderAdmin($id,$idCustomer,$createDate,$receiveDate,$sumprice,$status){
            $instance = new self();
            $instance->id = $id;
            $instance->idCustomer = $idCustomer;
            $instance->createDate = $createDate;
            $instance->receiveDate =$receiveDate;
            $instance->sumprice = $sumprice;
            $instance->status = $status;

            return $instance;
        }

        public static function OrderShowForManageOrder($id,$idInvoice,$createDate,$receiveDate,$sumprice,$status){
            $instance = new self();
            $instance->id = $id;
            $instance->idInvoice = $idInvoice;
            $instance->createDate = $createDate;
            $instance->receiveDate =$receiveDate;
            $instance->sumprice = $sumprice;
            $instance->status = $status;

            return $instance;
        }
    }
    
?>