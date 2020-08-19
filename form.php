<?php  

$db = mysqli_connect("localhost","root","","cybertrom");



function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


if (isset($_POST['submit'])) 
{
	//grabbing data from form
	$firstname = test_input($_POST['firstname']);
	$lastname = test_input($_POST['lastname']);
	$phone = test_input($_POST['phone']);
	$address = test_input($_POST['address']);
	$age = test_input($_POST['age']);


	//storing the image
	$image_name=$_FILES['myimage']['name'];
	$image_tmp_loc=$_FILES['myimage']['tmp_name'];
	$image_store="uploads/".$image_name;
	move_uploaded_file($image_tmp_loc, $image_store);


	//VALIDATION OF DATA

	if(!(preg_match("/^[a-zA-Z ]*$/",$firstname))&&(preg_match("/^[a-zA-Z ]*$/",$lastname)))
		$_SESSION['message'] = "INVALID NAME";

	if(!(preg_match("/^[0-9]*$/",$phone))||(strlen($phone)!=10))
		$_SESSION['message'] = "INVALID PHONE";

	if(!(preg_match("/^[0-9]*$/",$age)))
		$_SESSION['message'] = "INVALID AGE";


	if ((preg_match("/^[a-zA-Z ]*$/",$firstname))&&(preg_match("/^[a-zA-Z ]*$/",$lastname))&&(preg_match("/^[0-9]*$/",$phone))&&(preg_match("/^[0-9]*$/",$age))&&(strlen($phone)==10)) 
	{
		mysqli_query($db, "INSERT INTO forminfo (firstname, lastname,phone,address,age,image) VALUES ('$firstname', '$lastname','$phone','$address','$age','$image_name')");
	
	$_SESSION['message'] = "NEW USER CREATED";
  
	}
	
	
		
}
?>


<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>















<!DOCTYPE html>
<html>
<head>
	<title>FORM</title>
	<link rel="stylesheet" type="text/css" href="style/style_form.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>




	<form action="form.php" method="POST" enctype="multipart/form-data">
			
			<div class="input-group">
			<label>FIRST NAME</label>
			<input class="firstname" type="text" name="firstname" required="true" placeholder="firstname"></input>
			</div>
			<br>
			
			<div class="input-group">
			<label>LAST NAME</label>
			<input class="lastname" type="text" name="lastname" required="true" placeholder="laststname"></input>
			</div>
			<br>

			<div class="input-group">
			<label>PHONE</label>
			<input class="phone" type="tel" name="phone" required="true" placeholder="10 digit phone number"></input>
			</div>
			<br>

			<div class="input-group">
			<label>ADDRESS</label>
			<input class="address" type="text" name="address" required="true" placeholder="address" ></input>
			</div>
			<br>

			<div class="input-group">
			<label>AGE</label>
			<input class="age" type="text" name="age" required="true" placeholder="age"></input>
			</div>
			<br>

			
			<label>IMAGE</label>
			<input class="myimage" type="file" name="myimage" required="true"></input>
			<br>
			
			<button class="btn" type="submit" name="submit" id="submit">SUBMIT</button>
			
	</form>

	<div class='homepage_buttons_group'>
	<a href = "login.php" class='logoutbtn'>login</a>
	</div>



</body>
</html>
