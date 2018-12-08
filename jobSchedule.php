<?php include('server.php');
/*$servername = "localhost";
$username = "root";
$password = "password";*/
//$dbname = "jobschedule";

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
//$conn = new mysqli($servername, $username, $password);

//echo phpversion();

//$conn = mysqli_connect($servername, $username, $password);
 
// Check connection
/*if($conn->connect_error){
    die("ERROR: Could not connect. " . $conn->connect_error);
}*/

/*if($conn == false){
	die("ERROR: Could not connect. " . mysqli_connect_error());
}*/
 
// Print host information
//echo "Connect Successfully. Host info: " . $conn->host_info;
//echo "Connect Successfully. Host info: " . mysqli_get_host_info($conn);

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

$sql = "CREATE TABLE jobs(
	id_num INT AUTO_INCREMENT,
	customer_name VARCHAR(30),
	status VARCHAR(30),                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     company VARCHAR(30),
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

if(isset($_POST["customer_name"]) && isset($_POST["company"])){
	$customer_name = $_POST["customer_name"];
	$company = $_POST["company"];
	if($_POST["delivered"] == "Delivered")
	{
		$status = $_POST["delivered"];
	}
	else if($_POST["notdelivered"] == "Not Delivered")
	{
		$status= $_POST["notdelivered"];
	}
	else if($_POST["willcall"] == "Will Call")
	{
		$status= $_POST["willcall"];
	}
	else 
	{
		$status= $_POST["onhold"];
	}
	echo $customer_name, $company, $status;
	$sql = "INSERT INTO jobs (customer_name, company, status) VALUES ('$customer_name', '$company', '$status')";
	if(mysqli_query($conn, $sql)){
	echo "Records added successfully.";
	}else{
		echo "ERROR: Could not execute $sql." . mysqli_error($conn);
	}
}
/*if(mysqli_query($conn, $sql)){
	echo "Records added successfully.";
}else{
	echo "ERROR: Could not execute $sql." . mysqli_error($conn);
}*/

/*$sql = "SELECT * FROM jobs";
if($result = mysqli_query($conn, $sql)){
	if(mysqli_num_rows($result) > 0){
		
		echo "<table>";
			echo"<tr>";
				echo "<th>ID</th>";
				echo "<th>Customer Name</th>";
				echo "<th>Company</th>";
			echo "</tr>";

			
		while($row = mysqli_fetch_array($result)){
			echo "<tr>";
				echo "<td>" . $row['id_num'] . "</td>";
				echo "<td>" . $row['customer_name']. "</td>";
				echo "<td>" . $row['company']. "</td>";
			echo "</tr>";
		}
		
		echo "</table>";
		mysqli_free_result($result);
	} 
	else{
		echo "No records matching your query were found.";
	} 
}
	else{
		echo "ERROR: Could not execute $sql." . mysqli_error($conn);
	}*/
	
	/*$sql = "DELETE FROM jobs WHERE customer_name='Omer'";
	if(mysqli_query($conn, $sql)){
		echo "Records were deleted successfully.";
	}
	else{
		echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
	}*/
	
// Close connection
mysqli_close($conn);
?>