<html> 
<head> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> <link rel="stylesheet" type="text/css" href="includes.css" /> 
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


<?php include ("headers.php"); ?>


<?php 
//make the query 
$q ="SELECT customer_id, name, ic, phone_num FROM customer ORDER BY customer_id";

//run the query 
$result = @mysqli_query($connect, $q);

//if it ran without a problem, display the records 
if($result)
{
    //Table heading 
    echo '<table border="2"> 
    <tr><td><b>Edit</b></td> 
    <td><b>Delete</b></td>
    <td><b>ID customer</b></td> 
    <td><b>Name</b></td> 
    <td><b>No IC</b></td> 
    <td><b>Telephone Number</b></td></tr>';

//Fetch and print all the records 
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    echo '<tr> 
    <td><a href = "edit_customer.php?id=' .$row['customer_id'].'">Edit</a></td> 
    <td><a href="delete_customer.php?id=' .$row['customer_id'].'">Delete</a></td> 
    <td>' .$row ['customer_id']. '</td> 
    <td>' .$row['name']. '</td> 
    <td>' .$row ['ic']. '</td> 
    <td>' .$row ['phone_num'].'</td> 
    </tr>';
}
//close the table 
echo '</table>';

//free up the resources
mysqli_free_result ($result);

//if failed to run 
} 
else {
//error message 
    echo '<p class="error">The current patient could not be retrieved. We apologize for any inconvenience.</p>';

//debugging message
echo '<p>' .mysqli_error($connect). '<br><br/>Query: '.$q. '</p>';
} //end of it ($result) 
//close the database connection 
mysqli_close($connect);
?>


</div>
</div>
</div> 
</div> 
</body> 
</html>
