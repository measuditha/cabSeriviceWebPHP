<?php

 class dbcon {

  
    public $conn;

    function connect(){

    //$this->conn = new mysqli("localhost", "root", "password", "cedcab");
    $this ->conn = mysqli_connect("localhost", "root", "", "gocheeta"); 

    if ($this->conn->connect_error) {
    die("Connection failed: " . $this->conn->connect_error);
    }
    return $this->conn;
    }

    }
 ?>