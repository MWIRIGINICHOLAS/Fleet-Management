<?php
// Connect to the database
$connection = mysqli_connect("localhost", "root", "", "mmhtools");


// Check if the connection is successful
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Function to sanitize form data
function sanitizeData($data) {
    global $connection;
    return mysqli_real_escape_string($connection, $data);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract data from the form
    $purchaseDate = sanitizeData($_POST['PurchaseDate']);
    $vehicleID = sanitizeData($_POST['VehicleID']);
    $driverID = sanitizeData($_POST['DriverID']);
    $make = sanitizeData($_POST['Make']);
    $type = sanitizeData($_POST['Type']);
    $colour = sanitizeData($_POST['Colour']);
    $engine = sanitizeData($_POST['Engine']);
    $manufactureYear = sanitizeData($_POST['ManufactureYear']);
    $rating = sanitizeData($_POST['Rating']);
    $seat = sanitizeData($_POST['Seat']);
    $duty = sanitizeData($_POST['Duty']);
	$vender = sanitizeData($_POST['Vender']);
	$purchaseprice = sanitizeData($_POST['PurchasePrice']);
    $transmission = sanitizeData($_POST['Transmission']);
    $fuel = sanitizeData($_POST['Fuel']);
    $batteryDetails = sanitizeData($_POST['BatteryDeta']);
    $tyreDetails = sanitizeData($_POST['TyreDetail']);
    $chasisNumber = sanitizeData($_POST['ChasisNo']);
    $tools = sanitizeData($_POST['Tools']);
    $notes = sanitizeData($_POST['Notes']);
    $disposed = sanitizeData($_POST['Disposed']);
    $yearDisposed = sanitizeData($_POST['YearDisposed']);
    $buyer = sanitizeData($_POST['Buyer']);
    $disposalValue = sanitizeData($_POST['DisposalValue']);

    // SQL query to insert data into the vehicledetails table
    $sql = "INSERT INTO vehicledetails (PurchaseDate, VehicleID, DriverID, Make, Type, Colour, Engine, ManufactureYear, Rating, Seat, Duty, Vender, PurchasePrice, Transmission, Fuel, BatteryDeta, TyreDetail, ChasisNo, Tools, Notes, Disposed, YearDisposed, Buyer, DisposalValue)
            VALUES ('$purchaseDate', '$vehicleID', '$driverID', '$make', '$type', '$colour', '$engine', '$manufactureYear', '$rating', '$seat', '$vender',  '$purchaseprice',  '$duty', '$transmission', '$fuel', '$batteryDetails', '$tyreDetails', '$chasisNumber', '$tools', '$notes', '$disposed', '$yearDisposed', '$buyer', '$disposalValue')";

    // Execute the query
    if (mysqli_query($connection, $sql)) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }

    // Close the database connection
    mysqli_close($connection);
}
?>
