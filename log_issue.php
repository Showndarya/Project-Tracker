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
		$pn = $_REQUEST["pn"];
		$in = $_REQUEST["issue_name"];
		$id = $_REQUEST["issue_desc"];
		$cat = $_REQUEST["cat"];
		
		$sql = "INSERT INTO issue(emp_id,project_id,issue_name,issue_desc,cat_id) VALUES('$un','$pn','$in','$id','$cat')";
		if(mysqli_query($con,$sql))
		{
			session_start();
			$_SESSION["user"] = $un;
			header('Location: home_page.php');
		}
	}
?>
