<html>
<head>
	<title>Kari Sembilang Corner</title>

<link rel="stylesheet" href="style.css">

</head>
<body>

<div class="box">
    <ul type="none">
        <li><a href="homepage.html">LOG OUT</a></li>
        <li><a href="search_select.html">SEARCH</a></li>
        <li><a href="list_select.html">LIST</a></li>
        <li><a href="register_select.html">REGISTER</a></li>
        <li><a href="homeadmin.html">HOME</a></li>
    </ul>

</div>
<div class="content">
<div class="overlay">


<?php include ("headers.php");?>

<h2>Search Record Result</h2>

<?php

	$in= $_POST['ic'];
	$in= mysqli_real_escape_string($connect, $in);

	$q = "SELECT customer_id, name, ic, phone_num FROM customer WHERE ic= '$in' ORDER BY customer_id";

	$result = @mysqli_query ($connect, $q); 

	if($result)
	{
		echo '<table border="1">
		<tr><td><b>ID Number</b></td>
		<td><b>Name</b></td>
		<td><b>IC Number</b></td>
		<td><b>Telephone Number</b></td></tr>';

		//fetch and display record
		while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
		{
			echo'<tr>
			<td>'.$row['customer_id'].'</td>
			<td>'.$row['name'].'</td>
			<td>'.$row['ic'].'</td>
			<td>'.$row['phone_num'].'</td>
			</tr>';
		}

		echo '</table>';
		mysqli_free_result ($result);
	}

	else
	{
		echo '<p class="error">If no record shown , this is because you had an incorrect or missing entry in the search form.<br>Click the back button on the browser and try again.<p>';

		echo '<p>' .mysqli_error($connect). '<br><br>Query:' .$q.'</p>';
	}

	mysqli_close($connect);
?>

</div>
</div>
</body>
</html>