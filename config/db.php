<?php

    class Db{
        private $dbHost = 'localhost';
        private $dbUser = 'test';
        private $dbPass = '1234prueba';
        private $dbName = 'api_crudo';


        public function conectionDb(){
            $mysqlConnect = "mysql:host=$this->dbHost;dbname=$this->dbName";
            $dbConection = new PDO($mysqlConnect, $this->dbUser, $this->dbPass);
            $dbConection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $dbConection;
        }
    }
?>