<?php

class DbClass {
    private $servername;
    private $username;
    private $password;
    private $dbname;

    protected function connect(){
        $this->servername = "localhost";
        $this->username = "DWP";
        $this->password = "123456";
				$this->dbname = "shortcircuit"; 
				/*
				$this->servername = "mysql81.unoeuro.com";
        $this->username = "bjerringgaard_com";
        $this->password = "********";
        $this->dbname = "bjerringgaard_com_db_shortcircuit";*/

        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        return $conn;
    }
}