
function populateSelects() {
  const vehicleSelect = document.getElementById("VehicleID");
  const driverSelect = document.getElementById("DriverID");

  // Mock AJAX request to fetch data from PHP script (replace with actual AJAX call)
  fetch("fetchData.php")
    .then(response => response.json())
    .then(data => {
      data.forEach(item => {
        const vehicleOption = document.createElement("option");
        vehicleOption.value = item.VehicleID;
        vehicleOption.textContent = item.VehicleID;
        vehicleSelect.appendChild(vehicleOption);

        const driverOption = document.createElement("option");
        driverOption.value = item.DriverID;
        driverOption.textContent = item.DriverID;
        driverSelect.appendChild(driverOption);
      });
    })
    .catch(error => console.error("Error fetching data:", error));
}

function populateCostCentres() {
  const costCentreSelect = document.getElementById("CostCentre");

  // Mock AJAX request to fetch cost centers from PHP script (replace with actual AJAX call)
  fetch("fetchCostCentres.php")
    .then(response => response.json())
    .then(data => {
      data.forEach(CostCentre => {
        const costCentreOption = document.createElement("option");
        costCentreOption.value = CostCentre;
        costCentreOption.textContent = CostCentre;
        costCentreSelect.appendChild(costCentreOption);
      });
    })
    .catch(error => console.error("Error fetching cost centres:", error));
}

function validateDate() {
  const selectedDate = new Date(document.getElementById("Date").value);
  const currentDate = new Date();

  if (selectedDate > currentDate) {
    alert("Please select a date that is not in the future.");
    document.getElementById("Date").value = ""; // Clear the input
  }
}

function calculateTotalKMs() {
  const startMileageInput = document.getElementById("StartMileage");
  const endMileageInput = document.getElementById("EndMileage");
  const totalKMsField = document.getElementById("TotalKMs");

  const startMileage = parseInt(startMileageInput.value);
  const endMileage = parseInt(endMileageInput.value);

  if (!isNaN(startMileage) && !isNaN(endMileage)) {
    if (endMileage < startMileage) {
      alert("End Mileage must be greater Start Mileage.");
      totalKMsField.value = "";
      totalKMsField.style.borderColor = "red"; // Reset the border color
      endMileageInput.value = ""; // Clear the input
    } else {
      const totalKMs = endMileage - startMileage;

      if (isNaN(totalKMs) || totalKMs < 0) {
        totalKMsField.value = "";
        totalKMsField.placeholder = "Enter a valid value";
        totalKMsField.style.borderColor = "";
      } else {
        totalKMsField.value = totalKMs;
        totalKMsField.placeholder = "";
        totalKMsField.style.borderColor = "";
      }
    }
  } else {
    totalKMsField.value = "";
    totalKMsField.placeholder = "";
    totalKMsField.style.borderColor = "";
  }
}


function calculateTotalTime() {
  const timeInInput = document.getElementById("TimeIN");
  const timeOutInput = document.getElementById("TimeOUT");
  const totalTimeField = document.getElementById("TotalTime");

  const timeIn = timeInInput.value;
  const timeOut = timeOutInput.value;

  const timeInParts = timeIn.split(":");
  const timeOutParts = timeOut.split(":");

  const timeInHours = parseInt(timeInParts[0]);
  const timeInMinutes = parseInt(timeInParts[1]);
  const timeOutHours = parseInt(timeOutParts[0]);
  const timeOutMinutes = parseInt(timeOutParts[1]);

  const timeInTotalMinutes = timeInHours * 60 + timeInMinutes;
  const timeOutTotalMinutes = timeOutHours * 60 + timeOutMinutes;

  if (timeInTotalMinutes <= timeOutTotalMinutes) {
    alert("Time In must be later than Time Out.");
    totalTimeField.value = "";
    timeInInput.value = ""; // Clear the input
    return;
  }

  const totalTimeMinutes = timeInTotalMinutes - timeOutTotalMinutes;
  const hours = Math.floor(totalTimeMinutes / 60);
  const minutes = totalTimeMinutes % 60;

  const formattedHours = hours < 10 ? `0${hours}` : hours;
  const formattedMinutes = minutes < 10 ? `0${minutes}` : minutes;

  const totalTimeFormatted = `${formattedHours}:${formattedMinutes}`;
  totalTimeField.value = totalTimeFormatted;
}


window.onload = function() {
  populateCostCentres();
  populateSelects();

  document.getElementById("Date").addEventListener("change", validateDate);
  document.getElementById("StartMileage").addEventListener("input", calculateTotalKMs);
  document.getElementById("EndMileage").addEventListener("input", calculateTotalKMs);
  document.getElementById("TimeOUT").addEventListener("change", calculateTotalTime);
  document.getElementById("TimeIN").addEventListener("change", calculateTotalTime);
};
