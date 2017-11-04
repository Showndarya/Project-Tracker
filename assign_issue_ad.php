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
		$un = $_REQUEST["un"];
		$id = $_REQUEST["issue"];
		$eid = $_REQUEST["emp"];
		echo $st;
		$sql = "UPDATE issue SET assign=1 WHERE issue_id='$id' AND emp_id='$eid'";
		if(mysqli_query($con,$sql)){
			session_start();
			$_SESSION["user"] = $un;
			header('Location: manage_project.php');
		}
	}
?>
