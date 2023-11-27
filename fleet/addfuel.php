<?php include ('index.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fuel Details Form</title>
  <link rel="stylesheet" href="styles/fleetformstyle.css">
</head>
<body>
<form method="post" action="post_fuel.php">
  <!-- Separate section for the Submit button -->
  <div style="width: 600px; margin: 20px auto; text-align: center;">
    <h2> ENTER FUEL DETAILS </h2>
  </div>
  <div class="form-container">
    <div class="section">
      <label for="Date" class="required-label">Date:</label>
      <input type="date" id="Date" name="Date" required>

      <label for="VehicleID" class="required-label">Vehicle ID:</label>
      <select id="VehicleID" name="VehicleID" required>
	      <option value="">Select Vehicle</option></select>

      <label for="DriverID" class="required-label">Driver ID:</label>
      <select id="DriverID" name="DriverID" required>
	     <option value="">Select Driver</option></select>
    </div>

    <div class="section">
      <label for="Type">Type of fuel:</label>
      <input type="text" id="Type" name="Type">

      <label for="Litres" class="required-label">Litres:</label>
      <input type="number" id="Litres" name="Litres" required>

      <label for="LitreCost" class="required-label">Litre Cost:</label>
      <input type="number" id="LitreCost" name="LitreCost" required>
    </div>

    <div class="section">
      <label for="TotalCost">Total Cost:</label>
      <input type="number" id="TotalCost" name="TotalCost">

      <label for="Source" class="required-label">Source:</label>
      <select id="Source" name="Source" required>
        <option>External</option>
        <option>MMH</option>
      </select>

      <label for="CostCentre" class="required-label">Cost Centre:</label>
      <select id="CostCentre" name="CostCentre" required>
	    <option value="">Select Cost Centre</option></select>
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
