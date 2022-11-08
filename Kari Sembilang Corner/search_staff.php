<html>
<head>
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

<?php include("headers.php"); ?>


         <form action="recordfound_Staff.php" method="post">

            <h1 style="color:white" align="center">Search Record Staff </h1>
            <p style="color:white" align="center" ><label class="label" for="staff_id">ID Number : </label>
            <input id="staff_id" type="text" name="staff_id" size="30" maxlength="30" 
            value="<?php if (isset($_POST['staff_id'])); ?>" /></p><br>

	<p align="center" ><input id="submit" type="submit" name="submit" value=" SEARCH " /></p>
</form>
</div>
</div>
</body>