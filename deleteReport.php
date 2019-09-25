<?php 

	include('db.php');

	mysqli_query($con,"TRUNCATE `hr_db`.`monthly_report");

	header("location: monthlyReport.php");
 ?>