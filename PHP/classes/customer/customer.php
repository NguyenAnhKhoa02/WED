<?php
    class Customer
    {
        public $id_customer;
        public $username;
        public $password;
        public $name;
        public $gender;
        public $birthday;
        public $phone;
        public $address;
        public $nameRole;
    
        function __construct(){}

        public static function OnlyDataCus($name,$gender,$birthday,$phone,$address){
            $instance = new self();
            $instance->name = $name;
            $instance->gender = $gender;
            $instance->birthday = $birthday;
            $instance->phone = $phone;
            $instance->address = $address;

            return $instance;
        }
        
        public static function AllDetail ($id_customer,$username,$password,$name,$gender,$birthday,$phone,$address,$nameRole){
            $instance = new self();
            $instance->id_customer = $id_customer;
            $instance->username = $username;
            $instance->password = $password;
            $instance->name = $name;
            $instance->gender = $gender;
            $instance->birthday = $birthday;
            $instance->phone = $phone;
            $instance->address = $address;
            $instance->nameRole = $nameRole;

            return $instance;
        }
    }
    

?>