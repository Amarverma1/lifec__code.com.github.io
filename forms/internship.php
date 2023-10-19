<?php
$name = $_POST['name'];
$email = $_POST['email'];
$internDomain = $_POST['internDomain'];
$password = $_POST['password'];
$gender = $_POST['gender'];
$mobileNumber = $_POST['mobileNumber'];
$linkedinProfileLink = $_POST['linkedinProfileLink'];
$githubLink = $_POST['githubLink'];
$qualification = $_POST['qualification'];
$streamName = $_POST['streamName'];
$collegename = $_POST['collegename'];
$passingYear = $_POST['passingYear'];
//$filename = $_FILES['pdf_file']['name'];
//$tempfile = $_FILES['pdf_file']['tmp_name'];
//$folder = "project/amar/".$filename;
//move_uploaded_file($tempfile, $folder);
$date = $_POST['date'];
$time = $_POST['time'];


//datbase connection
$conn = new mysqli('localhost','root','','registration');
if($conn->connect_error){
die("Connection failed: " . $conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into users_registration(name, email, internDomain, password, gender, mobileNumber, linkedinProfileLink, githubLink, qualification, streamName, collegename, passingYear, date)values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("sssssisssssii",$name, $email, $internDomain, $password, $gender, $mobileNumber, $linkedinProfileLink, $githubLink, $qualification, $streamName, $collegename, $passingYear, $date);
    $stmt->execute();
    echo "successfully...";
    $stmt-> close();
    $conn-> close();
}

?>