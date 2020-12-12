<?php include 'checkauth.php';
session_start();

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Use the North Pole Family Management System.">

<title>All <?php echo ucwords($_SESSION["user"]); ?>'s Families · North Pole</title>

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
        <main class="col-12 col-md-9 py-md-3 pl-md-5 bd-content" role="main">
          <h2 id="content">All <?php echo ucwords($_SESSION["user"]); ?>'s Families</h2>
		  <br>

		  		  <br>

		 <table class="table table-hover">
  <thead>
    <tr>
		<th scope="col">Family #</th>
		<th scope="col">Family Name</th>
		<th scope="col">Address</th>
		<th scope="col">Phone Number</th>

    </tr>
  </thead>
  <tbody>
				<?php
				
include '../dbconfig.php';


$sql = "SELECT FamilyID, FamilyNumber, FamilyName, Address, Phone1 FROM family
where userID=".$_SESSION["userID"]."
ORDER BY FamilyNumber";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
		<td>
		<a href=\"/Family/ViewFamilyAddChildren.php?family=".$row["FamilyID"]."\">
		".$row["FamilyNumber"]."
		</a>		
		</td>
		<td>
		<a href=\"/Family/ViewFamilyAddChildren.php?family=".$row["FamilyID"]."\">
		
		".$row["FamilyName"]."
		</a>		
		
		</th>

		<td>".$row["Address"]."</td>
				<td>".$row["Phone1"]."</td>
    </tr>";
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
