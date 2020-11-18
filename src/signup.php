<?php

$servername = "localhost";
$user = "root";
$password = "";
$dbname = "movies";



$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$passwd = $_POST["passwd"];


$conn = new mysqli($servername, $user, $password , $dbname);

if($conn->connect_error){
		die("Connection Failed !!" . $conn->connect_error);
}else{
	echo "Connected Successfully!!";
}

$sql = "create table  if not exists signup(
	first_name longtext,
	last_name longtext,
	email longtext,
	passwd longtext
)";

if($conn->query($sql)==TRUE){
	echo "Table created Successfully";
}else{
	echo "Error ". $sql ." <br> " . $conn->error;
}

$sql_query = "insert into signup  (first_name ,last_name, email , passwd) values ('$fname','$lname','$email','$passwd')";


if($conn->query($sql_query)==TRUE){
	echo "Data Entered Successfully";
	header('location:index.html');
}else{
	echo "Error ". $sql ." <br> " . $conn->error;
}

$conn->close();

?>