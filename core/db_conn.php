<?php

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'crud_operations';


$connection = new mysqli($host, $username, $password, $dbname);

if (!$connection) {
    die("Connection Failed");
}
