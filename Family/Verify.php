<?php include 'checkauth.php';
session_start();


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Use the North Pole Family Management System.">

<title>Add New Family · North Pole</title>

<!-- Bootstrap core CSS -->
<link href="/css/bootstrap.css" rel="stylesheet">
<!-- Documentation extras -->

<link href="/css/docs.css" rel="stylesheet">
<link href="/css/docsearch.css" rel="stylesheet">

<!-- Favicons -->

  </head>
  <body>
  
<?php include 'header.php';
?>
    <div class="container-fluid">
      <div class="row flex-xl-nowrap">
       
	   <?php include 'sidebar.php';?>
        <main class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content" role="main">
          <h2 id="content">Verify Family Info</h2>
		  
		  <div class="alert alert-warning" role="alert">
This information looks good - hit submit to enter it into the database!<br>You can also hit "back" to edit the information before you submit.</div>

		  <form  autocomplete="off" action="InsertNew.php" method="post">
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Family Name</label>
    <div class="col-sm-10">
      <input readonly type="text" name="FamilyName" class="form-control" value="<?php echo $_SESSION["FamilyName"];?>" placeholder="Family Name">

    </div>
	    </div>
	  <div class="form-group row">
	    <label class="col-sm-2 col-form-label">Address</label>
    <div class="col-sm-10">
		  <input type="text" name="Address" class="form-control" value="<?php echo $_SESSION["Address"];?>" placeholder="1401 100th St NE Granite Falls WA 98252">
    </div>
  </div>
	  <div class="form-group row">
	    <label class="col-sm-2 col-form-label">Phone Number(s)</label>
    <div class="col-sm-5">
		  <input type="text" name="Phone1" class="form-control" value="<?php echo $_SESSION["Phone1"];?>" placeholder="555-555-5555">
    </div>
    <div class="col-sm-5">
		  <input type="text" name="Phone2" class="form-control" value="<?php echo $_SESSION["Phone2"];?>" placeholder="555-555-2547">
    </div>
  </div>
  
  	  <div class="form-group row">
	    <label class="col-sm-2 col-form-label">Family's Email</label>
    <div class="col-sm-10">
		  <input type="text" name="Email" class="form-control" value="<?php echo $_SESSION["Email"];?>" placeholder="family@gmail.com">
    </div>
  </div>
      	<div class="form-group row">
	    <label class="col-sm-2 col-form-label">Adult Family Members<br>(over age 18)</label>

	    <label class="col-sm-1 col-form-label">Female</label>
			<div class="col-sm-1">
				  <input type="text" name="FemaleAdults" class="form-control" value="<?php echo $_SESSION["FemaleAdults"];?>" placeholder="0">
			</div>
		<label class="col-sm-1 col-form-label">Male</label>
			<div class="col-sm-1">
				  <input type="text" name="MaleAdults" class="form-control" value="<?php echo $_SESSION["MaleAdults"];?>" placeholder="0">
			</div>
				
			
  </div>
  	<div class="form-group row">
	    <label class="col-sm-2 col-form-label">Child Family Members<br>(under age 18)</label>

	    <label class="col-sm-1 col-form-label">Infants</label>
			<div class="col-sm-1">
				  <input type="text" name="Infants" class="form-control" value="<?php echo $_SESSION["Infants"];?>" placeholder="0">
			</div>
		<label class="col-sm-1 col-form-label">3 - 7</label>
			<div class="col-sm-1">
				  <input type="text" name="YoungChildren" class="form-control" value="<?php echo $_SESSION["YoungChildren"];?>" placeholder="0">
			</div>
				<label class="col-sm-1 col-form-label">Children</label>
			<div class="col-sm-1">
				  <input type="text" name="Children" class="form-control" value="<?php echo $_SESSION["Children"];?>" placeholder="0">
			</div>
				<label class="col-sm-1 col-form-label">Tween</label>
			<div class="col-sm-1">
				  <input type="text" name="Tween" class="form-control" value="<?php echo $_SESSION["Tween"];?>" placeholder="0">
			</div>
							<label class="col-sm-1 col-form-label">Teenager</label>
			<div class="col-sm-1">
				  <input type="text" name="Teenager" class="form-control" value="<?php echo $_SESSION["Teenager"];?>" placeholder="0">
			</div>
			
  </div>
  
    <div class="form-group row">
    <div class="col-sm-2">Do children attend:</div>
    <div class="col-sm-3">
      <div class="form-check">
        <input class="form-check-input"  type="checkbox" name="hasCRHSChildren" value="1">
        <label class="form-check-label" >
Crossroads High School        </label>
      </div>
    </div>
	    <div class="col-sm-3">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="hasGFHSChildren" value="1">
        <label class="form-check-label" >
