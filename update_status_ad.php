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
		$ad = $_REQUEST["ad"];
		echo $st;
		$sql = "UPDATE issue SET status='$st' where issue_id='$id'";
		if(mysqli_query($con,$sql)){
			session_start();
			$_SESSION["user"] = $ad;
			header('Location: home_page_ad.php');
		}
	}
?>
