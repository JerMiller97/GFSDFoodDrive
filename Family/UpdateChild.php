<?php

session_start();

$FamilyID=$_POST['FamilyID'];
$ChildID=$_POST['ChildID'];
$ClothesSize=$_POST['ClothesSize'];
$ClothingStyles=$_POST['ClothingStyles'];
$ClothingOptions=$_POST['ClothingOptions'];
$GiftPreferences=$_POST['GiftPreferences'];
			
include '../dbconfig.php';

$sql = "update child set
ClothesSize = '".$ClothesSize."',
ClothingStyles = '".$ClothingStyles."',
ClothingOptions = '".$ClothingOptions."',
GiftPreferences = '".$GiftPreferences."'
where ChildID = '".$ChildID."';"
;

if ($conn->query($sql) === TRUE) {
	header('Location:/Family/ViewFamilyAddChildren.php?family='.$FamilyID.'');
	exit();
				
		
} else {
    echo "no insert";

}
$conn->close();

?>