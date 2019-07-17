<?php

$servername = "localhost";
$user = "root";
$password = "";
$dbname = "movies";



$mvName = $_POST["movie_name"];
$qty = $_POST["quantity"];

$conn = new mysqli($servername, $user, $password , $dbname);

if($conn->connect_error){
		die("Connection Failed !!" . $conn->connect_error);
}

$sql = "create table  if not exists bookTkt(
	movie_name longtext,
	quantity int
)";

if($conn->query($sql)==TRUE){
}else{
	echo "Error ". $sql ." <br> " . $conn->error;
}

$sql_query = "insert into booktkt  (movie_name,quantity) values ('$mvName','$qty')";


if($conn->query($sql_query)==TRUE){
	echo '<script src="js/ticketsum.js"></script>';
}else{
	echo "Error ". $sql ." <br> " . $conn->error;
}

?>