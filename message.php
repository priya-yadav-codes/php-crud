 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message</title>
</head>
<body>
    <center>
        <form method="POST" action="#">
        <input type="text" name="subject" placeholder="Enter subject" required>
<br><br>
<input type="text" name="content" placeholder="Enter  content" required>
<br><br>
<button type="submit" name="submit" value="submit">Submit</button>
        </form>
</center>
</body>
</html>

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
    $subject = $_POST['subject'];
    $content = $_POST['content'];

  //  $sub = mysqli_query($con,"insert into pending_list(subject,content,status)value('$subject','$content','pending')");
  
  $query="INSERT into pending_list(subject,content,status) VALUES('$subject','$content','pending')";

    $submit=mysqli_query($con,$query);
    if($submit){
        echo "Your request is under process";
    }else{
        echo "Something went wrong";
    }

?>