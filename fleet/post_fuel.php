<?php
// Connect to the database
$connection = mysqli_connect("localhost", "root", "", "mmhtools");

// Check if the connection is successful
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch values from the form
$date = $_POST['Date'];
$vehicleID = $_POST['VehicleID'];
$driverID = $_POST['DriverID'];
$type = $_POST['Type'];
$litres = $_POST['Litres'];
$litreCost = $_POST['LitreCost'];
$totalCost = $_POST['TotalCost'];
$source = $_POST['Source'];
$costCentre = $_POST['CostCentre'];

// SQL query to insert data into the fuel table
$sql = "INSERT INTO fuel (Date, VehicleID, DriverID, Type, Litres, LitreCost, TotalCost, Source, CostCentre)
        VALUES ('$date', '$vehicleID', '$driverID', '$type', '$litres', '$litreCost', '$totalCost', '$source', '$costCentre')";

if ($connection->query($sql) === TRUE) {
    echo "Record inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $connection->error;
}

// Close the database connection
$connection->close();
?>
