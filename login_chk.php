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
		$pwd = $_REQUEST["pwd"];
		//echo $pwd;
		$sql = "SELECT * FROM login where username='$un' AND pwd='$pwd'";
		$result = mysqli_query($con,$sql);
		//echo mysqli_num_rows($result);
		if(mysqli_num_rows($result) > 0)
		{
			session_start();
			$row = mysqli_fetch_assoc($result);
			$_SESSION["user"]=$row["id"];
			header("Location: home_page.php");
			//echo "in";
		}
	}
	
?>
