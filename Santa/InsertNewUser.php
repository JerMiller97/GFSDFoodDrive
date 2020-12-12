<?php

session_start();

$userusername=$_POST['userusername'];
$FirstName=$_POST['FirstName'];
$LastName=$_POST['LastName'];
$userpassword=password_hash($_POST['userpassword'], PASSWORD_DEFAULT);
$permission=$_POST['permission'];
			
include '../dbconfig.php';

$sql = "INSERT into tblUser (username, password, permission, FirstName, LastName)
VALUES (
'".$userusername."',
'".$userpassword."',
'".$permission."',
'".$FirstName."',
'".$LastName."'
)";

if ($conn->query($sql) === TRUE) {
	header('Location:/Santa/AddUsers.php');
	exit();
		
		
} else {
    echo "no insert";

}
$conn->close();

?>