<?php include 'Fleet_management_header.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Display Records</title>
	<style>
	form{
          text-align:center;
          marigin:0.2rem 2rem;
          padding:0.7rem 0.7rem;
          font-size:1rem;
      }
    form input{
            font-size:1rem;
            height:auto;            
          }
   form button{
            font-size:18px;
            height:1.6rem;
            width:7rem;         
          }
         
          form select{
        font-size: 1rem;
         height: 1.5rem;
         padding: 0.3rem;
        box-sizing: border-box;
            }
      
      .formsection{
          color:maroon;
          background-color:skyblue;
          margin-top:2.4rem;
          margin-bottom: 0.5rem;
          display:flex;
          justify-content: center;
         
      }
    </style>
</head>
<section class="formsection">
<body>
    <form method="POST" action="">
        <label for="start_date">From:</label>
        <input type="date" id="start_date" name="start_date" required>

        <label for="end_date">To:</label>
        <input type="date" id="end_date" name="end_date" required>

        <button type="submit" >View</button>
    </form>
</section>
</body>

</html>

<?php
// Include the database connection file
require_once 'db_connection.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the start and end dates from the form
    $startDate = $_POST['start_date'];
    $endDate = $_POST['end_date'];

    // Prepare the SQL query with the date range
    $sql = "SELECT * FROM journeys WHERE date BETWEEN '$startDate' AND '$endDate' ORDER BY date DESC";

    // Execute the query
    $result = mysqli_query($connection, $sql);

    // Display the records on a web form
    if (mysqli_num_rows($result) > 0) {
        echo "<style>
                table {
                    border-collapse: collapse;
                    margin: 2rem 5rem;
                    width:85%;
                }
                th {
                    border: 1px solid black;
                    padding: 5px;
                    width: auto;
                    text-align: center;
                    background-color: skyblue;
                    font-size:1rem;
                }
                td {
                    border: 1px solid black;
                    padding: 5px;
                    width: auto;
                    font-size:1rem;
                }
                th.title {
                    text-align: center;
                    background-color: white;
                    width: auto;
					padding-top:2rem;
                }
                .census-dates {
                    text-align: left;
                    padding-top:1.5rem;
                }
                .date-column {
                    width: 200px; /* Adjust the width as needed */
                    text-align: left;
                    pading:5px;
                }
				.data-column {
                    width: 200px; /* Adjust the width as needed */
                    text-align: left;
                    pading:5px;
                }
             </style>";

        echo "<table>";
        echo "<tr>
                <th colspan='37' class='title'>JOURNEY REPORT </th>
              </tr>";


        // Column headers
        echo "<tr>
                <th>ID</th>
                <th>Date</th>
                <th>VehicleID</th>
                <th>DriverID</th>
                <th>Purpose of Journey</th>
                
              </tr>";

        $currentMonth = '';
        $row_count = 0;

        while ($row = mysqli_fetch_assoc($result)) {
            $date = date('F Y', strtotime($row['Date'])); // Get the month and year from the date

            // Display month header if it has changed
            if ($currentMonth !== $date) {
                $currentMonth = $date;
                echo "<tr>
                        <td colspan='37' class='census-dates'><strong>$currentMonth</strong></td>
                      </tr>";
            }

            // Display record
            echo "<tr>
                    
                    <td>" . $row['ID'] . "</td>
                    <td>" . $row['Date'] . "</td>
                    <td>" . $row['VehicleID'] . "</td>
                    <td>" . $row['DriverID'] . "</td>
                    <td>" . $row['Purpose of Journey'] . "</td>
                  </tr>";
        }

        echo "</table>";
    } else {
        echo "No records found.";
    }
}
?>


