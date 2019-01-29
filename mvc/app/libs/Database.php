<?php
namespace App\Libs;
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
                echo "error" .PHP_E01;
                exit;
            }
            return $this->conn;
        }
        
        public function select($target = '*'){
            $this->query .= 'SELECT '.$target.' ';
            return $this;
        }
        public function update($tableName){
            $this->query = 'UPDATE '.$tableName.' ';
            return $this;
        }
        public function insert(){
            $this->query = 'INSERT ';
            return $this;
        }
        public function delete(){
            $this->query = 'DELETE ';
            return $this;
        }
        public function softDelete($columnName){
            $this->query .= 'SET '.$columnName .' ';
            return $this;
        }
        public function columns($columns){
            $this->query .= '(' . $columns . ')';
            return $this;
        }
        public function into($tableName){
            $this->query .='INTO '.$tableName.' ';
            return $this;
        }
        public function row($rows){
            $this->query .='(';
            foreach ($rows as $row){
                $this->query .= $row.',';
            }
            $query = $this->query;
            $this->query = substr($query, 0, -1);
            $this->query .= ') ';
            return $this;
        }
        public function value($value){
            $this->query .='VALUES (' .$value .')';
            $query = $this->query;
            return $this;
        }
        public function set($values){
            $this->query .='SET ';
            foreach ($values as $key => $value){
                $this->query .= $key."="." '".$value."',";
            }
            $query = $this->query;
            $this->query = substr($query, 0, -1);
            $this->query .= ' ';
            return $this;
        }
        public function from($tableName){
            $this->query .= 'FROM '.$tableName.' ';
            return $this;
        }
        public function where($field, $value, $operator = '='){
            $this->query .= 'WHERE '.$field.' '.$operator.' "'.$value.'" ';
            return $this;
        }
        public function whereAnd($field, $value, $operator = '='){
            $this->query .= 'AND '.$field.' '.$operator.' "'.$value.'" ';
            return $this;
        }
        public function whereOr($field, $value, $operator = '='){
            $this->query .= 'OR '.$field.' '.$operator.' '.$value.' ';
            return $this;
        }
        
        public function get(){
            $result = mysqli_query($this->connect(), $this->query);
            //$row = mysqli_fetch_array($result);
            echo $this->query;
            return $result;

        }
    }
?>