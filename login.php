<?php

$email = $_POST["email"];
$password = $_POST["password"];

//connection with db

$con = new mysqli("localhost:3307","root","","scripting");

if($con->connect_error){
	die("Failed to connect".$con->connect_error);
}else{
	$stmt = $con->prepare("select * from details where email=?");
	$stmt->bind_param("s",$email);
	$stmt->execute();
	$stmt_result = $stmt->get_result();
	if($stmt_result->num_rows > 0){
		$data = $stmt_result->fetch_assoc();
		if($data['password']==$password){
			echo "<h2>Login successfull</h2>";
		}else{
			echo "<h2>Invalid credentials</h2>";
		} 
	}else{
		echo "<h2>Invalid credentials</h2>";
	}
}

?>