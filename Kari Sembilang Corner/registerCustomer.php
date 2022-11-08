<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Kari Sembilang Corner</title>

<link rel="stylesheet" href="style.css">

<style>
        .form-container{
            margin: 0px;
            margin-left: 500px;
            margin-top: 25px;
            margin-bottom: 50px;
            min-height: 50vh;
            padding: 10px;
            padding-bottom: 60px;
            display: : flex;
            align-items: center;
            justify-content: center;
            overflow-x: hidden;
            position: relative;
        }
    </style>
</head>
<body>

<div class="content">

<?php 
// call file to connect to server 
include ("headers.php"); ?>

<?php

//This query inserts a record in the clinic table 
//has form been submitted? 
if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
    $error = array (); //initialize an error array

//check for a Firstname 
if (empty($_POST ['name'])) {
    $error[] = 'You forgot to enter your Name.';
}
else {
    $n = mysqli_real_escape_string ($connect, trim ($_POST ['name']));
}

//check for ic 
if (empty($_POST['ic'])){
    $error [] = 'You forgot to enter your ic number.';
}

else {
    $l = mysqli_real_escape_string ($connect, trim ($_POST ['ic']));
}

// check for phone number 
if (empty($_POST['phone_num'])){
     $error[] = 'You forgot to enter your telephone number. ';
}
else {
    $i = mysqli_real_escape_string ($connect, trim ($_POST ['phone_num']));
}


//register the user in the database 
//make the query: 
    $q = "Insert INTO customer (customer_id, name, ic, phone_num) VALUES (' ', '$n', '$l', '$i')"; 
    $result = @mysqli_query ($connect, $q); // run the query 
    if ($result) { 
    //if it runs 
    echo '<h1>thank you<h1>'; 
    exit() ; 
    } 
    else { //if it did run 
    //message 
    echo '<h1>System error</h1>';

//debugging message 
echo '<p>' .mysqli_error($connect).'<br><br>Query: '.$q. '</p>';
 } //end of it (result) 
 mysqli_close($connect); //close the database connection. 
 exit();

} //End of the main submit conditional
?>

</div>

<div class="form-container">

</p> 
<h2> Register </h2> 
<h4> * required field </h4> 
<form action="registerCustomer.php" method="post">

<p><label class ="label" for ="name"> Name : *</label> 
<input id = "name" type="text" name="name" size="30" maxlength="150" value="<?php if (isset($_POST['name'])) echo $_POST ['name']; ?>" /></p>

<p><label class="label" for ="ic"> NO IC: *</label> 
<input id = "ic" type="number" name="ic" size="30" maxlength="60" value="<?php if (isset($_POST['ic'])) echo $_POST ['ic']; ?>" /></p>

<p><label class ="label" for="phone_num"> Telephone number: * </label> 
<input id = "phone_num" type="text" name="phone_num" size="12" maxlength="12" value="<?php if (isset($_POST['phone_num'])) echo $_POST ['phone_num']; ?>" /> </p>


<p><input id="submit" type="submit" name="submit" value="Register" />&nbsp;&nbsp; <input id="reset" type="reset" name="reset" value="Clear All" /> </p> 
</form> 
</body>
</html>