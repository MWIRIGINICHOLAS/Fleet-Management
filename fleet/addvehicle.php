<?php include ('index.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vehicle Details Form</title>
  <style>
      body {
      font-family: 'Arial', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
       margin-top: 5rem;
      background-color: #673ab7;
	  color:white;
    }

    .form-container {
      width: 900px;
      background-color: #4CAF50;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
      display: flex;
      flex-direction: row;
      justify-content: space-between;
      flex-wrap: wrap;  
    }

    .section {
      width: calc(33.33% - 20px);
      margin-right: 20px;
      margin-bottom: 20px;
    }

    .form-heading {
      width: 100%;
      text-align: center;
      font-size: 28px;
      font-weight: bold;
      color: #333333;
      margin-bottom: 20px;
    }

    label {
      font-weight: bold;
      display: block;
      margin-top: 10px;
      color: Black;
    }

    input, select, textarea {
      width: 100%;
      padding: 8px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    button {
      width: 100%;
      padding: 12px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }

    .required-label::after {
      content: '*';
      color: red;
    }

    /* Styling for responsive design */
    @media screen and (max-width: 768px) {
      .section {
        width: 100%;
        margin-right: 0;
      }
    }
  
  </style>
</head>

<body>
  <form id="myForm" method="post" action="post_vehicledetails.php">
  <div style="width: 600px; margin: 20px auto; text-align: center;">
        <h2> ENTER VEHICLE DETAILS<h2>
    </div> 
  <div class="form-container">
    <div class="section">
      <label for="PurchaseDate">Purchase Date:</label>
      <input type="date" id="PurchaseDate" name="PurchaseDate" required>

      <label for="VehicleID">Vehicle ID:</label>
      <select id="VehicleID" name="VehicleID" required>
         <option value="">Select Vehicle</option></select>

     <label for="DriverID">Driver ID:</label>
     <select id="DriverID" name="DriverID" required>
       <option value="">Select Driver</option></select>
                        
      <label for="Make">Make:</label>
      <input type="text" id="Make" name="Make" required>

      <label for="Type">Type:</label>
      <input type="text" id="Type" name="Type" required>

      <label for="Colour">Colour:</label>
      <input type="text" id="Colour" name="Colour" required>

      <label for="Engine">Engine:</label>
      <input type="text" id="Engine" name="Engine" required>
	  
	  <label for="ManufactureYear">Manufacture Year:</label>
      <input type="number" id="ManufactureYear" name="ManufactureYear" required>
    </div>

    <div class="section">
      
      <label for="Rating">Rating:</label>
      <input type="number" id="Rating" name="Rating" required>

      <label for="Seat">Seat:</label>
      <input type="number" id="Seat" name="Seat" required>
	  
	  <label for="vender">Vender:</label>
      <input type="text" id="Vender" name="Vender" required>
	  
	  <label for="purchaseprice">purchase price:</label>
      <input type="number" id="PurchasePrice" name="PurchasePrice" required>

      <label for="Duty">Duty:</label>
      <input type="text" id="Duty" name="Duty" required>

      <label for="Transmission">Transmission:</label>
      <input type="text" id="Transmission" name="Transmission" required>

      <label for="Fuel">Fuel:</label>
      <input type="text" id="Fuel" name="Fuel" required>

      <label for="BatteryDeta">Battery Details:</label>
      <input type="text" id="BatteryDeta" name="BatteryDeta" required>
	  
    </div>

    <div class="section" id="disposed-options">
	  <label for="TyreDetail">Tyre Details:</label>
      <input type="text" id="TyreDetail" name="TyreDetail" required>  
	
      <label for="ChasisNo">Chasis Number:</label>
      <input type="text" id="ChasisNo" name="ChasisNo" required>

      <label for="Tools">Tools:</label>
      <input type="text" id="Tools" name="Tools" required>

      <label for="Notes">Notes:</label>
      <input type="text" id="Notes" name="Notes" required>

      <label for="Disposed">Disposed:</label>
      <select id="Disposed" name="Disposed" required>
        <option value="No">No</option>
        <option value="Yes">Yes</option>
      </select>

      <label for="YearDisposed">Year Disposed:</label>
      <input type="text" id="YearDisposed" name="YearDisposed" required>

      <label for="Buyer">Buyer:</label>
      <input type="text" id="Buyer" name="Buyer" required>

      <label for="DisposalValue">Disposal Value:</label>
      <input type="text" id="DisposalValue" name="DisposalValue" required>
    </div>
	
	<div style="width: 150px; margin: 20px auto;">
        <button type="submit">Submit</button>
    </div> 
	  
  </div>
  </form>
 
  </div>
  <!-- Success message -->
  <div id="successMessage" style="text-align: center; margin-top: 20px;"></div>
  
  <script src="js/formscript.js"></script>
</body>

</html>
