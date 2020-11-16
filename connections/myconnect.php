<?php 
//Database Details
$server = '127.0.0.1';
$username = 'chatzilla';
$password = '12345';
$database = 'chatzilla';

//Database Connection
$conn = mysqli_connect($server, $username, $password, $database);

//Check Connection
if(!$conn){
	die("Connection Failed! " . mysqli_connect_error($conn));
}


?>