<?php
$servername = "localhost";
$username = "fooddrive";
$password = "turkeygravey";
$dbname = "gfsdfooddrive";

if (isset($_GET['family'])) {
$family = $_GET['family'];}


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

	echo "<a href=\"index.php\">Back</a><br>";

$sql = "SELECT FamilyNumber, FamilyName, Address FROM family
where FamilyNumber=" . $family;
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row

    while($row = $result->fetch_assoc()) {
        echo "Family Number: " . $row["FamilyNumber"]. "</a> <br> Last Name: " . $row["FamilyName"]. "<br> " . $row["Address"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>  
