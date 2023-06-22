<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "flowerpwer";

$connect = mysqli_connect($servername, $username, $password, $db);

if($connect === false) 
{
  die("Connection failed: ". mysqli_connect_error());
}

