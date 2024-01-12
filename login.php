<?php
$servername="localhost";
$username="password";
$pasword="";
$dbname="ecommerce";


$conn= new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error)
    {
        die("connection failed:". $conn->connect_error);
    }
    
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    $sql = "SELECT *from user_registeration where email='$email'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

if ($row['email']) {
    if ($row['password'] == $password) {
        header("Location: http://localhost/my_new_project_index.html?username=$storedUsername&email=$storedUseremail");
    

    }
}

?>