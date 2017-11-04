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
		$psd = $_REQUEST["psd"];
		$ped = $_REQUEST["ped"];
		$ploc = $_REQUEST["ploc"];
		$pbud = $_REQUEST["pbud"];
		$pcli = $_REQUEST["pcli"];

		$sql = "UPDATE project SET p_name='$pname', p_desc = '$pdesc', p_sd = '$psd', p_ed = '$ped', p_location = '$ploc', p_budget = '$pbud', p_client = '$pcli' WHERE p_id='$pid'";
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
