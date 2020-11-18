<?php

$servername = "localhost";
$user = "root";
$password = "";
$dbname = "movies";

$uname = $_POST["uname"];
$mname = $_POST["moviename"];
$review = $_POST["review"];

$conn = new mysqli($servername, $user, $password , $dbname);
	
if($conn->connect_error){
		die("Connection Failed !!" . $conn->connect_error);
}else{
	echo "Connected Successfully!!";
}

$sql = "create table  if not exists reviews(
	uname longtext,
	mname longtext,
	review longtext
)";

if($conn->query($sql)==TRUE){
	echo "Table created Successfully";
}else{
	echo "Error ". $sql ." <br> " . $conn->error;
}

$sql = "insert into reviews  (	uname , mname,review) values ('$uname','$mname','$review')";

if($conn->query($sql)==TRUE){
	echo "Data Entered Successfully";
	header('location:main.html');
}else{
	echo "Error ". $sql ." <br> " . $conn->error;
}

$conn->close();

?>