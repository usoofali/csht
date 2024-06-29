"use strict";

function getCoordinates() {
  return new Promise((resolve, reject) => {
    const successCallback = (position) => {
      const { latitude, longitude } = position.coords;
      resolve({ latitude, longitude });
    };

    const errorCallback = (error) => {
      reject(error);
    };

    const options = {
      enableHighAccuracy: true,
    };

    window.navigator.geolocation.getCurrentPosition(
      successCallback,
      errorCallback,
      options
    );
  });
}

$(document).on("click", ".geo-add", function (event) {
  event.preventDefault(); // Prevent default link behavior
  var facilityId = $(this).data("facility-id");

  getCoordinates()
    .then((coords) => {
      Swal.fire({
        title: "Add Geo-Coordinates",
        html:
          'Lat: <input id="swal-input1" class="swal2-input" value="' +
          coords.latitude +
          '" placeholder="Latitude" readonly> Lng: <input id="swal-input2" class="swal2-input" value="' +
          coords.longitude +
          '" placeholder="Longitude" readonly>',
        showCancelButton: true,
        confirmButtonText: "Save",
        cancelButtonText: "Cancel",
        focusConfirm: false,
        preConfirm: () => {
          return [coords.latitude, coords.longitude];
        },
      }).then((result) => {
        $.ajax({
          type: "POST",
          url: "ajax/super/add_coordinates_ajax.php",
          data: {
            id: facilityId,
            type: "facility",
            latitude: result.value[0],
            longitude: result.value[1],
          },
          success: function (data) {
            data = JSON.parse(data);
            if (data.success) {
              // Display a success message using SweetAlert
              Swal.fire({
                title: "Success!",
                text: data.message, // Assuming your PHP script returns a success message
                icon: "success",
                confirmButtonText: "OK",
                width: "340px",
              });
            } else {
              Swal.fire({
                title: "Error!",
                html: data.message,
                icon: "error",
                confirmButtonText: "OK",
                width: "340px",
              });
            }
          },
          error: function () {
            // Handle error response
            // Display a success message using SweetAlert
            Swal.fire({
              title: "Error!",
              text: "An error occurred.",
              icon: "error",
              confirmButtonText: "OK",
              width: "340px",
            });
          },
        });
      });
    })
    .catch((error) => {
      Swal.fire({
        title: "Connection Error!",
        text: "Check your internet connection.",
        icon: "error",
        confirmButtonText: "OK",
        width: "340px",
      });
    });
});

$(document).on("click", ".geo-view", function (event) {
  event.preventDefault(); // Prevent default link behavior
  var facilityId = $(this).data("facility-id");
  $.ajax({
    type: "POST",
    url: "ajax/super/view_coordinates_ajax.php",
    data: {
      id: facilityId,
      type: "facility",
    },
    success: function (data) {
      data = JSON.parse(data);
      if (data.success) {
        var html = `<table id="table" border=1 style="border-collapse: collapse; width: 100%; text-align: center;">
        <thead>
            <tr border=1>
                <th>ID</th>
                <th>Latitude</th>
                <th>Longitude</th>
            </tr>
        </thead>
        <tbody><tr border=1>`;
        data.data.forEach((element) => {
          html += `<td>${element[0]}.</td>
          <td>${element[1]}</td>
          <td>${element[2]}</td>
          </tr>`;
        });
        html += "</tbody></table>";
        // Display a success message using SweetAlert
        Swal.fire({
          title: "Success!",
          html: html, // Assuming your PHP script returns a success message
          icon: "success",
          confirmButtonText: "OK",
        });
      } else {
        Swal.fire({
          title: "Warning!",
          text: "No coordinate found.",
          icon: "warning",
          confirmButtonText: "OK",
          width: "340px",
        });
      }
    },
    error: function () {
      // Handle error response
      // Display a success message using SweetAlert
      Swal.fire({
        title: "Error!",
        text: "An error occurred.",
        icon: "error",
        confirmButtonText: "OK",
        width: "340px",
      });
    },
  });
});

$(document).on("click", ".geo-delete", function (event) {
  event.preventDefault(); // Prevent default link behavior

  // Get the facility ID from data attribute
  var facilityId = $(this).data("facility-id");

  // Show SweetAlert2 confirmation dialog
  Swal.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete it!",
    width: "340px",
  }).then((result) => {
    if (result.isConfirmed) {
      // Send AJAX request
      $.ajax({
        type: "POST",
        url: "ajax/super/coordinates_delete_ajax.php",
        data: {
          id: facilityId,
          type: "facility",
        },
        success: function (data) {
          data = JSON.parse(data);
          if (data.success) {
            // Display a success message using SweetAlert
            Swal.fire({
              title: "Success!",
              text: data.message, // Assuming your PHP script returns a success message
              icon: "success",
              confirmButtonText: "OK",
              width: "340px",
            });
            // Scroll to the top of the page
          } else {
            Swal.fire({
              title: "Error!",
              html: data.message,
              icon: "error",
              confirmButtonText: "OK",
              width: "340px",
            });
          }
        },
        error: function () {
          // Handle error response
          // Display a success message using SweetAlert
          Swal.fire({
            title: "Error!",
            text: "An error occurred.",
            icon: "error",
            confirmButtonText: "OK",
            width: "340px",
          });
        },
      });
    }
  });
});

// const geofence = [
// { lat: 37.7749, lng: -122.4194 }, // San Francisco, CA
// { lat: 34.0522, lng: -118.2437 }, // Los Angeles, CA
// { lat: 40.7128, lng: -74.0060 }   // New York City, NY
// // Add more coordinates as needed
// ];

// // Function to check if a point is inside the geofence
// function isInsideGeofence(point) {
// let isInside = false;
// let x = point.lat, y = point.lng;

// for (let i = 0, j = geofence.length - 1; i < geofence.length; j = i++) {
//     let xi = geofence[i].lat, yi = geofence[i].lng;
//     let xj = geofence[j].lat, yj = geofence[j].lng;

//     let intersect = ((yi > y) != (yj > y)) &&
//         (x < (xj - xi) * (y - yi) / (yj - yi) + xi);

//     if (intersect) isInside = !isInside;
// }

// return isInside;
// }

// // Example point to check if it's inside the geofence
// const pointToCheck = { lat: 38.9072, lng: -77.0369 }; // Washington, D.C.

// // Check if the point is inside the geofence
// if (isInsideGeofence(pointToCheck)) {
// console.log("Point is inside the geofence");
// } else {
// console.log("Point is outside the geofence");
// }

new DataTable("#facilitys", {
  ajax: {
    url: "./ajax/super/facility_view_ajax.php",
    type: "POST",
    dataSrc: "data",
  },
});
