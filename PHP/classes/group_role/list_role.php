<?php
    class ListRole extends ConnectDatabase
    {
        public $listRole = [];

        function __construct(){}
        
        function getAllIdFromListName($listName){
            $this->OpenCon();

            foreach ($listName as $key => $value) {
                $string_query = "SELECT `id_role` FROM `role` WHERE role.name='$value'";
                $this->ExcQuery($string_query);

                if($this->result->num_rows){
                    while ($row = $this->result->fetch_assoc()) {
                        $this->listRole[] = $row["id_role"];
                    }
                }
            }

            $this->CloseCon();
        }
    }
    
?>