<?php

$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "scripting";

$con=mysqli_connect($servername ,$username ,$password,$dbname);

if($con==false)
{
die("ERROR: could not connect. ".mysqli_connect_error());
}


$fname=$_POST['fname'];
$lname=$_POST['lname'];
$pwd=$_POST['password'];
$gender=$_POST['gender'];
$mobile=$_POST['mobile'];
$email=$_POST['email'];
$address=$_POST['address'];


$query="INSERT into details(fname,lname,password,gender,mobile,email,address) VALUES('$fname','$lname','$pwd','$gender','$mobile','$email','$address')";

$submit=mysqli_query($con,$query);
if($submit){
echo "<script>alert('Record Inserted Successfully')</script>";
}
else{
 echo "<h1><center>Data not inserted</center></h1>";
}
mysqli_close($con);

?>