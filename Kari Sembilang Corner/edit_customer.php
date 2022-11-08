<html>
<head>

<title>Kari Sembilang Corner</title>
<link rel="stylesheet" href="style.css">
	
<style>
	form{
		background: rgba(0, 0, 0, 0.6);
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
<?php include ("headers.php");?>

<?php
         //look for a valid user id, either through GET or POST
         if ((isset($_GET['id'])) && (is_numeric($_GET['id']))) {
            $id = $_GET['id'];
         } elseif ((isset($_POST['id'])) && (is_numeric($_POST['id']))) {
            $id = $_POST['id'];
         } else {
            echo '<p style="color: white" align="center" class = "error"> This page has been accesses in error.</p>';
            exit();
         }

         if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $error = array();

            //look for firstname
            if(empty($_POST['name'])) {
               $error[] = 'You forgot to enter the First Name.';
            } else {
               $n = mysqli_real_escape_string($connect, trim($_POST['name']));
            }

            //look for lastname
            if(empty($_POST['ic'])) {
               $error[] = 'You forgot to enter the Ic';
            }  else {
               $l = mysqli_real_escape_string($connect, trim($_POST['ic'])) ;
            }

            //look for Insurance Number
            if (empty($_POST['phone_num'])) {
               $error [] = 'You forgot to enter the Phone Number.';
            }  else {
               $i = mysqli_real_escape_string($connect,trim($_POST['phone_num'])) ;
            }


            //if no problem occured
            if(empty($error)) {

               $q = "SELECT customer_id FROM customer WHERE phone_num = '$i' AND customer_id != $id";

               $result = @mysqli_query($connect,$q);

               if(mysqli_num_rows($result) == 0) {
                  $q = "UPDATE customer SET name = '$n', ic = '$l', phone_num = '$i' WHERE customer_id = '$id' LIMIT 1";

                  $result = @mysqli_query($connect,$q);

                  if(mysqli_affected_rows($connect) == 1) {

                     echo '<h3 style="color: white" align="center" style="color:white" align="center"> The user has been edited</h3>';
                  } else {
                     echo '<p style="color: white" align="center" class ="error"> The user has no be edited due to the system error.We apologize for any inconvenience.</p>';
                     echo '<p>' .mysqli_error($connect). '<br> query : ' .$q. '</p>';     
                  }

               }  else {
                  echo '<p style="color: white" align="center" class = "error"> The ic no has already been registered</p>';
               }
            }  else {
               echo '<p style="color: white" align="center" class = "error"> The following error (s) occured : <br>';
               foreach ($error as $msg) 
               {
                  echo " -$msg<br> \n";   
               }
               echo '</p><p style="color: white" align="center"> Please try again.</p>';
            }
         }

         $q = "SELECT name, ic, phone_num FROM customer WHERE customer_id = $id";
         $result = @mysqli_query($connect,$q);

         if(mysqli_num_rows($result) == 1) {
            //get patient information
            $row = mysqli_fetch_array($result, MYSQLI_NUM);
            //create the form
            echo '<form action = "edit_customer.php" method = "post">
            <p style="color: white" align="center"><label class = "label" for = "customer_name"> Name : </label><br>
            <input id = "name" type = "text" name = "name" size = "30" maxlength = "30" value = "'.$row[0].'"></p><br>

            <p style="color: white" align="center"><label class = "label" for = "ic"> Ic No : </label><br>
            <input id = "ic" type = "text" name = "ic" size = "30" maxlength = "30" value = "'.$row[1].'"></p><br>

            <p style="color: white" align="center"><label class = "label" for = "phone_no"> Phone No :</label><br>
            <input id = "phone_num" type = "text" name = "phone_num " size = "30" maxlength = "30" value = "'.$row[2].'"></p><br>


            <br><p align="center"><input id = "submit" type = "submit" name = "submit" value = "   Edit   "></p>

            <br><input type = "hidden" name = "id" value = "'.$id.'"/>
            
            </form>';


         } else {
            echo '<p class = "error"> This page has been accessed in error.</p>';
         }

         mysqli_close($connect);

         ?>

</div>
</div>
</body>
</html>