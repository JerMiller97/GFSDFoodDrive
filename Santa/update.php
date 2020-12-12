<?php

session_start();

include 'checkauth.php';


if(isset($_POST['submit']))
{
    $FamilyNumber=$_POST['FamilyNumber'];
	$FamilyID=$_POST['FamilyID'];

};

if ($FamilyNumber < 0 or $FamilyNumber > 799) { 
header('Location:/Santa/NumberAssignment.php?status=2');
exit();
}

include '../dbconfig.php';


$sql = "SELECT FamilyID FROM family
where FamilyNumber='" .$FamilyNumber. "';";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
header('Location:/Santa/NumberAssignment.php?status=3');
exit();
}

$sql = "UPDATE family SET FamilyNumber ='" . $FamilyNumber. "'
where FamilyID='" .$FamilyID. "';";
$result = $conn->query($sql);


if ($conn->query($sql) === TRUE) {
header('Location:/Santa/NumberAssignment.php?status=1');
} else {
header('Location:/Santa/NumberAssignment.php?status=2');
}
$conn->close();

?>