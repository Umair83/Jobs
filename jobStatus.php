<?php include 'server.php';

$db_selected = mysqli_select_db($conn, "jobschedule");
if(!$db_selected){
	die("Can't use jobschedule: " . mysqli_error($conn));
}

$sql = "SELECT * FROM jobs";
if($result = mysqli_query($conn, $sql)){
	if(mysqli_num_rows($result) > 0){
		
		echo "<table>";
			echo"<tr>";
				echo "<th>ID</th>";
				echo "<th>Customer Name</th>";
				echo "<th>Company</th>";
				echo "<th>Status</th>";
			echo "</tr>";

			
		while($row = mysqli_fetch_array($result)){
			$status=$row['status'];
			echo "<tr>";
				echo "<td>" . $row['id_num'] . "</td>";
				echo "<td>" . $row['customer_name']. "</td>";
				echo "<td>" . $row['company']. "</td>";
				echo "<td>" . $status. "</td>";
				echo "<td>" . '<select><option value="delivered">' . $status . '</option></select>'	. "</td>";
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
	}
?>	
	<a href="updateJobStatus">Update Job Status</a>
<?php	
mysqli_close($conn);
?>