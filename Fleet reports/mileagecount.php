<?php include 'Fleet_management_header.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <style>
    form {
        margin-left:5rem;
    }
    .form button, select, label, input{
        margin-top: 4.1rem;
        text-align:center;
        font-size:1.1rem;
        height:1.5rem;
         
    }
    
    
        body h2 {
            margin-left: 5rem;
        }
        table {
            border-collapse: collapse;
            margin-left: 5rem;
            width: 85%;
        }
        th, td {
            border: 1px solid black;
            padding: 5px;
            text-align: center;
            font-size: 1rem;
        }
        th.title {
            text-align: left;
            border: none;
            padding-top: 1.5rem;
        }
       
        .column-header {
            background-color: #FFCCDC;
            color: black;
            text-align: center;
        }
        .column-count {
            background-color: #FF6B6B;
            color: white;
        }
        .column-header {
            background-color: #FFCCDC;
            color: black;
            text-align: center;
        }
        .difference-column {
            background-color: #FF6B6B;
            color: black;
            padding:2px;
        }
    </style>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mmhtools";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Define the due mileage values for each vehicle
$dueMileageValues = array(
    "KCK 267C" => 96210,
    "KAV 472K" => 234794,
    "KBD 184P" => 214922,
    "KCX 403B" => 11426,
    "KAX 012U" => 202741,
    "KBE 925P" => 60645,
    "KCY 086S" => 11065,
    "KBM 846K" => 291345,
    "KCM 930Z" => 56176,
    "KAY 776F" => 135613
);

// Fetch data from the journeys table
$sqlJourneys = "SELECT VehicleID, ID, StartMileage, EndMileage, Date FROM journeys";
$resultJourneys = $conn->query($sqlJourneys);

?>

<form method="post" action="">
    <label for="vehicle">Select Vehicle:</label>
    <select id="vehicle" name="vehicle">
        <?php
        $uniqueVehicles = array();
        if ($resultJourneys->num_rows > 0) {
            while ($rowJourneys = $resultJourneys->fetch_assoc()) {
                $vehicleID = $rowJourneys["VehicleID"];
                if (!in_array($vehicleID, $uniqueVehicles)) {
                    array_push($uniqueVehicles, $vehicleID);
                    echo "<option value='$vehicleID'>$vehicleID</option>";
                }
            }
        } else {
            echo "<option value=''>No vehicles found</option>";
        }
        ?>
    </select>
    <input type="submit" value="Submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["vehicle"])) {
    $selectedVehicle = $_POST["vehicle"];

    // Fetch data for the selected vehicle
    $sqlSelectedVehicle = "SELECT ID, StartMileage, EndMileage, Date FROM journeys WHERE VehicleID = '$selectedVehicle'";
    $resultSelectedVehicle = $conn->query($sqlSelectedVehicle);

    echo "<h2>Selected Vehicle: $selectedVehicle</h2>";

    // Display data for the selected vehicle
    echo "<table>";
    echo "<tr class='column-header '><th>ID</th><th>Start Mileage</th><th>End Mileage</th><th>Journey Date</th><th>Due Mileage</th><th>Due Mileage Difference</th></tr>";

    if ($resultSelectedVehicle->num_rows > 0) {
        while ($rowJourneys = $resultSelectedVehicle->fetch_assoc()) {
            $journeyDate = $rowJourneys["Date"];
            $dueMileage = isset($dueMileageValues[$selectedVehicle]) ? $dueMileageValues[$selectedVehicle] : 0;
            $dueMileageDifference = $rowJourneys["EndMileage"] - $dueMileage;

            echo "<tr>";
            echo "<td>" . $rowJourneys["ID"] . "</td>";
            echo "<td>" . $rowJourneys["StartMileage"] . "</td>";
            echo "<td>" . $rowJourneys["EndMileage"] . "</td>";
            echo "<td>" . $journeyDate . "</td>";
            echo "<td>" . $dueMileage . "</td>";
            echo "<td class='difference-column'>" . $dueMileageDifference . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No data found for selected vehicle</td></tr>";
    }
    echo "</table>";
}

$conn->close();
?>

</body>
</html>
