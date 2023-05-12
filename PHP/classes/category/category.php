<?php
    // require('connect_database.php');
    class Category
    {
        public $id;
        public $name;
        function __construct($id,$name){
            $this->id = $id;
            $this->name = $name;
        }

        function getID(){
            return $this->id;
        }
    }
    
?>