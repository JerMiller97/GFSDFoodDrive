<?php

session_start();

$_SESSION["FamilyID"]=$_POST['FamilyID'];
$_SESSION["Gender"]=$_POST['Gender'];
$_SESSION["Age"]=$_POST['Age'];
$_SESSION["School"]=$_POST['School'];
$_SESSION["ClothesSize"]=$_POST['ClothesSize'];
$_SESSION["ClothingStyles"]=$_POST['ClothingStyles'];
$_SESSION["ClothingOptions"]=$_POST['ClothingOptions'];
$_SESSION["GiftPreferences"]=$_POST['GiftPreferences'];


if ($_SESSION["FamilyID"] == "" OR $_SESSION["Gender"] == "" OR $_SESSION["Age"] == "" OR $_SESSION["School"] == "") {
		header('Location:/Family/ViewFamilyAddChildren.php?family='.$_SESSION["FamilyID"]);
		exit();
}
;

				
include '../dbconfig.php';

$sql = "INSERT into child (FamilyID, Gender, Age, School, ClothesSize, ClothingStyles, ClothingOptions, GiftPreferences)
VALUES (
'".$_SESSION["FamilyID"]."',
'".$_SESSION["Gender"]."',
'".$_SESSION["Age"]."',
'".$_SESSION["School"]."',
'".$_SESSION["ClothesSize"]."',
'".$_SESSION["ClothingStyles"]."',
'".$_SESSION["ClothingOptions"]."',
'".$_SESSION["GiftPreferences"]."'
)";

if ($conn->query($sql) === TRUE) {

$_SESSION["Gender"] = $_SESSION["Age"] = $_SESSION["School"] = $_SESSION["ClothesSize"] = $_SESSION["ClothingStyles"] = $_SESSION["ClothingOptions"] = $_SESSION["GiftPreferences"] = "";
	header('Location:/Family/ViewFamilyAddChildren.php?family='.$_SESSION["FamilyID"].'');
	exit();
		
		
} else {
    echo "no insert";

}
$conn->close();

?>