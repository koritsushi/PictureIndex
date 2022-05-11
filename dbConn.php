<?php

$dsn = "mysql:host=localhost;dbname=pictureindexdb";
$user = 'root';
$pass = '';

$db = mysqli_connect("localhost","root","","pictureindexdb");

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

?>