<?php //include('server.php');?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
</head>
<body>
	<form action="jobSchedule.php" method="post">
		<div class="input-group">
			Customer Name: <input type="text" name="customer_name">
		</div>
		<div class="input-group">
			Company: <input type="text" name="company">
		</div>
		<div class="input-group">
			Status: <select>
						<option name="delivered">Delivered</option>
						<option name="notdelivered">Not Delivered</option>
						<option name="willcall">Will Call</option>
						<option name="onhold">On Hold</option>
					</select>
		<input type="submit">
	</form>

	<!--<form action="jobStatus.php">
		<input type="button" value="Check Job Status">
	</form>-->
	
	<a href="jobStatus.php">Check Job Status</a>
</body>

</html>