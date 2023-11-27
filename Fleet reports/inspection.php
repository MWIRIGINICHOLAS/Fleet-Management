
<?php include 'Fleet_management_header.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Vehicle Report</title>
    <style>
        body h2 {
            margin-top: 4.2rem;
            margin-left: 3rem;
        }
        table {
            border-collapse: collapse;
            margin-left: 3rem;
            width: 90%;
        }
        th, td {
            border: 1px solid black;
            padding: 5px;
            text-align: center;
            font-size: 0.9rem;
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
        .inspection-count, .insurance-count {
            background-color: #FF6B6B;
            color: black;
        }
        .remaining-columns {
            background-color: #84A59D;
            color: black;
        }
    </style>
</head>
<body>

<?php
$host = "localhost"; // Change this to your database host
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$database = "mmhtools"; // Change this to your database name

// Create a connection
$connection = new mysqli($host, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Fetch data from the insurances table
$queryInsurances = "SELECT VehicleID, DriverID, InsuranceDate, InsuranceDue 
                   FROM insurances";
$resultInsurances = $connection->query($queryInsurances);

// Fetch data from the inspections table
$queryInspections = "SELECT VehicleID, InspectionDate, InspectionDue 
                   FROM inspections";
$resultInspections = $connection->query($queryInspections);

// Combine the data based on VehicleID
$data = array();
while ($row = $resultInsurances->fetch_assoc()) {
    $data[$row['VehicleID']]['DriverID'] = $row['DriverID'];
    $data[$row['VehicleID']]['InsuranceDate'] = $row['InsuranceDate'];
    $data[$row['VehicleID']]['InsuranceDue'] = $row['InsuranceDue'];
}

while ($row = $resultInspections->fetch_assoc()) {
    $data[$row['VehicleID']]['InspectionDate'] = $row['InspectionDate'];
    $data[$row['VehicleID']]['InspectionDue'] = $row['InspectionDue'];
}

// Display the combined data in a table
echo "<h2>Inspection and Insurance Report</h2>";
echo "<table>";
echo "<tr>";
echo "<th class='title' colspan='8'>Vehicle Inspection and Insurance Report</th>";
echo "</tr>";
echo "<tr>";
echo "<th class='column-header'>Vehicle ID</th>";
echo "<th class='column-header'>Driver ID</th>";
echo "<th class='column-header'>Insurance Date</th>";
echo "<th class='column-header'>Insurance Due</th>";
echo "<th class='column-header column-count'>Insurance Count</th>";
echo "<th class='column-header'>Inspection Date</th>";
echo "<th class='column-header'>Inspection Due</th>";
echo "<th class='column-header column-count'>Inspection Count</th>";
echo "</tr>";

foreach ($data as $vehicleID => $details) {
    echo "<tr>";
    echo "<td>{$vehicleID}</td>";
    echo "<td>{$details['DriverID']}</td>";
    echo "<td>{$details['InsuranceDate']}</td>";
    echo "<td>{$details['InsuranceDue']}</td>";
    
    // Calculate Insurance Count and Inspection Count
    $insuranceCount = isset($details['InsuranceDue']) ? getTimeDifference($details['InsuranceDue']) : '';
    $inspectionCount = isset($details['InspectionDue']) ? getTimeDifference($details['InspectionDue']) : '';
    
    echo "<td class='column-count'>{$insuranceCount}</td>";
    
    if (isset($details['InspectionDate'])) {
        echo "<td>{$details['InspectionDate']}</td>";
    } else {
        echo "<td></td>"; // Display a blank cell if key doesn't exist
    }

    if (isset($details['InspectionDue'])) {
        echo "<td>{$details['InspectionDue']}</td>";
        echo "<td class='column-count'>{$inspectionCount}</td>";
    } else {
        echo "<td></td>"; // Display a blank cell if key doesn't exist
        echo "<td class='column-count'></td>"; // Display a blank cell for inspection count
    }

    echo "</tr>";
}

echo "</table>";

// Close the connection
$connection->close();

function getTimeDifference($dueDate) {
    $currentDateTime = new DateTime();
    $dueDateTime = new DateTime($dueDate);
    $interval = $currentDateTime->diff($dueDateTime);
    return $interval->format('- %a days');
}
?>

</body>
</html>
