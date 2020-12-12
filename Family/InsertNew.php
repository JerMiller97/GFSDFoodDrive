<?php

session_start();

$_SESSION["FamilyName"]=$_POST['FamilyName'];
$_SESSION["Address"]=$_POST['Address'];
$_SESSION["Phone1"]=$_POST['Phone1'];
$_SESSION["Phone2"]=$_POST['Phone2'];
$_SESSION["Email"]=$_POST['Email'];
$_SESSION["FemaleAdults"]=$_POST['FemaleAdults'];
$_SESSION["MaleAdults"]=$_POST['MaleAdults'];
$_SESSION["NumberofAdults"]= $_SESSION["FemaleAdults"] + $_SESSION["MaleAdults"];
$_SESSION["Infants"]=$_POST['Infants'];
$_SESSION["YoungChildren"]=$_POST['YoungChildren'];
$_SESSION["Children"]=$_POST['Children'];
$_SESSION["Tween"]=$_POST['Tween'];
$_SESSION["Teenager"]=$_POST['Teenager'];
$_SESSION["NumberofChildren"]= $_SESSION["Infants"]+ $_SESSION["YoungChildren"]+ $_SESSION["Children"]+ $_SESSION["Tween"]+ $_SESSION["Teenager"];
$_SESSION["NumberofFamilyMembers"]= $_SESSION["NumberofAdults"] + $_SESSION["NumberofChildren"];
$_SESSION["hasCRHSChildren"]=$_POST['hasCRHSChildren'];
$_SESSION["hasGFHSChildren"]=$_POST['hasGFHSChildren'];
$_SESSION["PetInformation"]=$_POST['PetInformation'];
$_SESSION["DeliveryPreference"]=$_POST['DeliveryPreference'];
$_SESSION["DeliveryDate"]=$_POST['DeliveryDate'];
$_SESSION["DeliveryTime"]=$_POST['DeliveryTime'];
$_SESSION["NeedforHelp"]=$_POST['NeedforHelp'];
$_SESSION["SevereNeed"]=$_POST['SevereNeed'];
$_SESSION["OtherQuestions"]=$_POST['OtherQuestions'];

if ($_SESSION["FamilyName"] == "" OR $_SESSION["Address"] == "" OR $_SESSION["Phone1"] == "") {
	header('Location:/Family/AddFamily.php?status=3');
	exit();
}
;

				
include '../dbconfig.php';

$sql = "INSERT into family (userID, FamilyName, Address, Phone1, Phone2, Email, FemaleAdults, MaleAdults, NumberofAdults, Infants, YoungChildren, Children, Tween, Teenager, NumberofChildren, NumberofFamilyMembers, hasCRHSChildren, hasGFHSChildren, PetInformation, DeliveryPreference, DeliveryDate, DeliveryTime, NeedforHelp, SevereNeed, OtherQuestions)
VALUES (
'".$_SESSION["userID"]. "',
'".$_SESSION["FamilyName"]."',
'".$_SESSION["Address"]."',
'".$_SESSION["Phone1"]."',
'".$_SESSION["Phone2"]."',
'".$_SESSION["Email"]."',
'".$_SESSION["FemaleAdults"]."',
'".$_SESSION["MaleAdults"]."',
'".$_SESSION["NumberofAdults"]."',
'".$_SESSION["Infants"]."',
'".$_SESSION["YoungChildren"]."',
'".$_SESSION["Children"]."',
'".$_SESSION["Tween"]."',
'".$_SESSION["Teenager"]."',
'".$_SESSION["NumberofChildren"]."',
'".$_SESSION["NumberofFamilyMembers"]."',
'".$_SESSION["hasCRHSChildren"]."',
'".$_SESSION["hasGFHSChildren"]."',
'".$_SESSION["PetInformation"]."',
'".$_SESSION["DeliveryPreference"]."',
'".$_SESSION["DeliveryDate"]."',
'".$_SESSION["DeliveryTime"]."',
'".$_SESSION["NeedforHelp"]."',
'".$_SESSION["SevereNeed"]."',
'".$_SESSION["OtherQuestions"]."'
);";

if ($conn->query($sql) === TRUE) {
	
$sql = "SELECT FamilyID FROM family
where userID = '".$_SESSION["userID"]."' and FamilyName = '".$_SESSION["FamilyName"]."' and Address = '".$_SESSION["Address"]."' and Phone1 = '".$_SESSION["Phone1"]."'
";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $AddedFamilyID = $row["FamilyID"];
    }
};

$_SESSION["FamilyName"] = $_SESSION["Address"] = $_SESSION["Phone1"] = $_SESSION["Phone2"] = $_SESSION["Email"] = $_SESSION["FemaleAdults"] = $_SESSION["MaleAdults"] = $_SESSION["NumberofAdults"] = $_SESSION["Infants"] = $_SESSION["YoungChildren"] = $_SESSION["Children"] = $_SESSION["Tween"] = $_SESSION["Teenager"] = $_SESSION["NumberofChildren"] = $_SESSION["NumberofFamilyMembers"] = $_SESSION["hasCRHSChildren"] = $_SESSION["hasGFHSChildren"] = $_SESSION["PetInformation"] = $_SESSION["DeliveryPreference"] = $_SESSION["DeliveryDate"] = $_SESSION["DeliveryTime"] = $_SESSION["NeedforHelp"] = $_SESSION["SevereNeed"] = $_SESSION["OtherQuestions"] = "";

	header('Location:/Family/ViewFamilyAddChildren.php?family='.$AddedFamilyID.'');
	exit();
		
		
} else {
    echo "no insert";
}
$conn->close();

?>