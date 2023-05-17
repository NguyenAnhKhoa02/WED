<?php
    class ListCustomer extends ConnectDatabase
    {
        public $listCustomer = array();

        function __construct(){}

        function GetAll($keyId){
            $this->OpenCon();

            $string_query = "SELECT customer.id_customer, account.id_account, account.username, account.password, customer.name, customer.birthday, customer.gender,customer.address,customer.phone, group_roles.name as nameRole
                             FROM customer,account, group_roles
                             WHERE customer.id_account = account.id_account and group_roles.id_group_roles = account.id_group_roles";
            $this->ExcQuery($string_query);

            
            if($this->result->num_rows){
                while ($row = $this->result->fetch_assoc()) {
                    if(substr($row["id_customer"],0,4) == $keyId)
                        $this->listCustomer[] = Customer::AllDetail($row["id_customer"],$row["username"],$row["password"],$row["name"],$row["birthday"],$row["gender"],$row["address"],$row["phone"],$row["nameRole"]);
                }
            }

            $this->CloseCon();
        }

        function GetAllFromID($id){
            $this->OpenCon();

            $string_query = "SELECT customer.id_customer, account.id_account, account.username, account.password, customer.name, customer.birthday, customer.gender,customer.address,customer.phone, group_roles.name as nameRole
                             FROM customer,account, group_roles
                             WHERE customer.id_account = account.id_account and group_roles.id_group_roles = account.id_group_roles and customer.id_customer = '$id'";
            $this->ExcQuery($string_query);

            
            if($this->result->num_rows){
                while ($row = $this->result->fetch_assoc()) {
                    $this->listCustomer[] = Customer::AllDetail($row["id_customer"],$row["username"],$row["password"],$row["name"],$row["gender"],$row["birthday"],$row["phone"],$row["address"],$row["nameRole"]);
                }
            }

            $this->CloseCon();
        }

        function AddNewCustomer($id_customer,$name,$birthday,$gender,$address,$phone,$id_account){
            $this->OpenCon();

            $string_query = "INSERT INTO `customer`(`id_customer`, `name`, `birthday`, `gender`, `address`, `phone`, `id_account`) 
                             VALUES ('$id_customer','$name','$birthday','$gender','$address','$phone','$id_account')";
            $this->ExcQueryInsert($string_query);

            $this->CloseCon();
        }

        public $id_groupRole;
        public $id_customer;
        
        function GetIdFromIdAccount($id_account){
            $this->OpenCon();

            $string_query = "SELECT account.id_group_roles,customer.id_customer
                             FROM account,customer 
                             WHERE customer.id_account = account.id_account and account.id_account='$id_account'";

            $this->ExcQuery($string_query);

            if($this->result->num_rows){
                while ($row = $this->result->fetch_assoc()) {
                    $this->id_groupRole = $row["id_group_roles"];
                    $this->id_customer = $row["id_customer"];
                }
            }

            $this->CloseCon();
        }

        function getIdAccount($id_customer){
            $this->OpenCon();
            $string_query = "SELECT `id_account` FROM `customer` WHERE customer.id_customer='$id_customer'";

            $this->ExcQuery($string_query);
            if($this->result->num_rows){
                while ($row = $this->result->fetch_assoc()) {
                    $id_account = $row["id_account"];
                }
            }

            $this->CloseCon();
            return $id_account;
        }

        function RemoveCustomer($id){
            $this->OpenCon();

            $string_query = "DELETE FROM `customer` WHERE customer.id_customer='$id'";
            $this->ExcQueryInsert($string_query);

            $this->CloseCon();
        }

        function GetDataFromId($id){
            $this->OpenCon();
            
            $listCustomer = [];
            $string_query = "SELECT customer.name,customer.birthday,customer.gender,customer.gender,customer.address,customer.phone 
                             FROM `customer` 
                             WHERE customer.id_customer='$id'";
            $this->ExcQuery($string_query);

            if($this->result->num_rows){
                while ($row = $this->result->fetch_assoc()) {
                    $customer = Customer::OnlyDataCus($row["name"],
                                                                  $row["gender"],
                                                                  $row["birthday"],
                                                                  $row["phone"],
                                                                  $row["address"]);
                }
            }

            $this->CloseCon();

            return $customer;
        }

        function UpdateCustomer($id_customer,$name,$address,$phone){
            $this->OpenCon();

            $string_query = "UPDATE `customer` 
                             SET `name`='$name',`address`='$address',`phone`='$phone' 
                             WHERE customer.id_customer='$id_customer'";
            $this->ExcQueryInsert($string_query);

            $this->CloseCon();
        }
    }
    
?>