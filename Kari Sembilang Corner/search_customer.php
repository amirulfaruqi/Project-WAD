<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Kari Sembilang Corner</title>

<link rel="stylesheet" href="style.css">

<style>
	
	form{
		background-color: rgba(0, 0, 0, 0.6);
	}
</style>
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

<?php include("headers.php");?>

<form action ="recordfound_customer.php" method="post">

<h1>Search record customer</h1>

<p><label class="label" for="ic"> Number IC: </label>
<input id="ic" type="text" name="ic" size="30" maxlength="30" value="<?php if (isset($_POST['ic'])) echo $_POST['ic'];?>" /></p>


<p><input id="submit" type="submit" name="submit" value="search" /></p>
</form>
</div>
</div>
</body>
</html>