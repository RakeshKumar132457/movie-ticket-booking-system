<?php 
$servername = "localhost";
$user = "root";
$password = "";
$dbname = "movies";

$email = $_POST["email_conf"];
$passwd = $_POST["passwd_conf"];


$con = new mysqli($servername, $user, $password , $dbname);

if($con->connect_error){
		die("Connection Failed !!" . $con->connect_error);
}
if(isset($_POST["email_conf"], $_POST["passwd_conf"])) 
    {     

        $name = $_POST["email_conf"]; 
        $password = $_POST["passwd_conf"]; 

        $result1 = mysqli_query($con,"SELECT email, passwd FROM signup WHERE email = '".$name."' AND  passwd = '".$password."'");

        if(mysqli_num_rows($result1) > 0 )
        { 
            $_SESSION["logged_in"] = true; 
            $_SESSION["nameID	"] = $name; 
			header('location:main.html');
        }
        else
        {
          echo '<script src="js/alert.js"></script>';
        }
}
