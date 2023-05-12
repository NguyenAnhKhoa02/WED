<?php
    class ListCategory extends ConnectDatabase{
        public $listCategory = array();

        function _construct(){}

        function getAll(){
            $this->OpenCon();
            $string_query = 'SELECT * FROM category';
            $this->ExcQuery($string_query);

            if($this->result->num_rows>0){
                while ($row = $this->result->fetch_assoc()) {
                    $this->listCategory[] = new Category($row["id_category"],$row["nameCate"]);
                }
            }

            $this->CloseCon();
        }

        private function createID(){
            return $this->countAllRows() + 1;
        }

        function addNewCategory($name){
            $this->OpenCon();
            $string_query = 'INSERT INTO category(id_category, nameCate) VALUES (\''.uniqid("cate",false).'\',\''.$name.'\')';
            $this->ExcQueryInsert($string_query);
            $this->CloseCon();
        }

        private function countAllRows(){
            $string_query = 'SELECT COUNT(*) as number FROM category';

            $this->ExcQuery($string_query);
            if($this->result->num_rows>0){
                while ($row = $this->result->fetch_assoc()) {
                    return $row["number"];
                }
            }
        }

        function getIdFromName($name){
            $this->OpenCon();

            $string_query = "SELECT `id_category` FROM `category` WHERE category.nameCate=\"$name\";";
            $this->ExcQuery($string_query);

            while ($row = $this->result->fetch_assoc()) {
                return $row['id_category'];
            }

            $this->CloseCon();
        }
    }
?>