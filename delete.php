<?php
 error_reporting(0);
 $servername = "localhost:3307";
 $username = "root";
 $password = "";
 $dbname = "scripting";
 
 $con=mysqli_connect($servername ,$username ,$password,$dbname);
 
 if($con===false)
 {
 die("ERROR: could not connect. ".mysqli_connect_error());
 }

 $id = $_GET['id'];
 $query="delete from details where id = '$id' ";
 $result=mysqli_query($con, $query);

 if($result){
    echo "<script>alert('Record deleted')</script>";
?>
<meta http-equiv="refresh" content="0; url=http://localhost/crud/delete_table.php">
<?php
 }else{
    echo "Failed to delete";
 }
 ?>