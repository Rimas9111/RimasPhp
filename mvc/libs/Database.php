<?php
    class Database
    {
        private $conn;
        private $query = "";
        public function connect(){
            // $serverName = "localhost";
            // $userName = "root";
            // $password = "";
            // $dbName ="dbName";

            // $connection = mysqli_connect($serverName, $userName ,$password , $dbName);
            $this->conn = mysqli_connect("localhost", "root", "", "dbname");
            if (!$this->conn){
                echo "error" .PHP_EOL;
            }
            return $this->conn;
        }
        public function select($target = '*'){
            $this->query .= 'SELECT '.$target.' ';
            return $this;
        }
        public function from($tableName){
            $this->query .= 'FROM '.$tableName.' ';
            return $this;
        }
        public function where($field, $value, $operator = '='){
            $this->query .= 'WHERE '.$field.' '.$operator.' '.$value.' ';
            return $this;
        }
        public function whereAnd($field, $value, $operator = '='){
            $this->query .= 'AND '.$field.' '.$operator.' '.$value.' ';
            return $this;
        }
        public function whereOr($field, $value, $operator = '='){
            $this->query .= 'OR '.$field.' '.$operator.' '.$value.' ';
            return $this;
        }
        
        public function get(){
            $result = mysqli_query($this->connect(), $this->query);
            $row = mysqli_fetch_array($result);
            return $row;

        }
    }
?>