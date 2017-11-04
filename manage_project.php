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

	$sql = "Select p_id from admin where ad_id=$ad_id";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_assoc($result);
	$pid = $row["p_id"];

  $sql = "Select * from project where p_id=$pid";
  $result = mysqli_query($con,$sql);
  $row = mysqli_fetch_assoc($result);
  $pname = $row["p_name"];
  $pdesc = $row["p_desc"];

?>

<html>
<head>
<style>
.ulc
{
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #111;
    color: #813772;
}

.lic {
    float: left;
}

.lic a {
    display: block;
    color: #fff;
    text-align: center;
    padding: 14px 30px;
    text-decoration: none;
}

.lic a:hover {
    background-color: #813772;
    color: #fff;
}

.licr {
float:right;
}

.licr a {
    display: block;
    color: #fff;
    background-color: #813772;
    text-align: center;
    padding: 14px 30px;
    text-decoration: none;
}
body {
  margin: 0;
  padding: 0;
  overflow: hidden;
  background: #111;
  background-repeat: no-repeat;
  font-size:22px !important;
}

.signupSection {
  position: absolute;
  padding:30px;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 800px;
  height: 800px;
  text-align: center;
  display: flex;
  color: white;
  box-shadow: 3px 10px 20px 5px rgba(0, 0, 0, .5);
}

.info {
  width: 45%;
  background: rgba(20, 20, 20, .8);
  padding: 30px 0;
  border-right: 5px solid rgba(30, 30, 30, .8);
  h2 {
    padding-top: 30px;
    font-weight: 300;
  }
  p {
    font-size: 18px;
  }
}

.signupForm {
  width: 70%;
  padding: 10% 0;
  background: #813772;
  transition: .2s;
  font-size:22px;
  h2 {
    font-weight: 300;
  }
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

.noBullet {
  list-style-type: none;
  padding: 0;
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

.img{
padding-top: 100%;
width:60%;
vertical-align:middle;
}

</style>
</head>
<body>
<ul class="ulc">
  <li class="lic"><a href="home_page_ad.php">Back</a></li>
  <li class="lic"><a href="manage_project.php">Manage Projects</a></li>
  <li class="licr"><a href="">Welcome, <?php echo htmlspecialchars($un);?></a></li>
</ul>
<div class="signupSection">
  <div class="info">
    <h2>Project Details</h2>
    <img src="pt_logo.png" class="img">
  </div>
  <form action="update_issue.php" method="POST" class="signupForm" name="signupform">
    <ul class="noBullet">
      <li>
        <label for="pname"></label>
        <input type="text" class="inputFields" id="un" name="un" placeholder="" value="<?php echo htmlspecialchars($ad_id);?>" hidden required/>
        <input type="text" class="inputFields" id="pn" name="pn" placeholder="" value="<?php echo htmlspecialchars($pid);?>" hidden required/>
        <input type="text" class="inputFields" id="pname" name="pname" placeholder="" value="<?php echo htmlspecialchars($pname);?>" required/>
      </li>
      <li>
        <label for="pdesc"></label>
        <textarea rows="7" class="inputFields" id="pdesc" name="pdesc" placeholder="" required><?php echo htmlspecialchars($pdesc);?></textarea>
      </li>   
      <li id="center-btn">
        <input type="submit" id="join-btn" name="submit" alt="Join" value="Update Details!">
      </li>
    </ul>
  </form>
</div>
</body>
</html>
