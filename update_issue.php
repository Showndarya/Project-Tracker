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
		$pid = $_REQUEST["pn"];
		$pname = $_REQUEST["pname"];
		$pdesc = $_REQUEST["pdesc"];
		
		$sql = "UPDATE project SET p_name='$pname', p_desc = '$pdesc' WHERE p_id='$pid'";
		if(mysqli_query($con,$sql))
		{
			session_start();
			$_SESSION["user"] = $un;
			header('Location: manage_project.php');
		}
		else 
		{
			mysqli_error($con);
		}
	}
?>
