<?php
$servername = "localhost";
$username = "root";
$password = "password";
//$dbname = "jobschedule";

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
//$conn = new mysqli($servername, $username, $password);

//echo phpversion();

$conn = mysqli_connect($servername, $username, $password);
 
// Check connection
/*if($conn->connect_error){
    die("ERROR: Could not connect. " . $conn->connect_error);
}*/

if($conn == false){
	die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Print host information
//echo "Connect Successfully. Host info: " . $conn->host_info;
echo "Connect Successfully. Host info: " . mysqli_get_host_info($conn);
?>