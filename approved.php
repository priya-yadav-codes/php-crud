<?php 
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "scripting";

$con=mysqli_connect($servername ,$username ,$password,$dbname);

if($con==false)
{
die("ERROR: could not connect. ".mysqli_connect_error());
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approve page</title>
</head>
<body>
    <h1>Pending list</h1>
    <table>
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">SUBJECT</th>
            <th scope="col">CONTENT</th>
            <th scope="col">ACTION</th>
        </tr>
</thead>

<?php
$query = "SELECT * FROM pending_list WHERE status='pending' ORDER BY id ASC";

$result = mysqli_query($con,$query);
while($row = mysqli_fetch_array($result)){
   ?>
    <tbody>
        <tr>
            <th><?php echo $row['id']; ?></th>
            <td><?php echo $row['subject']; ?></td>
            <td><?php echo $row['content']; ?></td>
            <td><?php echo $row['status']; ?></td>
           <td>
           
           <form action="approved.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

            <input type="submit"  name="approve" value="approve">&nbsp &nbsp <br>

            <input type="submit" name="delete" value="delete">
</form>

           </td>

</tr>

</tbody>
<?php } ?>

</table>

<?php



if(isset($_POST['approve'])){ 
    $id = $_POSt['id'];
    $select = "UPDATE pending_list SET status='approved' where id = '$id'";

    $result= mysqli_query($con,$select);
    header("location:approved.php");
}

if(isset($_POST['delete'])){
    $id = $_POSt['id'];
    $select = "DELETE FROM pending_list WHERE id='$id'";
    $result= mysqli_query($con,$select);
    header("location:approved.php");
}
 ?>

&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp

<h1>Pending list</h1>
    <table>
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">SUBJECT</th>
            <th scope="col">CONTENT</th>
            <th scope="col">ACTION</th>
        </tr>
</thead>
</body>
</html>