<?php include 'checkauth.php';
session_start();

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Use the North Pole Family Management System.">

<title>Add Users · North Pole</title>

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
          <h2 id="content">View and Add Users</h2>	
		  


<form class="form-inline">
	<input readonly tabindex="-1" type="text" class="col-sm-2 mb-2 mr-sm-2 form-control" value="Username">
	<input readonly tabindex="-1" type="text" class="col-sm-1 mb-2 mr-sm-2 form-control" value="First Name">
	<input readonly tabindex="-1" type="text" class="col-sm-1 mb-2 mr-sm-2 form-control" value="Last Name">
	<input readonly tabindex="-1" type="text" class="col-sm-2 mb-2 mr-sm-2 form-control" value="Permission">
	<input readonly tabindex="-1" type="text" class="col-sm-2 mb-2 mr-sm-2 form-control" value="Password">

	</form>

		  <form autocomplete="off" action="InsertNewUser.php" method="post" class="form-inline">
	<input type="text" class="col-sm-2 mb-2 mr-sm-2 form-control" placeholder="Username" name="userusername">
	<input type="text" class="col-sm-1 mb-2 mr-sm-2 form-control" placeholder="First Name" name="FirstName">
	<input type="text" class="col-sm-1 mb-2 mr-sm-2 form-control" placeholder="Last Name" name="LastName">
	
	<select class="col-sm-2 mb-2 mr-sm-2 form-control" name="permission">
		<option value="0">Inactive</option>
		<option value="7">Family Entry</option>
		<option value="8">Coordinator</option>
		<option value="9">Santa</option>
    </select>
	<input type="password" class="col-sm-2 mb-2 mr-sm-2 form-control" placeholder="Password" name="userpassword">
	<button type="submit" class="btn btn-primary mb-2 mr-sm-2">Add</button>

</form>

<?php

include '../dbconfig.php';


$sql = "SELECT userID, username, FirstName, LastName, permission FROM tblUser
order by userID desc";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) { ?>
	<form autocomplete="off" action="UpdateUser.php" method="post" class="form-inline">
	<input type="hidden"  name="userID" value="<?php echo $row["userID"]; ?>">

	<input readonly type="text" class="col-sm-2 mb-2 mr-sm-2 form-control" value="<?php echo $row["username"]; ?>">
	<input type="text" name="FirstName" class="col-sm-1 mb-2 mr-sm-2 form-control" value="<?php echo $row["FirstName"]; ?>">
	<input type="text" name="LastName" class="col-sm-1 mb-2 mr-sm-2 form-control" value="<?php echo $row["LastName"];?>">
	
	<select class="col-sm-2 mb-2 mr-sm-2 form-control" name="permission">
		<option <?php if ($row["permission"] == "0") {echo "selected=\"selected\"";} ?> value="0">Inactive</option>
		<option <?php if ($row["permission"] == "7") {echo "selected=\"selected\"";} ?> value="7">Family Entry</option>
		<option <?php if ($row["permission"] == "8") {echo "selected=\"selected\"";} ?> value="8">Coordinator</option>
		<option <?php if ($row["permission"] == "9") {echo "selected=\"selected\"";} ?> value="9">Santa</option>

    </select>
	
	<input type="password" name="userpassword" class="col-sm-2 mb-2 mr-sm-2 form-control" placeholder="New Password">

	<button type="submit" class="btn btn-primary mb-2 mr-sm-2">Update</button>

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



        </main>
      </div>
  </body>
</html>
