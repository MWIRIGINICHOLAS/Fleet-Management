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
$garageMechanic = $_POST['GarageMechanic'];
$details = $_POST['Details'];
$cost = $_POST['Cost'];
$costCentre = $_POST['UnitName'];

// SQL query to insert data into the repairs table
$sql = "INSERT INTO repairs (Date, VehicleID, DriverID, 'Garage/Mechanic', Details, Cost, UnitName)
        VALUES ('$date', '$vehicleID', '$driverID', '$garageMechanic', '$details', '$cost', '$costCentre')";

if ($conn->query($sql) === TRUE) {
    echo "Record inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>


