<html>
<head>

</head>
<style>  
table, th, td
{
border: 1px solid black;
/* border-collapse: collapse;  */
text-align: center; 
padding: 5px;
}
</style>
<body>
<center>
<h1>Display data of the users</h1>
</center>
<?php
 
 $servername = "localhost:3307";
 $username = "root";
 $password = "";
 $dbname = "scripting";
 
 $con=mysqli_connect($servername ,$username ,$password,$dbname);
 
 if($con===false)
 {
 die("ERROR: could not connect. ".mysqli_connect_error());
 }
 
  $query="SELECT * from details";
 
 #$q="select * from customer where cname='xyz'";
 
 $result=mysqli_query($con, $query);
 
 if($result == false)
 
 {
 die("ERROR: Query Not Executed");
 }
 
 $count= mysqli_num_rows($result);
 
 if ($count > 0)
 {
echo "<center>";
echo "<table>";
 
 echo "<tr>";
 echo "<th>id</th>";
 echo "<th>fname</th>";
 echo "<th>lname</th>";
 echo "<th>password</th>";
 echo "<th>gender</th>";
 echo "<th>mobile</th>";
 echo "<th>email</th>";
 echo "<th>address</th>";
 echo "<th>Operation</th>";
 echo "</tr>";
 
 for ($i=1; $i<=$count; $i++)
 {
 $row = mysqli_fetch_array($result); 
 echo "<tr>";
 echo "<td>".$row['id']."</td>";
 echo "<td>".$row['fname']."</td>";
 echo "<td>".$row['lname']."</td>"; 
 echo "<td>".$row['password']."</td>";
 echo "<td>". $row['gender']."</td>";
 echo "<td>".$row['mobile']."</td>";
 echo "<td>".$row['email']."</td>";
 echo "<td>".$row['address']."</td>";
 echo "<td><a href='update.php?id=$row[id]'><button>Update</button></a></td>";
 echo"</tr>";
 }
 echo "</table>";
 echo "</center>";
 mysqli_free_result($result);
 }
 
 else
 
 {
 echo "No Record Found";
 }
  mysqli_close($con);
 ?>
</body>
    </html>