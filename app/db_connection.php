<?php
// database Connection
$host = "localhost";
$username = "root";
$password = "";
$db =  "shoppinglist";
$conn = new mysqli($host,$username,$password,$db);
if($conn->connect_error){
die("connection error".$conn->connect_error);
}
session_start();
error_reporting('1');
?>
