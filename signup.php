<?php

$servername="localhost";
$username="root";
$passord="";
$dbname="ecommerce";

$conn= new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error)
    {
        die("connection failed:". $conn->connect_error);
    }

    $fname= $_POST["firstname"];
    $lname= $_POST["lastname"];
    $email = $_POST["email"];
    $password=$_POST["password"];
    $role= $_POST["role"];

    // $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);


    

    $check_email = "SELECT * FROM `registeration` WHERE email = '$email'";
$check_email_query = $conn->query($check_email);

if ($check_email_query->num_rows > 0)
 {
    // Email already exists in the database
    echo '<script>alert("Email already exists. Please choose a different email.");</script>';
   
} 
else {
    $sql = "INSERT INTO `registeration` SET
    `first_name` = '$fname',
    `last_name` = '$lname',
    `email` = '$email',
    `pass` = '$password',
    `role` = '$role'";

    $result = $conn->query($sql);
    header("location: login_form.html");
}




?>