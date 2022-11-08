<html >
<head><title>Kari Sembilang Corner</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="style.css">

<style>
        .form-container{
            margin: 0px;
            margin-left: 500px;
            margin-top: 50px;
            margin-bottom: 50px;
            min-height: 10vh;
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
include ("headers.php");?>


<?php
//This query inserts a record in the clinic table
//has form been submitted?
if ($_SERVER['REQUEST_METHOD']== 'POST') {
    $error = array(); //initialize an error array

//check for a name
if (empty($_POST['name'])) {
    $error [] = 'You forgot to enter your name.';
}
else {
    $n = mysqli_real_escape_string ($connect, trim ($_POST['name']));
}

//check for a phone number
if (empty($_POST['phone_num'])) {
    $error [] = 'You forgot to enter your telephone number.';
}
else {
    $l = mysqli_real_escape_string ($connect, trim ($_POST['phone_num']));
}

//check for email
if (empty($_POST['email'])) {
    $error [] = 'You forgot to enter your email.';
}
else {
    $s = mysqli_real_escape_string ($connect, trim ($_POST ['email']));
}

//check for position
if (empty($_POST['position'])) {
    $error [] = 'You forgot to enter your position.';
}
else {
    $e = mysqli_real_escape_string ($connect, trim ($_POST ['position']));
}

//check for password
if (empty($_POST['password'])) {
    $error [] = 'You forgot to enter your password.';
}
else {
    $p = mysqli_real_escape_string ($connect, trim ($_POST ['password']));
}

    //register the user in database
    //make the query:
    $q = "Insert INTO staff (staff_id, name, phone_num, email, position, password) VALUES (' ','$n','$l','$s','$e','$p')";
        $result = @mysqli_query($connect, $q); //run the query
        if ($result){ //if it runs
        echo '<h1>thank you<h1>';
        exit();
        } else { //if it did run
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

<h2> Register Staff</h2>
<h4> *required field </h4>
<form action="registerStaffs.php" method="post">

<p><label class="label" for="name"> Name : *</label>
<input id = "name" type="text" name="name" size="30" maxlength="150"
value="<?php if (isset($_POST['name'])) echo $_POST ['name']; ?> " /></p>


<p><label class="label" for="phone_num"> Telephone Number : *</label>
<input type="tel" id = "phone_num"  name="phone_num" placeholder="123-45-678" value="<?php if (isset($_POST['phone_num'])) echo $_POST ['phone_num']; ?> " /></p>
<small style="color:red;">Format:012-3456789</small></br>


<p><label class="label" for="email"> Email : *</label>
<input id = "email" type="email" name="email" size="30" maxlength="150"
value="<?php if (isset($_POST['email'])) echo $_POST ['email']; ?> " /></p>
<p><label class="label" for="password"> Password : *</label>
<input id = "password" type="password" name="password" size="12" maxlength="12"
value="<?php if (isset($_POST['password'])) echo $_POST ['password'];?>"/>
</p>


<p><label for="position"> Position : *</label>&nbsp;&nbsp;
<select id="position" name="position">
<option for="staff">Staff</option>
<option for="manager">Manager</option>
<option for="admin">Admin</option>
<?php if (isset($_POST['position'])) echo $_POST ['position']; ?></p></option></select>

<br>
<br>


<p><input id="submit" type="submit" name="submit" value="Register" /> &nbsp; &nbsp;
<input id="reset" type="reset" name="reset" value="Clear All" />
</p>
</form>
<p>
<br />
<br />
<br />
</div>
</body>
</html>