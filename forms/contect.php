<?php
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

//datbase connection
$conn = new mysqli('localhost','root','','contect');
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into contect_users(name, email, subject, message)values(?, ?, ?, ?)");

    $stmt->bind_param("ssss",$name, $email, $subject, $message);
    $stmt->execute();
    echo "successfully...";
    $stmt-> close();
    $conn-> close();


}

?>