Granite Falls High School Add checked value to input if variable match input value
        </label>

      </div>
    </div>
  </div>
  
  	  <div class="form-group row">
	    <label class="col-sm-2 col-form-label">Pet Information:</label>
    <div class="col-sm-5">
		  <input type="text" name="PetInformation" class="form-control" value="<?php echo $_SESSION["PetInformation"];?>" placeholder="If none, leave blank">
    </div>
  </div>
  
    <div class="form-group row">
    <label class="col-sm-2 col-form-label">Delivery Preference</label>
	<div class="col-sm-2">

    <select class="form-control" name="DeliveryPreference">
		<option>Choose One...</option>
		<option value="Delivery"  <?php if ($_SESSION["DeliveryPreference"] == "Delivery") echo "selected=\"selected\""; ?>  >Delivery</option>
		<option value="Pickup" <?php if ($_SESSION["DeliveryPreference"] == "Pickup") echo "selected=\"selected\""; ?> >Pickup</option>
    </select>
	</div>
	    <label class="col-sm-1 col-form-label">Date</label>
	<div class="col-sm-3">

    <select class="form-control" name="DeliveryDate">
	<option>Choose One...</option>
      <option value="December 18th" <?php if ($_SESSION["DeliveryDate"] == "December 18th") echo "selected=\"selected\""; ?> >December 18th</option>
      <option value="December 19th" <?php if ($_SESSION["DeliveryDate"] == "December 19th") echo "selected=\"selected\""; ?> >December 19th</option>
    </select>
	</div>
		    <label class="col-sm-1 col-form-label">Time</label>
	<div class="col-sm-2">

    <select class="form-control" name="DeliveryTime" value="8 am">
		      <option>Choose One...</option>

      <option <?php if ($_SESSION["DeliveryTime"] == "8 am") echo "selected=\"selected\""; ?> >8 am</option>
	  <option <?php if ($_SESSION["DeliveryTime"] == "9 am") echo "selected=\"selected\""; ?> >9 am</option>
      <option <?php if ($_SESSION["DeliveryTime"] == "10 am") echo "selected=\"selected\""; ?> >10 am</option>
      <option <?php if ($_SESSION["DeliveryTime"] == "11 am") echo "selected=\"selected\""; ?> >11 am</option>
      <option <?php if ($_SESSION["DeliveryTime"] == "12 pm") echo "selected=\"selected\""; ?> >12 pm</option>
      <option <?php if ($_SESSION["DeliveryTime"] == "1 pm") echo "selected=\"selected\""; ?> >1 pm</option>
      <option <?php if ($_SESSION["DeliveryTime"] == "2 pm") echo "selected=\"selected\""; ?> >2 pm</option>
      <option <?php if ($_SESSION["DeliveryTime"] == "3 pm") echo "selected=\"selected\""; ?> >3 pm</option>
      <option <?php if ($_SESSION["DeliveryTime"] == "4 pm") echo "selected=\"selected\""; ?> >4 pm</option>
      <option <?php if ($_SESSION["DeliveryTime"] == "5 pm") echo "selected=\"selected\""; ?> >5 pm</option>
			    </select>
	</div>

  </div>
  
    	  <div class="form-group row">
	    <label class="col-sm-2 col-form-label">Reason for help:</label>
    <div class="col-sm-5">
		  <input type="text" name="NeedforHelp" class="form-control" value="<?php echo $_SESSION["NeedforHelp"];?>" placeholder="If none, leave blank">
    </div>
  </div>
  
    	  <div class="form-group row">
	    <label class="col-sm-2 col-form-label">Severe need?</label>
    <div class="col-sm-5">
		  <input type="text" name="SevereNeed" class="form-control" value="<?php echo $_SESSION["SevereNeed"];?>" placeholder="If none, leave blank">
    </div>
  </div>
  
      	  <div class="form-group row">
	    <label class="col-sm-2 col-form-label">Other questions?</label>
    <div class="col-sm-5">
		  <input type="text" name="OtherQuestions" class="form-control" value="<?php echo $_SESSION["OtherQuestions"];?>" placeholder="If none, leave blank">
    </div>
  </div>


  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" name="submit" class="btn btn-primary">Save Family & Add Child Gift Info</button>
    </div>
  </div>
</form>
		  

<?php
				
include '../dbconfig.php';

$sql = "SELECT FamilyNumber, FamilyName, Address FROM family
where userID=".$_SESSION["userID"]."
ORDER BY FamilyNumber";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "YOU GOT IT";
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





<?php

session_start();

echo "<br>".$_SESSION["FamilyName"];
echo "<br>".$_SESSION["Address"];
echo "<br>".$_SESSION["Phone1"];
echo "<br>".$_SESSION["Phone2"];
echo "<br>".$_SESSION["Email"];
echo "<br>".$_SESSION["FemaleAdults"];
echo "<br>".$_SESSION["MaleAdults"];
echo "<br>".$_SESSION["NumberofAdults"];
echo "<br>".$_SESSION["Infants"];
echo "<br>".$_SESSION["YoungChildren"];
echo "<br>".$_SESSION["Children"];
echo "<br>".$_SESSION["Tween"];
echo "<br>".$_SESSION["Teenager"];
echo "<br>".$_SESSION["NumberofChildren"];
echo "<br>".$_SESSION["NumberofFamilyMembers"];
echo "<br>".$_SESSION["hasCRHSChildren"];
echo "<br>".$_SESSION["hasGFHSChildren"];
echo "<br>".$_SESSION["PetInformation"];
echo "<br>".$_SESSION["DeliveryPreference"];
echo "<br>".$_SESSION["DeliveryDate"];
echo "<br>".$_SESSION["DeliveryTime"];
echo "<br>".$_SESSION["NeedforHelp"];
echo "<br>".$_SESSION["SevereNeed"];
echo "<br>".$_SESSION["OtherQuestions"];







?>