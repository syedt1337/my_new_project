<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
        body {
            
            /* background-image: url('download.jpg'); */
            
            background-size: cover; 
            background-repeat: no-repeat;
            background-attachment: fixed; 
            background-position: center; 

            
            background-color: rgba(0, 0, 0, 0.5);

             
        }
        body {
            background-color: #f4f4f4;
        }
        /* .navbar {
            background-color: #343a40;
        } */
        .navbar h2 {
            color: #fff;
            font-weight: bold;
        }
        .container {
            margin-top: 20px;
        }
        .card {
            border: none;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card-title {
            font-size: 24px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>

</head>
<body>
   <?php 
  
  session_start();
  
  error_reporting(0);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommerce";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];    //receive email from login_form.html
    $password = $_POST["password"]; //receive password form login_form.html
    

    // Check if it's a user login
    $sql = "SELECT * FROM registeration WHERE email='$email'";
    $result = $conn->query($sql);
    
    if ($result === false) {
        die("Error executing user SQL query: " . $conn->error);
    }
    
    $row = $result->fetch_assoc();
    
    if ($result->num_rows > 0) {
        
      echo $row["password"];
        
        if ($password === $_POST["password"]) {
            
            if ($row["role"] === 'user') {
                $_SESSION["first_name"]=$row["first_name"];
                $_SESSION['role'] = $row['role'];
                $_SESSION["email"]=$email;
                $_SESSION["password"]=$password;
                header("Location: http://localhost/my_new_project/index.php");
                exit();
            } elseif ($row["role"] === 'admin') {
                header("Location: http://localhost/my_new_project/index.php");
                exit();
            }
        }
    }
    else 
    {
            echo "Wrong username or passwords";
        }
    
}



?>
    


</body>
</html>