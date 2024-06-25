"use strict";
$("#add_data").on("submit", function (event) {
  event.preventDefault(); // Prevent the form from submitting normally

  var parametros = $(this).serialize(); // Serialize form data

  $.ajax({
    type: "POST",
    url: "ajax/super/course_add_ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      // Display a loading message using SweetAlert before sending the AJAX request
      Swal.fire({
        title: "Please wait...",
        showConfirmButton: false,
        allowOutsideClick: false,
        willOpen: () => {
          Swal.showLoading();
        },
      });
    },
    success: function (data) {
      data = JSON.parse(data);
      // Close the SweetAlert loading animation
      Swal.close();
      if (data.success) {
        // Display a success message using SweetAlert
        Swal.fire({
          title: "Success!",
          html: data.message, // Assuming your PHP script returns a success message
          icon: "success",
          confirmButtonText: "OK",
          width: "340px",
        }).then((result) => {
          if (result.isConfirmed) {
            // If the user clicks "OK", redirect or perform any other action
            // Example: window.location.href = 'your_redirect_url';
            window.location.reload();
          }
        });
        // Scroll to the top of the page
        $("html, body").animate(
          {
            scrollTop: 0,
          },
          600
        );
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
    error: function (xhr, status, error) {
      // Handle errors using SweetAlert if necessary
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

$("#edit_data").on("submit", function (event) {
  event.preventDefault(); // Prevent the form from submitting normally

  var parametros = $(this).serialize(); // Serialize form data

  $.ajax({
    type: "POST",
    url: "ajax/super/course_edit_ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      // Display a loading message using SweetAlert before sending the AJAX request
      Swal.fire({
        title: "Please wait...",
        showConfirmButton: false,
        allowOutsideClick: false,
        willOpen: () => {
          Swal.showLoading();
        },
      });
    },
    success: function (data) {
      data = JSON.parse(data);
      // Close the SweetAlert loading animation
      Swal.close();
      if (data.success) {
        // Display a success message using SweetAlert
        Swal.fire({
          title: "Success!",
          html: data.message, // Assuming your PHP script returns a success message
          icon: "success",
          confirmButtonText: "OK",
          width: "340px",
        }).then((result) => {
          if (result.isConfirmed) {
            window.history.back();
          }
        });
        // Scroll to the top of the page
        $("html, body").animate(
          {
            scrollTop: 0,
          },
          600
        );
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
    error: function (xhr, status, error) {
      // Handle errors using SweetAlert if necessary
      Swal.fire({
        title: "Error!",
        text: "An error occurred while processing your request.",
        icon: "error",
        confirmButtonText: "OK",
        width: "340px",
      });
    },
  });
});

$(document).on("click", ".delete-course", function (event) {
  event.preventDefault(); // Prevent default link behavior

  // Get the course ID from data attribute
  var courseId = $(this).data("course-id");

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
        url: "ajax/super/course_delete_ajax.php",
        data: { id: courseId },
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
            }).then((result) => {
              if (result.isConfirmed) {
                // If the user clicks "OK", redirect or perform any other action
                // Example: window.location.href = 'your_redirect_url';
                window.location.reload();
              }
            });
            // Scroll to the top of the page
            $("html, body").animate(
              {
                scrollTop: 0,
              },
              600
            );
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
            text: "An error occurred while deleting the course.",
            icon: "error",
            confirmButtonText: "OK",
            width: "340px",
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.reload();
            }
          });
          // Scroll to the top of the page
          $("html, body").animate(
            {
              scrollTop: 0,
            },
            600
          );
        },
      });
    }
  });
});
