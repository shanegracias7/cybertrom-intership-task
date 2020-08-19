<?php
require_once __DIR__ . '/vendor/autoload.php';
include('sesion.php');

$db = mysqli_connect("localhost","root","","cybertrom");

$id = $_GET{'id'};

$sql = "SELECT * FROM forminfo WHERE id='$id'";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result);


//writing data in PDF
$data="";
$data.="

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel='stylesheet' type='text/css' href='style/style_pdf.css'>
</head>
<body>

<div class='homepage_buttons_group'>


<img src='uploads/".$row['image']."' style='width:200px;height:200px;' alt='alternatetext'>

<table>
	<tr>
		<td><strong>FIRST NAME</strong></td>
		<td>".$row['firstname']."</td>>
	</tr>
	<tr>
		<td><strong>LAST NAME</strong></td>
		<td>".$row['lastname']."</td>>
	</tr>
	<tr>
		<td><strong>ADDRESS</strong></td>
		<td>".$row['address']."</td>>
	</tr>
	<tr>
		<td><strong>AGE</strong></td>
		<td>".$row['age']."</td>>
	</tr>
	<tr>
		<td><strong>PHONE</strong></td>
		<td>".$row['phone']."</td>>
	</tr>
</table>

</div>



</body>
</html>

";

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($data);
$mpdf->Output('file.pdf','D');

?>
