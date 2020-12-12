<?php include 'checkauth.php';
session_start();

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Use the North Pole Family Management System.">

<title>View Family and Add Children · North Pole</title>

<!-- Bootstrap core CSS -->
<link href="/css/bootstrap.css" rel="stylesheet">
<!-- Documentation extras -->

<link href="/css/docs.css" rel="stylesheet">
<link href="/css/docsearch.css" rel="stylesheet">

<!-- Favicons -->

  </head>
  <body>
  
<?php include 'header.php';?>
    <div class="container-fluid">
      <div class="row flex-xl-nowrap">
       
	   <?php include 'sidebar.php';?>
        <main class="col-12 col-md-9 py-md-3 pl-md-5 bd-content" role="main">
          <h2 id="content">View Family and Add Children</h2>
		<?php 
		
		if (isset($_GET['family'])) {
$AddedFamilyID = $_GET['family'];};

?>
		
		
		
		<?php
				
include '../dbconfig.php';

$sql = "SELECT FamilyName, Address, Phone1, NumberofChildren, NumberofAdults, NumberofFamilyMembers FROM family
where FamilyID=".$AddedFamilyID." and 
userID=".$_SESSION["userID"].";";
$result = $conn->query($sql);


if ($result->num_rows == 1) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$FamilyName = $row["FamilyName"];
		$Address = $row["Address"];
		$Phone1 = $row["Phone1"];
		$Phone2 = $row["Phone2"];
		$NumberofChildren = $row["NumberofChildren"];
		$NumberofAdults = $row["NumberofAdults"];
		$NumberofFamilyMembers = $row["NumberofFamilyMembers"];
    }
} else {
	print "

<div class=\"alert alert-danger\" role=\"alert\">
No family found
</div>";
}
$conn->close();
		  

				?>
		
		
		  <form>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Family Name</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control" value="<?php echo $FamilyName;?>">

    </div>
	    </div>
	  <div class="form-group row">
	    <label class="col-sm-2 col-form-label">Address</label>
    <div class="col-sm-10">
		  <input type="text" readonly class="form-control" value="<?php echo $Address;?>">
    </div>
  </div>
	  <div class="form-group row">
	    <label class="col-sm-2 col-form-label">Phone Number(s)</label>
    <div class="col-sm-5">
		  <input type="text" readonly class="form-control" value="<?php echo $Phone1;?>">
    </div>
    <div class="col-sm-5">
		  <input type="text" readonly class="form-control" value="<?php echo $Phone2;?>">
    </div>
  </div>
  

      	<div class="form-group row">
	    <label class="col-sm-2 col-form-label">Family Members</label>

	    <label class="col-sm-1 col-form-label">Children</label>
			<div class="col-sm-1">
				  <input type="text" readonly class="form-control" value="<?php echo $NumberofChildren;?>" placeholder="0">
			</div>
		<label class="col-sm-1 col-form-label">Adults</label>
			<div class="col-sm-1">
				  <input type="text" readonly class="form-control" value="<?php echo $NumberofAdults;?>" placeholder="0">
			</div>
		<label class="col-sm-1 col-form-label">Total</label>
			<div class="col-sm-1">
				  <input type="text" readonly class="form-control" value="<?php echo $NumberofFamilyMembers;?>" placeholder="0">
			</div>			
							</div>			

			
</form>

<h4>Add Children</h4>

<form class="form-inline">
	<input readonly tabindex="-1" type="text" class="col-sm-1 mb-2 mr-sm-2 form-control" value="Gender">
	<input readonly tabindex="-1" type="text" class="col-sm-1 mb-2 mr-sm-2 form-control" value="Age">
	<input readonly tabindex="-1" type="text" class="col-sm-1 mb-2 mr-sm-2 form-control" value="School">
	<input readonly tabindex="-1" type="text" class="mb-2 mr-sm-2 form-control" value="Clothes Size">	
	<input readonly tabindex="-1" type="text" class="mb-2 mr-sm-2 form-control" name="ClothingStyles" placeholder="Clothing Styles">	
	<input readonly tabindex="-1" type="text" class="mb-2 mr-sm-2 form-control" name="ClothingOptions" placeholder="Clothing Options">	
	<input readonly tabindex="-1" type="text" class="mb-2 mr-sm-2 form-control" name="GiftPreferences" placeholder="Gift Preferences">
	

