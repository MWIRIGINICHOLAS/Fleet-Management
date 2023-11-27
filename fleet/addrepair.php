<?php include ('index.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Repair Details Form</title>
  <link rel="stylesheet" href="styles/fleetformstyle.css">
  
</head>
<body>
<form method="post" action="post_repairs.php">
    <div style="width: 600px; margin: 20px auto; text-align:center;">
        <h2> ENTER REPAIR DETAILS</h2>
    </div>
    <div class="form-container">
        <div class="section">
            <label for="Date" class="required-label">Date:</label>
            <input type="date" id="Date" name="Date" required>

            <label for="VehicleID" class="required-label">Vehicle ID:</label>
            <select id="VehicleID" name="VehicleID" required>
                <option value="">Select Vehicle</option>
                <!-- Add vehicle options dynamically using JavaScript -->
            </select>

            <label for="DriverID" class="required-label">Driver ID:</label>
            <select id="DriverID" name="DriverID" required>
                <option value="">Select Driver</option>
                <!-- Add driver options dynamically using JavaScript -->
            </select>
        </div>

        <div class="section">
            <label for="GarageMechanic" class="required-label">Garage/Mechanic:</label>
            <input type="text" id="GarageMechanic" name="GarageMechanic" required>

            <label for="Details" class="required-label">Details:</label>
            <input type="text" id="Details" name="Details" required>
        </div>

        <div class="section">
            <label for="Cost" class="required-label">Cost:</label>
            <input type="number" id="Cost" name="Cost">

            <label for="CostCentre" class="required-label">Cost Centre:</label>
            <select id="CostCentre" name="CostCentre" required>
                <option value="">Select Cost Centre</option>
                <!-- Add cost center options dynamically using JavaScript -->
            </select>
        </div>

        <!-- Separate section for the Submit button -->
        <div style="width: 150px; margin: 20px auto;">
            <button type="submit">Submit</button>
        </div>
    </div>
</form>
<script src="js/formscript.js"></script>
</body>
</html>
