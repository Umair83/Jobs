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

$sql = "CREATE DATABASE IF NOT EXISTS jobschedule";
if(mysqli_query($conn, $sql)){
	echo "Database created successfully";
}else{
	echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
}
/*if($conn->query($sql) == TRUE){
    echo "Database created successfully";
} else{
    echo "Error creating database. " . $conn->error;
}*/

$db_selected = mysqli_select_db($conn, "jobschedule");
if(!$db_selected){
	die("Can't use jobschedule: " . mysqli_error($conn));
}

$sql = "CREATE TABLE IF NOT EXISTS jobs(
	id_num INT AUTO_INCREMENT,
	customer_name VARCHAR(30),
	company VARCHAR(30),
	PRIMARY KEY(id_num)
	)";
	

if ($conn->query($sql) == TRUE) 
{
	echo "Table jobs created successfully";
} 
else 
{
	echo "Error creating table: " . $conn->error;
}
?>