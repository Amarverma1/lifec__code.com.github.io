<?php
   session_start();
     // Establish a database connection
     $db_hostname = 'localhost';
     $db_username = 'root';
     $db_password = '';
     $db_name = 'registration';
  
     $conn = new mysqli($db_hostname, $db_username, $db_password, $db_name);
     if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
     }
  
    
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users_registration WHERE email = '$email' AND password = '$password'";
    
    $result = mysqli_query($conn, $sql);
    if (!$result) {
         echo "Error: " . mysqli_error($conn);
         exit;

    }

    $row = mysqli_fetch_assoc($result);
    if ($row) {
        echo "Hello " . $row['name'] . "<br/>";

    $_SESSION['id'] = $row['id'];
    $_SESSION['name'] = $row['name']; 
        
    setcookie("id", $row['id'], time()+3600);
    setcookie("name", $row['name'], time()+3600);  
    
    header("Location: ./amar/index.php");
      
    }else {
        echo "Wrong Username or Password<br/>";
        { echo 'Login failed!'; }
    


    }

    mysqli_close($conn);
?>