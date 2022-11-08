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

            $id = $_POST['staff_id'];
            $id = mysqli_real_escape_string($connect,$id);

            $q = "SELECT staff_id, name, phone_num, email, position, password FROM staff WHERE staff_id = '$id' ORDER BY staff_id";

            $result = @mysqli_query ($connect,$q);

            if($result) {
               echo '<table border="1">
               <tr><td><b> ID </b></td>
               <td><b> Name </b></td>
               <td><b> Phone Number </b></td>
               <td><b> Email </b></td>
               <td><b> Position </b></td>
               </tr>';

               //fetch and display record
               while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                  echo '<tr align="center">
                  <td>' .$row['staff_id']. '</td>
                  <td>' .$row['name']. '</td>
                  <td>' .$row['phone_num']. '</td>
                  <td>' .$row['email']. '</td>
                  <td>' .$row['position']. '</td>
                  </tr>';
               }
               echo '</table>';
               mysqli_free_result($result);
            }  else {
               echo '<p class = "error"> If no record is shown, this is because you had an incorrect or missing entry in search form. <br> Click the back button on the browser and try again.</p>';
               echo '<p>' .mysqli_error($connect). '<br><br>Query : '.$q.'</p>';
            }
            mysqli_close($connect);
            ?>

            </div>
         </div>
         </div>
      </div>
   </div>
</body>
</html>

</body>
</html>