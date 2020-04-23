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

        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        return $conn;
    }
}