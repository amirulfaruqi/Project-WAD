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

<h2> Edit a record </h2>

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

            //look for phone number
            if (empty($_POST['phone_num'])) {
               $error [] = 'You forgot to enter the Phone Number.';
            }  else {
               $l = mysqli_real_escape_string($connect,trim($_POST['phone_num'])) ;
            }


            //look for email
            if (empty($_POST['email'])) {
               $error [] = 'You forgot to enter the Email.';
            }  else {
               $s = mysqli_real_escape_string($connect,trim($_POST['email'])) ;
            }

             //look for position
            if (empty($_POST['position'])) {
                $error [] = 'You forgot to enter the Position.';
             }  else {
                $e = mysqli_real_escape_string($connect,trim($_POST['position'])) ;
             }

              //look for password
            if (empty($_POST['password'])) {
                $error [] = 'You forgot to enter the password.';
             }  else {
                $p = mysqli_real_escape_string($connect,trim($_POST['password'])) ;
             }
 

            //if no problem occured
            if(empty($error)) {

               $q = "SELECT staff_id FROM staff WHERE phone_num = '$l' AND staff_id != $id";

               $result = @mysqli_query($connect,$q);

               if(mysqli_num_rows($result) == 0) {
                  $q = "UPDATE staff SET name = '$n', phone_num = '$l', email = '$s' , position = '$e', password = '$p' WHERE staff_id = '$id' LIMIT 1";

                  $result = @mysqli_query($connect,$q);

                  if(mysqli_affected_rows($connect) == 1) {

                     echo '<h3 style="color: white" align="center"> The user has been edited</h3>';
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
               echo '</p><p> Please try again.</p>';
            }
         }

         $q = "SELECT name, phone_num, email, position, password FROM staff WHERE staff_id = $id";
         $result = @mysqli_query($connect,$q);

         if(mysqli_num_rows($result) == 1) {
            //get patient information
            $row = mysqli_fetch_array($result, MYSQLI_NUM);
            //create the form
            echo '<form action = "edit_staff.php" method = "post">

            <p style="color: white" align="center"><label class = "label" for = "name"> Name : </label><br>
            <input id = "name" type = "text" name = "name" size = "30" maxlength = "30" value = "'.$row[0].'"></p><br>

            <p style="color: white" align="center"><label class = "label" for = "phone_num"> Phone Number : </label><br>
            <input id = "phone_num" type = "text" name = "phone_num" size = "30" maxlength = "30" value = "'.$row[1].'"></p><br>

            <p style="color: white" align="center"><label class = "label" for = "email"> Email : </label><br>
            <input id = "email" type = "text" name = "email" size = "30" maxlength = "30" value = "'.$row[2].'"></p><br>

            <p style="color: white" align="center"><label class = "label" for = "position"> Position : </label><br>
            <input id = "position" type = "text" name = "position" size = "30" maxlength = "30" value = "'.$row[3].'"></p><br>

            <p style="color: white" align="center"><label class = "label" for = "customer_address"> Password : </label><br>
            <input id = "password" type = "text" name = "password" size = "30" maxlength = "30" value = "'.$row[4].'"></p><br>

            <br><p style="color: white" align="center"><input id = "submit" type = "submit" name = "submit" value = "  Edit  "></p>

            <br><input type = "hidden" name = "id" value = "'.$id.'"/>
            
            </form>';


         } else {
            echo '<p class = "error"> This page has been accessed in error.</p>';
         }

         mysqli_close($connect);

         ?>


    </div>
</div>
</div>
</body>
</html>