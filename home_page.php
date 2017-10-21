<?php
session_start();
$emp_id = $_SESSION["user"];
//echo $emp_id;
?>

<html>
<head>
<style>
body{
	background-color: #111;
}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #111;
    color: #813772;
}

li {
    float: left;
}

li a {
    display: block;
    color: #813772;
    text-align: center;
    padding: 14px 30px;
    text-decoration: none;
}

li a:hover {
    background-color: #813772;
    color: #111;
}

.card {
	box-shadow: 3px 10px 20px 5px rgba(0, 0, 0, .5);
	background-color: #813772;
    transition: 0.3s;
    width: 20%;
    height:30%;
    border-radius: 5px;
    text-align:center;
    padding: 2px 2px;
}

#options{
	opacity:0;
	display:none;
}

.card:hover {
	box-shadow: 12px 40px 80px 20px rgba(0, 0, 0, 1); 
}
.button {
  position: relative;
  width: 200px;
  left:10px;
  text-align: center;
  opacity: 0;
  transition: opacity .35s ease;
  margin-top:0.8vh;
  margin-right:3vh;
  padding: 12px 48px;
  text-align: center;
  color: black;
  background-color:#813772;
  border: solid 2px #111;
  z-index: 1;
  border-radius: 5px;
}

.button:hover
{
	background-color:#111;
	color:#813772;
}

.card:hover .button 
{
  opacity: 1;
}
.container {
    padding: 2px 16px;
}
</style>
</head>

<body>
<ul>
  <li><a class="active" href="#home">My Issues</a></li>
  <li><a href="#news">Assigned Issues</a></li>
  <li><a href="#contact">Tab</a></li>
  <li><a href="#about">Tab</a></li>
</ul>
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
	
	/*$sql = "SELECT emp_id from employee where emp_username='domain_user1'";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_assoc($result);
	$emp = $row["emp_id"];*/
	
	$sql = "SELECT * from empro where emp_id=$emp_id";
	$result = mysqli_query($con,$sql);
	//echo $result;
	while($row = mysqli_fetch_assoc($result))
	{
		//echo mysqli_num_rows($result);
		$sn = $row['p_id'];
		$sql = "SELECT p_name from project where p_id=$sn";
		$res = mysqli_query($con,$sql);
		$p_name = mysqli_fetch_assoc($res);
		$pname = $p_name["p_name"];
		echo "<div class='card' style='float:left;margin-left:15vh;margin-top:10vh;'><div class='container'><div id='options'><p>Add</p></div> ";
		echo "<h4><b>$sn</b></h4> ";
		echo "<p>$pname</p></div>";
		echo "<form action='add_issue.php' method='post'><input type='text' name='pname' value=$sn hidden><input type='submit' value='Add Issue' class='button a' id=$sn name='submit'></form>";
		echo "<form action='add_issue.php' method='post'><input type='text' name='pname' value=$sn hidden><input type='submit' value='View Details' class='button a' id=$sn name='submit'></form></div>";
	}
?>

</body>
</html>