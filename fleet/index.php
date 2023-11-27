
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <title>Fleet Management</title>
  <style>
    body {
      font-family: Arial, sans-serif;
     
    }

    /* Header Styles #cd919e*/
    header {
      align-items: left;
      background-color: aqua;
      color: darkblue;
      width: 100%;
      outline-color: red;
      margin-top: 0;
      position: fixed;
      top: 0px;
      left: 0px;
      text-align: center;
    }

    header h1 {
      color: darkblue;
      text-align: center;
      margin-bottom: 0; /* Reduce space below h1 */
      font-size:1rem;
    }

    .linked {
      display: flex;
      text-align: center;
      justify-content: center;
      margin: 0.6rem; /* Increase space between h1 and links */
    }

    .linked a {
      display: inline-block;
      padding: 0.3rem 0.3rem;
      background-color: lightblue;
      color: #blue;
      border-radius: 10px;
      font-size: 0.8rem; /* Increase font size */
      transition: background-color 0.3s ease;
      margin: 1px; /* Add margin between links */
      text-decoration: none;
    }

    .linked a:hover {
      background-color: darkblue;
      color: white;
    }
  </style>
</head>
<body>
   <header>
     <h1 style="font-family: Lobster, cursive;">FLEET MANAGEMENT</h1>
     <section class="linked">
       <a href="Journeys_by_driver.php" class="cta">Driver Journey</a>
       <a href="journeys_by_vehicle.php" class="cta">Vehicle Journey</a>
       <a href="journeys_by_date.php" class="cta">Journey by Date</a>
       <a href="Vehicle_details.php" class="cta">Vehicle Details</a>
       <a href="Fuel_by_vehicle.php" class="cta">Vehicle Fuel</a>
       <a href="Repairs_by_vehicle.php" class="cta">Vehicle Repairs</a>
       <a href="Mileage_by_vehicle.php" class="cta">Vehicle Mileage</a>
       <a href="mileagecount.php" class="cta">Mileage Monitor</a>
       <a href="inspection.php" class="cta">Inspection & insurance</a>
    </section>
   </header>
   <br>
   <br>
</body>
</html>

   <header>
     <h1>FLEET MANAGEMENT</h1>
<section class="linked">
      
     <a href="addjourney.php" class="cta">Add Journey </a>
	 <a href="addvehicle.php" class="cta">Add Vehicle</a>
	 <a href="addfuel.php" class="cta">Add Fuel</a>
	 <a href="addrepair.php" class="cta">Add Repair</a>
	 <a href="" class="cta">Add Insuarance</a>
	 
	 	  
</section>
   </header>
   <br>
   <br>
</body>
</html>