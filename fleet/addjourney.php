<?php include ('index.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Journey Details Form</title>
  <link rel="stylesheet" href="styles/fleetformstyle.css">
</head>
<body style="margin-top:5rem;">
 <form id="myForm" method="post" action="Post_journeys.php">
               <div>
			   <p></p>
			   <p></p>
               </div>
        <div style="width: 600px; margin: 20px auto; text-align: center;">
            <h2> ENTER JOURNEY DETAILS </h2>
        </div>
        <div class="form-container">
            <div class="section">
                <div>
                    <label for="Date">Date:</label>
                    <input type="date" id="Date" name="Date" required>

                    <label for="VehicleID">Vehicle ID:</label>
                    <select id="VehicleID" name="VehicleID" required>
                        <option value="">Select Vehicle</option>
                        <!-- Add vehicle options dynamically using JavaScript -->
                    </select>

                    <label for="DriverID">Driver ID:</label>
                    <select id="DriverID" name="DriverID" required>
                        <option value="">Select Driver</option>
                        <!-- Add driver options dynamically using JavaScript -->
                    </select>
                </div>
            </div>

            <div class="section">
                <div>
                    <label for="EndMileage">End Mileage:</label>
                    <input type="number" id="EndMileage" name="EndMileage" required onchange="calculateTotalKMs();">

                    <label for="StartMileage">Start Mileage:</label>
                    <input type="number" id="StartMileage" name="StartMileage" required onchange="calculateTotalKMs();">

                    <label for="TotalKMs">Total KMs:</label>
                    <input type="number" id="TotalKMs" name="TotalKMs" readonly>

                    <label for="PurposeOfJourney">Purpose of Journey:</label>
                    <textarea id="PurposeOfJourney" name="PurposeOfJourney" required></textarea>

                </div>
            </div>

            <div class="section">
                <div>
                    <label for="TimeOUT">Time Out:</label>
                    <input type="time" id="TimeOUT" name="TimeOUT" required onchange="calculateTotalTime();">

                    <label for="TimeIN">Time In:</label>
                    <input type="time" id="TimeIN" name="TimeIN" required onchange="calculateTotalTime();">

                    <label for="TotalTime">Total Time:</label>
                    <input type="text" id="TotalTime" name="TotalTime" readonly>

                    <label for="CostCentre">Cost Centre:</label>
                    <select id="CostCentre" name="CostCentre" required>
                        <option value="">Select Cost Centre</option>
                        <!-- Add cost center options dynamically using JavaScript -->
                    </select>
                </div>
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
