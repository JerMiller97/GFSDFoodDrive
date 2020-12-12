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



$sql = "SELECT FamilyNumber, FamilyName, Address FROM family
ORDER BY FamilyNumber";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Family Number: <a href =/lookup.php?family=" . $row[FamilyNumber]. ">" . $row["FamilyNumber"]. "</a> <br> Family Name(s): " . $row["FamilyName"]. "<br>Address: " . $row["Address"]. "<br><br>";
    }
} else {
    echo "0 results";
}
$conn->close();


?>  

