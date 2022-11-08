<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Kari Sembilang Corner</title>
</head>
<body>

	<?php
	//extract($_POST);
                                         
//connect to server
	$connect = mysqli_connect ("localhost","root","","kari_sembilang_corner");

	if(!$connect){
		die('ERROR:' .mysqli_connect_error());
	}

	?>
</body>
</html>