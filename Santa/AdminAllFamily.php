<?php include 'checkauth.php';?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Use the North Pole Family Management System.">

<title>View All Families · North Pole</title>

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
          <h2 id="content">All Families</h2>
		  <br>

		  
		  
		 <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Family #</th>
      <th scope="col">Family Name</th>
      <th scope="col">Address</th>
    </tr>
  </thead>
  <tbody>
				<?php
				
include '../dbconfig.php';


$sql = "SELECT FamilyNumber, FamilyName, Address FROM family
ORDER BY FamilyNumber";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
      <th scope=\"row\">".$row["FamilyNumber"]. "</th>
      <td>".$row["FamilyName"]. "</th>
      <td>" . $row["Address"]. "</td>
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
