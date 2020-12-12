<?php

session_start();

$userID=$_POST['userID'];
$FirstName=$_POST['FirstName'];
$LastName=$_POST['LastName'];
$userpassword=password_hash($_POST['userpassword'], PASSWORD_DEFAULT);
$permission=$_POST['permission'];
			
include '../dbconfig.php';

if ( $userpassword != "" ) {
	$resetpassword = "password = '".$userpassword."',";
} else {
	$resetpassword = '';
}

$sql = "update tblUser set
FirstName = '".$FirstName."',
LastName = '".$LastName."',
".$resetpassword."
permission = '".$permission."'
where userID = '".$userID."';"
;

if ($conn->query($sql) === TRUE) {
	header('Location:/Santa/AddUsers.php');
	exit();
				
		
} else {
    echo "no insert";

}
$conn->close();

?>