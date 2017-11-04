<?php
	session_start();
	$user = $_SESSION["user"];
	$con = mysqli_connect('localhost', 'root', '', 'projectracker');
	if($con) 
	{
	    //echo "Connection established Successfully<br />";
	}
	else
	{
		die('Could not connect: ' . mysqli_error($con));
	}
	$sql = "SELECT emp_username from employee where emp_id=$user";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_assoc($result);
	$un = $row["emp_username"];
?>
<html>
<head>
<style>
body{
	background-color: #111;
	font-size:22px;
}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #111;
    color: #fff;
}

li {
    float: left;
}

li a {
    display: block;
    color: #fff;
    padding: 14px 30px;
    text-decoration: none;
    text-align:center;
}

li a:hover {
    background-color: #813772;
    color: #fff;
}

.button {
  position: relative;
  width: 200px;
  left:10px;
  font-size:12px;
  text-align: center;
  opacity: 0;
  transition: opacity .35s ease;
  margin-top:0.5vh;
  margin-right:3vh;
  padding: 12px 48px;
  color: black;
  background-color:transparent;
  border: solid 2px #111;
  z-index: 1;
  border-radius: 5px;
}
.button:hover
{
	background-color:transparent;
	color:#111;
}

.card:hover .button 
{
  opacity: 1;
}
.lic {
float:right;
}
.open
{
background-color:#aaffa4 !important;
}

.progress
{
background-color:#ebe4a4 !important;
}

.closed
{
background-color:#dfa1a8 !important;
}

.lic a {
    display: block;
    color: #fff;
    background-color: #813772;
    text-align: center;
    padding: 14px 30px;
    text-decoration: none;
}

.card {
	box-shadow: 3px 10px 20px 5px rgba(0, 0, 0, .5);
	background-color: #813772;
    transition: 0.3s;
    width: 20%;
    height:30%;
    border-radius: 5px;
    text-align:center;
}

.card p{
	text-align:justify;
	margin-top:20px;
}

.card h4
{
	margin:0;
	display:block;
	padding:4px;
	width:96%;
	color:#111;
	font-size:22px;
	border-radius: 5px;
}
	
#options{
	opacity:0;
	display:none;
}

.card:hover {
	box-shadow: 12px 40px 80px 20px rgba(0, 0, 0, 1); 
}
.container {
    padding: 2px 16px;
}
.inputFields {
  padding: 3px;
  width: 150px;
  border: 1px solid #111;
  border-top: none;
  border-left: none;
  border-right: none;
  background: transparent;
  color: white;
  outline: none;
}
.active{
	background-color: #813772;
    color: #fff;
}

.lici {
	left: 45%;
   position: relative;
   transform: translateX(-55%);
}

.img{
width:10%;
height:10%
vertical-align:middle;
}
</style>
</head>

<body>
<ul>
  <li><a href="home_page.php">Back</a></li>
  <li><a href="view_issue.php">My Issues</a></li>
  <li><a class="active" href="assign_issue.php">Assigned Issues</a></li>
  <li class="lici"><img src="nav_logo.png" class="img"></li>
  <li class="lic"><a href="logout.php">Click to Logout, <?php echo htmlspecialchars($un);?></a></li>
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
	
	$sql = "SELECT * from issue where assign_to=$user and assign='1'";
	$result = mysqli_query($con,$sql);
	//echo $result;
	while($row = mysqli_fetch_assoc($result))
	{
		//echo mysqli_num_rows($result);
		$i = $row["issue_id"];
		$in = $row['issue_name'];
		$ci = $row["cat_id"];
		$st = $row["status"];
		$pi = $row["project_id"];

		$sql = "SELECT p_name from project where p_id=$pi";
		$r = mysqli_query($con,$sql);
		$ro = mysqli_fetch_assoc($r);
		$pname = $ro["p_name"];

		$sql = "SELECT cat_name from issuecat where cat_id=$ci AND p_id=$pi";
		$res = mysqli_query($con,$sql);
		$c_name = mysqli_fetch_assoc($res);
		$cn = $c_name["cat_name"];
		$id = $row["issue_desc"];

		if(strcmp($st,"Open")==0)
		{
			echo "<div class='card open' style='float:left;margin-left:15vh;margin-top:7vh;'><div class='container'>";
		}
		else if(strcmp($st,"In Progress")==0)
		{
			echo "<div class='card progress' style='float:left;margin-left:15vh;margin-top:7vh;'><div class='container'>";
		}
		else if(strcmp($st,"Closed")==0)
		{
			echo "<div class='card closed' style='float:left;margin-left:15vh;margin-top:7vh;'><div class='container'>";
		}
		echo "<h4>#$in</h4> ";
		echo "<p><b>Project Name:</b> $pname</p>";
		echo "<p><b>Issue Description:</b> $id</p>";
		echo "<p><b>Issue Category:</b> $cn</p></div>";
		echo "<form action='update_status.php' method='post'><input type='text' name='eid' value='$user' hidden><input type='text' name='id' value=$i hidden>";
		echo "<input type='text' class='inputFields button' placeholder='Enter new status' name='status' value='' required><input type='submit' value='Update Status' class='button' name='submit'></form>";
		echo "</div>";
	}
?>

</body>
</html>
