
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>
	<h1>SIGN IN</h1>
		<form action = "new_user.php" method="POST">
			<p>Username:</p><input type="text" name="user" />
			<p>Password:</p><input type="password" name="pass" />
			<br />
			<input type="submit" value="Sign in!" />


			<div class="container" style="background-color:#f1f1f1">
			    <button type="button" class="cancelbtn">Cancel</button>
			    <span class="psw">New?? <a href="signUp.php">Sign up</a></span>
  			</div>

		</form>
</body>
</html>

<?php

	$link = mysqli_connect("localhost", "root", "", "database_project");

	// Check connection
	if($link === false){
	    die("ERROR: Could not connect. " . mysqli_connect_error());
	}

  $user = 0;
  $pass = 0;
	if(isset($_POST['user']) && isset($_POST['pass'])){
		$user = $_POST['user'];
		$pass = $_POST['pass'];

		//echo "$user";

		$sql = "SELECT Password FROM users WHERE Ssn = '$user'";


$result = $link-> query($sql);
if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){


	if ($row["Password"] == $pass){
		header('Location: OfficeUse.html');
	}
	}
}

if(mysqli_query($link, $sql)){

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
}
	mysqli_close($link);
?>