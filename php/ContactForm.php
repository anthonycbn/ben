

<?php
$servername = "localhost";
$database = "contactform";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$name =  mysqli_real_escape_string($conn, $_POST['name']);
$email =  mysqli_real_escape_string($conn, $_POST['email']);
$phone =  mysqli_real_escape_string($conn, $_POST['phone']);
$subject =  mysqli_real_escape_string($conn, $_POST['subject']);
$message =  mysqli_real_escape_string($conn, $_POST['message']);

//Insert Query of SQL
$query = "insert into contact(name, email, phone, subject, message) values ('$name', '$email', '$phone', '$subject', '$message')";


if(mysqli_query($conn, $query)){
     $_POST = array();
} else{
    echo "ERROR: was not able to execute $query. " . mysqli_error($conn);
}

mysqli_close($conn);

?>