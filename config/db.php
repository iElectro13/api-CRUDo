<?php

    class Db{
        private $dbHost = "us-cdbr-east-05.cleardb.net";
        private $dbUser = 'bc701aab48f994';
        private $dbPass = '77fd0877';
        private $dbName = 'heroku_cecc42230860d35';


        public function conectionDb(){
            $mysqlConnect = "mysql:host=$this->dbHost;dbname=$this->dbName";
            $dbConection = new PDO($mysqlConnect, $this->dbUser, $this->dbPass);
            $dbConection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $dbConection;
        }
    }
?>