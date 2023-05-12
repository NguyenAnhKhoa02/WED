<?php
    class ConnectDatabase{
        public $result;

        private $servername = "localhost";
        private $username = 'root';
        private $password = '';
        private $db = 'web';

        private $conn;

        function _construction(){}

        function OpenCon(){
            $this->conn = new mysqli($this->servername,$this->username,$this->password,$this->db);

            if(!$this->conn){
                die("Fail");
            }
        }

        function ExcQuery($str_query){
            $this->result = $this->conn->query($str_query);
        }
        
        function ExcQueryInsert($str_query){
            $this->conn->query($str_query);
        }

        function CloseCon(){
            $this->conn->close();  
        }
    }

?>