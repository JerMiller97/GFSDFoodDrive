<?php

session_start();

if(isset($_POST['submit']))
{
    $user=$_POST['username'];
	$pass=$_POST['password'];
};

include 'dbconfig.php';


$sql = "SELECT permission, userID, FirstName, password FROM tblUser
where username='" .$user. "';";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$_SESSION["user"] = $row["FirstName"];
		$hashpass = $row["password"];
        $_SESSION["PermissionLevel"] = $row["permission"];
		$_SESSION["userID"] = $row["userID"];
    }
if (password_verify($pass,$hashpass)){

if ($_SESSION["PermissionLevel"] == "7"){
header('Location:/Family/');
exit();
}
if ($_SESSION["PermissionLevel"] == "8"){
header('Location:/Coordinator/');
exit();
}
if ($_SESSION["PermissionLevel"] == "9"){
header('Location:/Santa/');	
exit();
}
} }
else {
		header('Location:/index.php?error=1');
		exit();
}
	$conn->close();



?>