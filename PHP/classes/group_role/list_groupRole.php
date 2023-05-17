<?php
    class ListGroupRole extends ConnectDatabase
    {
        public $listGroupRole = array();  

        function __construct(){}

        function getAllGroupRole(){
            $this->OpenCon();

            $string_query = "SELECT * FROM `group_roles`";
            $this->ExcQuery($string_query);

            if($this->result->num_rows){
                while ($row = $this->result->fetch_assoc()) {
                    $this->listGroupRole[] = new GroupRole($row["id_group_roles"],$row["name"]);
                }
            }

            $this->CloseCon();
        }

        function AddRoleToGroup($name,$listIdRole){
            $this->OpenCon();

            $id = uniqid("grup",false);
            $string_query = "INSERT INTO `group_roles`(`id_group_roles`, `name`) VALUES ('$id','$name')";
            $this->ExcQuery($string_query);

            foreach ($listIdRole as $key => $value) {
                $string_query = "INSERT INTO `role_in_group`(`id_role`, `id_group_role`) VALUES ('$value','$id')";
                $this->ExcQuery($string_query);
            }

            $this->CloseCon();
        }

        function UpdateGroupRole($idGroup,$name,$listIdRole){
            $this->OpenCon();

            $string_query = "UPDATE `group_roles` SET `name`='$name' WHERE group_roles.id_group_roles='$idGroup'";
            $this->ExcQueryInsert($string_query);

            $string_query = "DELETE FROM `role_in_group` WHERE role_in_group.id_group_role = '$idGroup'";
            $this->ExcQueryInsert($string_query);
            foreach ($listIdRole as $key => $value) {
                $string_query = "INSERT INTO `role_in_group`(`id_role`, `id_group_role`) VALUES ('$value','$idGroup')";
                $this->ExcQuery($string_query);
            }
            $this->CloseCon();
        }

        function RemoveGroupRole($id){
            $this->OpenCon();

            $string_query = "DELETE FROM `role_in_group` WHERE role_in_group.id_group_role = '$id'";
            $this->ExcQueryInsert($string_query);

            $string_query = "DELETE FROM `group_roles` WHERE group_roles.id_group_roles='$id'";
            $this->ExcQueryInsert($string_query);

            $this->CloseCon();
        }
        
        public $id_group_role;
        public $listNameRole = [];
        public $nameGroupRole;
        function GetGroupRoleByID($id){
            $this->OpenCon();
            $this->listGroupRole = [];
            $string_query = "SELECT role_in_group.id_group_role, role.name as nameRole, group_roles.name as nameGroupRole 
                             from role_in_group
                             INNER JOIN group_roles ON group_roles.id_group_roles = role_in_group.id_group_role
                             INNER JOIN role ON role.id_role = role_in_group.id_role
                             WHERE group_roles.id_group_roles = '$id'";
            $this->ExcQuery($string_query);

            if($this->result->num_rows){
                while ($row = $this->result->fetch_assoc()) {
                    $this->id_group_role = $row["id_group_role"];
                    $this->nameGroupRole = $row["nameGroupRole"];
                    $this->listNameRole[] = $row["nameRole"];
                }
            }
        }

        function GetIdFromName($name){
            $this->OpenCon();

            $string_query = "SELECT group_roles.id_group_roles 
                             FROM `group_roles` 
                             WHERE group_roles.name='$name'";
            $this->ExcQuery($string_query);

            if($this->result->num_rows){
                while ($row = $this->result->fetch_assoc()) {
                    $id = $row["id_group_roles"];
                    $this->CloseCon();
                    return $id;
                }
            }

            $this->CloseCon();
        }
    }
    
?>