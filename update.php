<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Form update</title>
</head>
<body>
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
 $id = $_GET['id'];
 $query="SELECT * from details WHERE id = '$id' ";
 $result=mysqli_query($con, $query);
 $count= mysqli_num_rows($result);
 $row = mysqli_fetch_array($result); 

 if($_POST['update'])
{
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$pwd=$_POST['password'];
$gender=$_POST['gender'];
$mobile=$_POST['mobile'];
$email=$_POST['email'];
$address=$_POST['address'];

$query="UPDATE details set fname='$fname',lname='$lname',password='$pwd',gender='$gender',mobile='$mobile',email='$email',address='$address'  where id='$id'";

 $result=mysqli_query($con, $query);
 

if($result){
echo "<script>alert('Record updated')</script>";
?>
<meta http-equiv="refresh" content="0; url=http://localhost/crud/update_table.php">
<?php
}
else{
 echo "<h1><center>Data not updated</center></h1>";
}
}
 mysqli_close($con);
 ?>
    <center>
    
        <form name="update_form" method="POST">
            <br>
            <h1>Update Details</h1>
          
            <input type="text" placeholder="First name" name="fname" required value="<?php echo $row['fname']; ?>"/><br><br>
       
            <input type="text" placeholder="Last name" name="lname" required value="<?php echo $row['lname']; ?>"/><br><br>
       
            <input type="password" placeholder="Password" name="password" required value="<?php echo $row['password']; ?>"/><br><br>
            <label>Gender:</label>
            <select name="gender">
                <option value="not select">select</option>
                <option value="male"<?php if($row['gender']=='male'){
                    echo "selected";
                    }?>>Male</option>
                <option value="female"<?php if($row['gender']=='female'){
                    echo "selected";
                    }?>>Female</option>
            </select>
            <br><br>
           
            <input type="text" placeholder="Mobile" maxlength="10"  name="mobile" required value="<?php echo $row['mobile']; ?>"/><br><br>
            
            <input type="email" placeholder="Email" name="email" required value="<?php echo $row['email']; ?>"/><br><br>
           
            <textarea  name="address" placeholder="Enter your address" required> <?php echo $row['address']; ?></textarea><br><br>
            <input type="submit" name="update" value="Update"/><br><br>         
    
</center>
</body>
</html>

 