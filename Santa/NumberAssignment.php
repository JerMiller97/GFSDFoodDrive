<?php include 'checkauth.php';?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Use the North Pole Family Management System.">

<title>Assign Family Numbers · North Pole</title>

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
        <main class="col-12 col-md-9  py-md-3 pl-md-5 bd-content" role="main">
          <h2 id="content">Family Number Assignment</h2>
		  <?php 
if (isset($_GET['status'])) {
$status = $_GET['status'];};

if ($status == 1)
	print "

<div class=\"alert alert-success\" role=\"alert\">
Family Number Updated Successfully!
</div>
";
if ($status == 2)
	print "

<div class=\"alert alert-danger\" role=\"alert\">
Error Updating Family Number - Check your input.
</div>
";
if ($status == 3)
	print "

<div class=\"alert alert-danger\" role=\"alert\">
Duplicate Family Number - Check your input.
</div>
";

?>
		  
		  <br>
		  <span>Next Available Family Numbers to Assign:</span>
		    
		  <?php
include '../dbconfig.php';


$sql = "SELECT max(FamilyNumber) as MaxCR FROM family
where FamilyNumber < 100;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $CRNext = $row["MaxCR"] + 1;
    }
}

print "<br>Crossroads: ".$CRNext;

$sql = "SELECT max(FamilyNumber) as MaxGFHS FROM family
where FamilyNumber >= 400 and FamilyNumber <= 499 ;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $GFHSNext = $row["MaxGFHS"] + 1
		;
    }
};

if ($GFHSNext < 400) $GFHSNext = 401;

print "<br>GFHS: ".$GFHSNext;

?>

<html>

<form class="form-inline">
	<input type="text" readonly class="form-control mb-2 mr-sm-2" size="5" value="Family #">
	<button tabindex="-1" type="submit" class="btn btn-primary mb-2 mr-sm-2">Submit</button>
	<input readonly tabindex="-1" type="text" size="8" class="mb-2 mr-sm-2 form-control" value="User Entered">
	<input readonly tabindex="-1" type="text" size="8" class="mb-2 mr-sm-2 form-control" value="Family Name">
	<input readonly tabindex="-1" type="text" size="9" class="mb-2 mr-sm-2 form-control" value="Phone #">	
	<input readonly tabindex="-1" type="text" size="9" class="mb-2 mr-sm-2 form-control" value="Alt Phone #">
	<input readonly tabindex="-1" type="text" size="6" class="mb-2 mr-sm-2 form-control" value="CRHS?">	
	<input readonly tabindex="-1" type="text" size="6" class="mb-2 mr-sm-2 form-control" value="GFHS?">	
	
	

	<input readonly tabindex="-1" type="text" size="12" class="mb-2 mr-sm-2 form-control" value="Address">

</form>

</html>

<?php

$sql = "SELECT FamilyNumber, FamilyID, FamilyName, Address, Phone1, Phone2, tblUser.username, hasCRHSChildren, hasGFHSChildren FROM family
left join tblUser on family.userID = tblUser.userID 
ORDER BY FamilyNumber";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		if ($row["hasCRHSChildren"] == 1)
		{$hasCRHSOutput = "Yes";}
		else {$hasCRHSOutput = "";}
		if ($row["hasGFHSChildren"] == 1)
		{$hasGFHSOutput = "Yes";}
		else {$hasGFHSOutput = "";}
        echo "<form class=\"form-inline\" method=\"post\" action=\"update.php\">
			<input type=\"text\" class=\"form-control mb-2 mr-sm-2\" size=\"5\" name=\"FamilyNumber\" value=\"".$row["FamilyNumber"]. "\">
			<button tabindex=\"-1\" name=\"submit\" type=\"submit\" class=\"btn btn-primary mb-2 mr-sm-2\">Submit</button>
			<input hidden readonly type=\"text\" size=\"3\" class=\"mb-2 mr-sm-2 form-control\" name=\"FamilyID\" value=\"".$row["FamilyID"]. "\">
			<input readonly tabindex=\"-1\" type=\"text\" size=\"8\" class=\"mb-2 mr-sm-2 form-control\" value=\"".$row["username"]. "\">
			<input readonly tabindex=\"-1\" type=\"text\" size=\"8\" class=\"mb-2 mr-sm-2 form-control\" value=\"".$row["FamilyName"]. "\">
			<input readonly tabindex=\"-1\" type=\"text\" size=\"9\" class=\"mb-2 mr-sm-2 form-control\" value=\"".$row["Phone1"]. "\">	
			<input readonly tabindex=\"-1\" type=\"text\" size=\"9\" class=\"mb-2 mr-sm-2 form-control\" value=\"".$row["Phone2"]. "\">	
			<input readonly tabindex=\"-1\" type=\"text\" size=\"6\" class=\"mb-2 mr-sm-2 form-control\" value=\"".$hasCRHSOutput. "\">	
			<input readonly tabindex=\"-1\" type=\"text\" size=\"6\" class=\"mb-2 mr-sm-2 form-control\" value=\"".$hasGFHSOutput. "\">	
	

	<input readonly tabindex=\"-1\" type=\"text\" size=\"12\" class=\"mb-2 mr-sm-2 form-control\" value=\"" . $row["Address"]. "\">

</form>";
    }
} else {
    echo "0 results";
}
$conn->close();
		  

				?>
  </tbody>
</table>
        </main>
      </div>
    </div>
  </body>
</html>