</form>


<?php

include '../dbconfig.php';


$sql = "SELECT ChildID, Gender, Age, School, ClothesSize, ClothingStyles, ClothingOptions, GiftPreferences FROM child
where FamilyID=".$AddedFamilyID;
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) { ?>
	
	
		 <html><form autocomplete="off" action="ViewChild.php" method="post" class="form-inline">
	<input type="hidden"  name="ChildID" value="<?php echo $row["ChildID"]; ?>">

	<input readonly type="text" class="col-sm-1 mb-2 mr-sm-2 form-control" value="<?php echo $row["Gender"]; ?>">
	<input readonly type="text" class="col-sm-1 mb-2 mr-sm-2 form-control" value="<?php echo $row["Age"]; ?>">
	<input readonly type="text" class="col-sm-1 mb-2 mr-sm-2 form-control" value="<?php echo $row["School"];?>">

<!-- 	<select readonly class="col-sm-1 mb-2 mr-sm-2 form-control" name="School">
		<option>School</option>
		<option <?php if ($row["School"] == "MWE") {echo "selected=\"selected\"";} ?> value="MWE">MWE</option>
		<option <?php if ($row["School"] == "MCE") {echo "selected=\"selected\"";} ?> value="MCE">MCE</option>
		<option <?php if ($row["School"] == "GFMS") {echo "selected=\"selected\"";} ?> value="GFMS">GFMS</option>
		<option <?php if ($row["School"] == "GFHS") {echo "selected=\"selected\"";} ?> value="GFHS">GFHS</option>
		<option <?php if ($row["School"] == "CRHS") {echo "selected=\"selected\"";} ?> value="CRHS">CRHS/OD</option>
		<option <?php if ($row["School"] == "None/Other") {echo "selected=\"selected\"";} ?> value="None/Other">None/Other</option>

    </select>
 -->
	<input readonly type="text" class="mb-2 mr-sm-2 form-control" value="<?php echo $row["ClothesSize"]; ?>" placeholder="Clothes Size">	
	<input readonly type="text" class="mb-2 mr-sm-2 form-control" value="<?php echo $row["ClothingStyles"]; ?>" placeholder="Clothing Styles">	
	<input readonly type="text" class="mb-2 mr-sm-2 form-control" value="<?php echo $row["ClothingOptions"]; ?>" placeholder="Clothing Options">	
	<input readonly type="text" class="mb-2 mr-sm-2 form-control" value="<?php echo $row["GiftPreferences"]; ?>" placeholder="Gift Preferences">	
		<button type="submit" class="btn btn-primary mb-2 mr-sm-2">Edit</button>

</form>
		
<?php	
;
    }
} else { ?>
    <div class="form-group row">0 Children in Family</div>
	<?php	
}
$conn->close();
		  
?>

<form autocomplete="off" action="InsertNewChild.php" method="post" class="form-inline">
	<input type="hidden"  name="FamilyID" value="<?php echo $AddedFamilyID; ?>">
    <select class="col-sm-1 mb-2 mr-sm-2 form-control" name="Gender">
		<option>Gender</option>
		<option value="M">Male</option>
		<option value="F">Female</option>
		<option value="Other">Other</option>
    </select>
	<input type="text" class="col-sm-1 mb-2 mr-sm-2 form-control" name="Age" placeholder="Age">
	<select class="col-sm-1 mb-2 mr-sm-2 form-control" name="School">
		<option>School</option>
		<option value="MWE">MWE</option>
		<option value="MCE">MCE</option>
		<option value="GFMS">GFMS</option>
		<option value="GFHS">GFHS</option>
		<option value="CRHS">CRHS/OD</option>
		<option value="None/Other">None/Other</option>

    </select>
	<input type="text" class="mb-2 mr-sm-2 form-control" name="ClothesSize" placeholder="Clothes Size">	
	<input type="text" class="mb-2 mr-sm-2 form-control" name="ClothingStyles" placeholder="Clothing Styles">	
	<input type="text" class="mb-2 mr-sm-2 form-control" name="ClothingOptions" placeholder="Clothing Options">	
	<input type="text" class="mb-2 mr-sm-2 form-control" name="GiftPreferences" placeholder="Gift Preferences">	
	<button type="submit" class="btn btn-primary mb-2 mr-sm-2">Add</button>
</form>

        </main>
      </div>
  </body>
</html>
