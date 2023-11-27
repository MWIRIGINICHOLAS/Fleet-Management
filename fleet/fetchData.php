<?php
// Connect to the database
$connection = mysqli_connect("localhost", "root", "", "mmhtools");

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch vehicle IDs and driver IDs from the database
$query = "SELECT VehicleID, DriverID FROM vehicledetails";
$result = mysqli_query($connection, $query);

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// Close the database connection
mysqli_close($connection);

// Set the response header to indicate JSON content
header("Content-Type: application/json");

// Return data as JSON
echo json_encode($data);
?>
