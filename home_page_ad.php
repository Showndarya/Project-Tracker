<?php
	session_start();
	$ad_id = $_SESSION["user"];
	$con = mysqli_connect('localhost', 'root', '', 'projectracker');
	if($con) 
	{
	    //echo "Connection established Successfully<br />";
	}
	else
	{
		die('Could not connect: ' . mysqli_error($con));
	}
	$sql = "SELECT ad_un from admin where ad_id=$ad_id";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_assoc($result);
	$un = $row["ad_un"];
?>

<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<style>
body{
	background-color: #111;
	color:#fff;
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
    text-align: center;
    padding: 14px 30px;
    text-decoration: none;
}

li a:hover {
    background-color: #813772;
    color: #fff;
}

.lic {
	float:right;
}
.lici {
	left: 60%;
   position: relative;
   transform: translateX(-50%);
}
.lic a {
    display: block;
    color: #fff;
    background-color: #813772;
    text-align: center;
    padding: 14px 30px;
    text-decoration: none;
}

.inputFields {
  margin: 15px 0;
  font-size: 16px;
  padding: 10px;
  width: 250px;
  border: 1px solid #111;
  border-top: none;
  border-left: none;
  border-right: none;
  background: #813772;
  color: white;
  outline: none;
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
    color:#111;
}

#options{
	opacity:0;
	display:none;
}

#join-btn {
  border: 1px solid #111;
  background: #813772;
  font-size: 18px;
  color: white;
  margin-top: 20px;
  padding: 10px 50px;
  cursor: pointer;
  transition: .4s;
}

#join-btn:hover
{
	background-color:#111;
	color:#813772;
}

.card:hover {
	box-shadow: 12px 40px 80px 20px rgba(0, 0, 0, 1); 
}
.button {
  position: relative;
  width: 180px;
  left:10px;
  font-size:18px;
  opacity: 0;
  transition: opacity .35s ease;
  margin-top:-0.2vh;
  margin-right:2vh;
  padding: 12px 48px !important;
  text-align: left !important;
  color: #111;
  background-color:transparent;
  border: solid 0.5px #111;
  z-index: 1;
  border-radius: 5px;
  text-decoration:none;
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
.container {
    padding: 2px 16px;
}

.img{
width:10%;
height:10%
vertical-align:middle;
}

.modalDialog {
    position: fixed;
    font-family: Arial, Helvetica, sans-serif;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background: rgba(0, 0, 0, 0.8);
    z-index: 99999;
    opacity:0;
    -webkit-transition: opacity 400ms ease-in;
    -moz-transition: opacity 400ms ease-in;
    transition: opacity 400ms ease-in;
    pointer-events: none;
}
.modalDialog:target {
    opacity:1;
    pointer-events: auto;
}
.modalDialog > div {
    width: 400px;
    position: relative;
    margin: 10% auto;
    padding: 5px 20px 13px 20px;
    border-radius: 10px;
    background: #111;
    color:white;
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

[class*='close-'] {
  color: #813772;
  font: 30px/100% arial, sans-serif;
  position: absolute;
  right: 5px;
  text-decoration: none;
  text-shadow: 0 1px 0 #fff;
  top: 5px;
}

.close-thik:after {
  content: '✖'; /* UTF-8 symbol */
}

</style>
</head>

<body>
<ul>
  <li><a href="manage_project.php">Manage</a></li>
  <li class="lici"><img src="nav_logo.png" class="img"></li>
  <li class="lic"><a href="logout.php">Welcome, <?php echo htmlspecialchars($un);?></a></li>
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
	
	$sql = "SELECT p_id from admin where ad_id=$ad_id";
	$re = mysqli_query($con,$sql);
	$row = mysqli_fetch_assoc($re);
	$pid = $row["p_id"];
	//echo $pid;
	
	$sql = "SELECT * from issue where project_id=$pid";
	$result = mysqli_query($con,$sql);
	//echo $result;
	while($row = mysqli_fetch_assoc($result))
	{
		//echo mysqli_num_rows($result);
		$in = $row['issue_id'];
		$iname = $row['issue_name'];
		$ci = $row["cat_id"];
		$st = $row["status"];
		$pi = $row["project_id"];
		$id = $row["issue_desc"];
		
		$sql = "SELECT p_name from project where p_id=$pi";
		$r = mysqli_query($con,$sql);
		$ro = mysqli_fetch_assoc($r);
		$pname = $ro["p_name"];
		
		$sql = "SELECT cat_name from issuecat where cat_id=$ci AND p_id=$pi";
		$res = mysqli_query($con,$sql);
		$c_name = mysqli_fetch_assoc($res);
		$cn = $c_name["cat_name"];
		
		if(strcmp($st,"Open")==0)
		{
			echo "<div class='card open' style='float:left;margin-left:15vh;margin-top:10vh;'><div class='container'>";
		}
		else if(strcmp($st,"In Progress")==0)
		{
			echo "<div class='card progress' style='float:left;margin-left:15vh;margin-top:10vh;'><div class='container'>";
		}
		else if(strcmp($st,"Closed")==0)
		{
			echo "<div class='card closed' style='float:left;margin-left:15vh;margin-top:10vh;'><div class='container'>";
		}
		echo "<h4>#$in</h4> ";
		echo "<p><b>Project Name:</b> $pname</p>";
		echo "<p><b>Issue Description:</b> $id</p>";
		echo "<p><b>Issue Category:</b> $cn</p></div>";
		echo "<a href='#openModal' data-id='$iname' data-name='$in' data-status='$st' id='det' class='button'> Update Status</a></div>";
		echo "</div>";
	}

		echo "<div id='openModal' class='modalDialog'>";
   	echo "<div>	<a href='' title='Close' class='close-thik'></a>";
	  echo "<h2 id='iname'></h2>";
	  echo "<form action='update_status_ad.php' method='post'>";
    echo "<input class='inputFields' type='text' name='ad' value='$ad_id' hidden/>Enter new Status: <input class='inputFields' type='text' name='status' id='idata'/><input type='text' name='id' id='id' hidden><input type='submit' value='Update Status' id='join-btn'  name='submit'></form></div></div>";       

?>

<script type="text/javascript">

  $('.button').on('click', {
    'name': function(element) {
      return $(element).data('id');
    },
    'desc': function(element) {
      return $(element).data('status');     
    },
    'id': function(element) {
      return $(element).data('name');     
    },
  },

  function(e) {
    $('#iname').html(e.data.name(this));
    $('#idata').val(e.data.desc(this));
    $('#id').val(e.data.id(this));
  });
  </script>
</body>
</html>
