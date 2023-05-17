<?php
    class Account
    {
        public $id_account;
        public $username;
        public $password;
        public $id_group_roles;

        function __construct($id_account,$username,$password,$id_group_roles){
            $this->id_account = $id_account;
            $this->username = $username;
            $this->password = $password;
            $this->id_group_roles = $id_group_roles;
        }
    }
    
?>