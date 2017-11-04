<?php
	session_start();
	$emp_id = $_SESSION["user"];
	$con = mysqli_connect('localhost', 'root', '', 'projectracker');
	if($con) 
	{
	    //echo "Connection established Successfully<br />";
	}
	else
	{
		die('Could not connect: ' . mysqli_error($con));
	}
	$sql = "SELECT emp_username from employee where emp_id=$emp_id";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_assoc($result);
	$un = $row["emp_username"];
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
	left: 50%;
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
  width: 180px;
  left:10px;
  font-size:18px;
  text-align: center;
  opacity: 0;
  transition: opacity .35s ease;
  margin-top:0.8vh;
  margin-right:3vh;
  padding: 12px 48px !important;
  text-align: center;
  color: white;
  background-color:#813772;
  border: solid 2px #fff;
  z-index: 1;
  border-radius: 5px;
  text-decoration:none;
}

.button:hover
{
	background-color:#111;
	color:#fff;
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
<script type="text/javascript">
  
  $('l').mouseover(function() {
  $('.lic').html('Click here to logout');
});

</script>
</head>

<body>
<ul>
  <li><a class="active" href="view_issue.php">My Issues</a></li>
  <li><a href="assign_issue.php">Assigned Issues</a></li>
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

    $sql = "SELECT p_desc from project where p_id=$sn";
    $res = mysqli_query($con,$sql);
    $p_name = mysqli_fetch_assoc($res);
    $pdesc = $p_name["p_desc"];

		echo "<div class='card' style='float:left;margin-left:15vh;margin-top:10vh;'><div class='container'><div id='options'><p>Add</p></div> ";
		echo "<h4><b>#$sn</b></h4> ";
		echo "<p>$pname</p></div>";
		echo "<form action='add_issue.php' method='post'><input type='text' name='pname' value=$sn hidden><input type='submit' value='Add Issue' class='button a'  name='submit'></form>";
		echo "<a href='#openModal' data-name=$pname data-desc='$pdesc' id='det' class='button'> View Details</a></div>";
	}
?>
<div id="openModal" class="modalDialog">
    <div>	<a href="#close" title="Close" class="close-thik"></a>

        	<h2 id="pname"></h2>
          <p id="pdata"></p>
    </div>
</div>

<script type="text/javascript">

  $('.button').on('click', {
    'name': function(element) {
      return $(element).data('name');
    },
    'desc': function(element) {
      return $(element).data('desc');      
    },
  },

  function(e) {
    $('#pname').html(e.data.name(this));
    $('#pdata').html(e.data.desc(this));
  });


</script>
</body>
</html>
