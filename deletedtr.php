<?php 

	include('db.php');

	mysqli_query($con,"TRUNCATE `hr_db`.`attendance");

	header("location: dtr.php");
 ?>