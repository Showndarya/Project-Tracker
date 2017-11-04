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
  $psd = $row["p_sd"];
  $ped = $row["p_ed"];
  $ploc = $row["p_location"];
  $pbud = $row["p_budget"];
  $pcli = $row["p_client"];

?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="manage_project.css"> </head>
</head>
<body>
<ul class="ulc">
  <li class="lic"><a href="home_page_ad.php">Back</a></li>
  <div class="tab">
    <button class="tab tablinks" onclick="openTab(event, 'PD')" id="defaultOpen">Project Details</button>
    <button class="tab tablinks" onclick="openTab(event, 'AI')">Assign Issue</button>
  <li class="licr"><a href="logout.php">Click to Logout, <?php echo htmlspecialchars($un);?></a></li>
  </div>
</ul>



<div id="PD" class="tabcontent" >
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
          <textarea rows="5" class="inputFields" id="pdesc" name="pdesc" placeholder="" required><?php echo htmlspecialchars($pdesc);?></textarea>
        </li> 
        <li>
          <input type="text" class="inputFields" id="psd" name="psd" placeholder="Project Start Date" value="<?php echo htmlspecialchars($psd);?>" required/>
        </li>  
        <li>
          <input type="text" class="inputFields" id="ped" name="ped" placeholder="Project End Date" value="<?php echo htmlspecialchars($ped);?>" required/>
        </li>
        <li>
          <input type="text" class="inputFields" id="ploc" name="ploc" placeholder="Project Location" value="<?php echo htmlspecialchars($ploc);?>" required/>
        </li>
        <li>
          <input type="text" class="inputFields" id="pbud" name="pbud" placeholder="Project Budget" value="<?php echo htmlspecialchars($pbud);?>" required/>
        </li>
        <li>
          <input type="text" class="inputFields" id="pcli" name="pcli" placeholder="Project Client" value="<?php echo htmlspecialchars($pcli);?>" required/>
        </li>
        <li id="center-btn">
          <input type="submit" id="join-btn" name="submit" alt="Join" value="Update Details!">
        </li>
      </ul>
    </form>
  </div>
</div>

<div id="AI" class="tabcontent" >
  <div class="signupSection">
    <div class="info">
      <h2>Assign Issue</h2>
      <img src="pt_logo.png" class="img">
    </div>
    <form action="assign_issue_ad.php" method="POST" class="signupForm" name="signupform">
      <ul class="noBullet">
      <input type="text" class="inputFields" id="un" name="un" placeholder="" value="<?php echo htmlspecialchars($ad_id);?>" hidden required/>
        <?php
    
          $sql = "SELECT issue_id,issue_name FROM issue WHERE project_id=$pid AND assign=0";
          $result = mysqli_query($con,$sql);
          echo "<li>";
          echo "<label for='issue'>Select Issue: </label><br><br>";
          echo "<select class='inputFields' name='issue'>";
          while($row = mysqli_fetch_assoc($result))
          {    
              $id=$row['issue_id'];
              $name=$row['issue_name'];
              echo "<option value=$id> $name</option>";
          }   
          echo "</select>"; 
          echo "</li><br>";

          $sql = "SELECT emp_id FROM empro WHERE p_id=$pid";
          $result = mysqli_query($con,$sql);
          echo "<li>";
          echo "<label for='emp'>Select Employee: </label><br><br>";
          echo "<select class='inputFields' name='emp'>";
          while($row = mysqli_fetch_assoc($result))
          {    
              $eid = $row['emp_id'];
              $sql = "SELECT emp_name FROM employee WHERE emp_id=$eid";
              $res = mysqli_query($con,$sql);
              $en = mysqli_fetch_assoc($res);
              $ename = $en["emp_name"];
              echo "<option value=$eid> $ename</option>";
          }   
          echo "</select>"; 
          echo "</li>";
     
      ?>       
        <li id="center-btn">
          <input type="submit" id="join-btn" name="submit" alt="Join" value="Assign Issue!">
        </li>
      </ul>
    </form>
  </div>
</div>

<script>
function openTab(evt, Name) {

    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(Name).style.display = "block";
    evt.currentTarget.className += " active";
}

document.getElementById("defaultOpen").click();
</script>
</body>
</html>
