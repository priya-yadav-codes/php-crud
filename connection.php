<?php
 error_reporting(0);
 $servername = "localhost:3307";
 $username = "root";
 $password = "";
 $dbname = "scripting";
 
 $con=mysqli_connect($servername ,$username ,$password,$dbname);
 
 if($con==false)
 {
 die("ERROR: could not connect. ".mysqli_connect_error());
 }
 else{
    echo "<h1><center>Connection Successful!!</center></h1>";
 }
 mysqli_close($con);
 ?>