<?php
    $db = mysqli_connect("localhost","root","","cybertrom");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $username = mysqli_real_escape_string($db,$_POST['username']);
      $password = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT id FROM login WHERE username = '$username' and password = '$password'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
    
         $_SESSION['login_user'] = $username;
         
         header("location: display.php");
      }else {
         $_SESSION['message'] = "invalid username or password";
      }
   }
?>
	


<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style/style_form.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>


	<!--display login failed-->
	<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
	<?php endif ?>





	<form action="login.php" method="POST">
		
		<div class="input-group">
		<label>USERNAME</label>
		<input class="username" type="text" name="username" required="true"></input>
		</div>
		<br>
		
		<div class="input-group">
		<label>PASSWORD</label>
		<input class="password" type="Password" name="password" required="true" minlength="5"></input>
		</div>
		<br>
		<button class="btn" type="submit" name="submit" id="submit">Login</button>
		<a href="index.php?" class="btn">  home</a>
	</form>


</body>
</html>