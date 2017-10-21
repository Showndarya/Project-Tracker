<html>
<head>
<style>
body {
  margin: 0;
  padding: 0;
  overflow: hidden;
  background: #111;
  background-repeat: no-repeat;
}

.signupSection {
  position: absolute;
  top: 50%;
  left: 50%;
  padding:30px;
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
.img{
padding-top: 100%;
width:80%;
vertical-align:middle;
}

.signupForm {
  width: 70%;
  padding: 30% 0;
  background: #813772;
  transition: .2s;
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
</style>
</head>
<body>
<div class="signupSection">
  <div class="info">
      <img src="pt_logo.png" class="img" align="center">
  </div>
  <form action="login_chk.php" method="POST" class="signupForm" name="signupform">
    <ul class="noBullet">
      <li>
        <label for="un"></label>
        <input type="text" class="inputFields" id="un" name="un" placeholder="Username" value="" required/>
      </li>
      <li>
        <label for="pwd"></label>
        <input type="password" class="inputFields" id="pwd" name="pwd" placeholder="Password" value="" required/>
      </li>
      <li id="center-btn">
        <input type="submit" id="join-btn" name="submit" alt="Join" value="Log Issue!">
      </li>
    </ul>
  </form>
</div>
</body>
</html>

