<?php
    class ListAccount extends ConnectDatabase
    {
        function __construct(){}

        function AddAccount($id_account,$username,$password,$id_group_roles){
            $this->OpenCon();

            $string_query = "INSERT INTO `account`(`id_account`, `username`, `password`, `id_group_roles`) VALUES ('$id_account','$username','$password','$id_group_roles')";
            $this->ExcQueryInsert($string_query);

            $this->CloseCon();
        }

        function CheckUserIsExist($username){
            $this->OpenCon();

            $string_query = "SELECT COUNT(*) FROM `account` WHERE account.username='$username'";
            $this->ExcQuery($string_query);

            if($this->result->num_rows){
                while ($row = $this->result->fetch_assoc()) {
                    if($row["COUNT(*)"] == 1) return false;
                    return true; 
                }
            }

            $this->CloseCon();
        }

        public $id_account;
        public $id_group_roles;
        function CheckLogin($username,$password){
            $this->OpenCon();

            $string_query = "SELECT `id_account`,`id_group_roles` FROM `account` WHERE account.username='$username' and account.password='$password'";
            echo $string_query;
            $this->ExcQuery($string_query);

            if($this->result->num_rows){
                while ($row = $this->result->fetch_assoc()) {
                    if($row["id_account"] == "") return false;
                    $this->id_account = $row["id_account"];
                    $this->id_group_roles = $row["id_group_roles"];
                    return true;
                }
            }

            $this->CloseCon();
        }

        function RemoveAccount($id){
            $this->OpenCon();

            $string_query = "DELETE FROM `account` WHERE account.id_account='$id'";
            $this->ExcQueryInsert($string_query);

            $this->CloseCon();
        }

        function UpdatePasswordAccount($id,$password,$id_group_roles){
            $this->OpenCon();

            $string_query = "UPDATE `account` 
                             SET `password`='$password',`id_group_roles`='$id_group_roles'
                             WHERE account.id_account = '$id'";
            $this->ExcQueryInsert($string_query);

            $this->CloseCon();
        }
    }
    
?>