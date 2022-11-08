<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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

<?php
	
//make the query
$q= "SELECT staff_id, name, phone_num, email, position, password FROM staff ORDER BY staff_id";

//run the query
$result= @mysqli_query ($connect, $q);

//if it ran without a problem, display the records
if($result)
{
	//table heading
	echo '<table border="1">
	<tr><td><b>Edit</b></td>
	<td><b>Delete</b></td>
	<td><b>Staff ID</b></td>
	<td><b>Name</b></td>
	<td><b>Phone Number</b></td>
	<td><b>Email</b></td>
	<td><b>Position</b></td>
	<td><b>Password</b></td></tr>';

	//fetch and print all the records
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		echo '<tr>
		<td><a href="edit_staff.php?id=' .$row["staff_id"].'">Edit</a></td>
		<td><a href="delete_staff.php?id=' .$row["staff_id"].'">Delete</a></td>
		<td>' .$row ['staff_id']. '</td>
		<td>' .$row ['name']. '</td>
		<td>' .$row ['phone_num']. '</td>
		<td>' .$row ['email']. '</td>
		<td>' .$row ['position']. '</td>
		<td>' .$row ['password']. '</td>
		</tr>';
	}
	//close the table
	echo '</table>';

	//free up the resources
	mysqli_free_result ($result);
}

//if failed to run
else 
{
	//error message
	echo '<p class ="error">The current patient could not be retrieved. We apologized for any inconvenience.</p>';

	//debugging message
	echo '<p>' .mysqli_error($connect). '<br><br>Query: '.$q. '</p>';
}//end of it ($result)

//close the database connection
mysqli_close($connect);

?>

</div>
</div>
</body>
</html>