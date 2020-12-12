<?php include 'checkauth.php';
session_start();

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Use the North Pole Family Management System.">

<title>Edit Child Info · North Pole</title>

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
          <h2 id="content">Edit Child Info</h2>
		<?php 
		
		if (isset($_POST['ChildID'])) {
$ChildID = $_POST['ChildID'];};

?>
		
		
		
		<?php
				
include '../dbconfig.php';

$sql = "SELECT FamilyID, Gender, Age, School, ClothesSize, ClothingStyles, ClothingOptions, GiftPreferences FROM child
where ChildID=".$ChildID;
$result = $conn->query($sql);


if ($result->num_rows == 1) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$FamilyID = $row["FamilyID"];
		$Gender = $row["Gender"];
		$Age = $row["Age"];
		$School = $row["School"];
		$ClothesSize = $row["ClothesSize"];
		$ClothingStyles = $row["ClothingStyles"];
		$ClothingOptions = $row["ClothingOptions"];
		$GiftPreferences = $row["GiftPreferences"];
    }
} else {
	print "

<div class=\"alert alert-danger\" role=\"alert\">
No family found
</div>";
}
$conn->close();
		  

				?>
		
		
<form autocomplete="off" action="UpdateChild.php" method="post">
	<input type="hidden"  name="ChildID" value="<?php echo $ChildID; ?>">
	<input type="hidden"  name="FamilyID" value="<?php echo $FamilyID; ?>">

  <div class="form-group row">
    <label class="col-sm-1 col-form-label">Gender</label>
    <input type="text" readonly class="col-sm-1 form-control" value="<?php echo $Gender;?>">
    <label class="col-sm-1 col-form-label">Age</label>
    <input type="text" readonly class="col-sm-1 form-control" value="<?php echo $Age;?>">
    <label class="col-sm-1 col-form-label">School</label>
    <input type="text" readonly class="col-sm-1 form-control" value="<?php echo $School;?>">
  </div>
  <div class="form-group row">
	    <label class="col-sm-1 col-form-label">Clothes Size</label>
		<textarea name="ClothesSize" type="text" class="col-sm-5 form-control" rows="4" ><?php echo $ClothesSize;?></textarea>
  </div>
  <div class="form-group row">
	    <label class="col-sm-1 col-form-label">Clothing Styles</label>
		<textarea name="ClothingStyles" type="text" class="col-sm-5 form-control" rows="4" ><?php echo $ClothingStyles;?></textarea>
  </div>
  <div class="form-group row">
	    <label class="col-sm-1 col-form-label">Clothing Options</label>
		<textarea name="ClothingOptions" type="text" class="col-sm-5 form-control" rows="4" ><?php echo $ClothingOptions;?></textarea>
  </div>
  <div class="form-group row">
	    <label class="col-sm-1 col-form-label">Gift Preferences</label>
		<textarea name="GiftPreferences" type="text" class="col-sm-5 form-control" rows="4" ><?php echo $GiftPreferences;?></textarea>
  </div>
  <div class="form-group row">
		<button type="submit" class="col-sm-1  btn btn-primary mb-2">Save</button>
  </div>

	
</form>
	
	

		


        </main>
      </div>
  </body>
</html>
