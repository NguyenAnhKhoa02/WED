<?php
    class ListType extends ConnectDatabase
    {
        public $listType = array();

        function __construct(){}

        function getAll(){
            $this->OpenCon();
            $string_query = 'SELECT * FROM type_product';
            $this->ExcQuery($string_query);

            if($this->result->num_rows>0){
                while ($row = $this->result->fetch_assoc()) {
                    $this->listType[] = new Type($row["id_type_product"],$row["nameType"]);
                }
            }

            $this->CloseCon();
        }

        private function createID(){
            return $this->countAllRows() + 1;
        }

        private function countAllRows(){
            $string_query = "SELECT COUNT(*) as number FROM type_product";
            $this->ExcQuery($string_query);

            while ($row = $this->result->fetch_assoc()) {
                return $row["number"];
            }
        }

        function addNewType($name){
            $this->OpenCon();

            $string_query = 'INSERT INTO type_product(id_type_product,nameType) VALUES (\''.uniqid("type",false).'\',\''.$name.'\')';
            $this->ExcQueryInsert($string_query);
            $this->CloseCon();
        }

        function getIdFromName($name){
            $this->OpenCon();

            $string_query = "SELECT `id_type_product` FROM `type_product` WHERE type_product.nameType = \"$name\";";
            $this->ExcQuery($string_query);

            while ($row = $this->result->fetch_assoc()) {
                return $row['id_type_product'];
            }

            $this->CloseCon();
        }
    }
    
?>