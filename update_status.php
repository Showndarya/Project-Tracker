<?php
	$con = mysqli_connect('localhost', 'root', '', 'projectracker');
	if($con) 
	{
	    //echo "Connection established Successfully<br />";
	}
	else
	{
		die('Could not connect: ' . mysqli_error($con));
	}
	if(isset($_REQUEST["submit"]))
	{
		$id = $_REQUEST["id"];
		$st = $_REQUEST["status"];
		echo $st;
		$sql = "UPDATE issue SET status='$st' where issue_id='$id'";
		if(mysqli_query($con,$sql)){
		echo "in";
			$sql = "SELECT emp_id from issue where issue_id=$id";
			$result = mysqli_query($con,$sql);
			$row = mysqli_fetch_assoc($result);
			$un = $row["emp_id"];
			session_start();
			$_SESSION["user"] = $un;
			header('Location: assign_issue.php');
		}
	}
?>
